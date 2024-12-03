<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class PostController extends Controller
{
    // ============================
    // Mostrar todos los posts
    // ============================

    // Muestra una lista paginada de posts para usuarios autenticados.
    function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('forum.index', compact('posts'));
    }

    // Muestra una lista paginada de posts para invitados.
    function guest()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('forum.guest', compact('posts'));
    }

    // Muestra una lista paginada de posts para administradores en el panel administrativo.
    function admin()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.forum.index', compact('posts'));
    }

    // ============================
    // Crear y almacenar un post
    // ============================

    // Muestra el formulario para crear un nuevo post.
    function create()
    {
        return view('forum.create');
    }

    // Almacena un nuevo post en la base de datos.
    function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route('forum.index')->with('success', 'Post creado exitosamente.');
    }

    // ============================
    // Editar y actualizar un post
    // ============================

    // Muestra el formulario para editar un post existente.
    function edit(Post $post)
    {
        return view('forum.update', compact('post'));
    }

    // Actualiza los datos de un post existente en la base de datos.
    function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('forum.index')->with('success', 'Post actualizado exitosamente.');
    }

    // ============================
    // Eliminar un post
    // ============================

    // Elimina un post de la base de datos.
    function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post eliminado exitosamente.');
    }

    // ============================
    // Gestionar comentarios
    // ============================

    // Almacena un nuevo comentario asociado a un post.
    public function storeComment(Request $request, Post $post)
    {
        // Validar el contenido del comentario
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        // Crear el nuevo comentario
        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        // Redirigir de vuelta al post con un mensaje de éxito
        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }

    // Elimina un comentario específico si el usuario tiene permiso.
    public function destroyComment(Comment $comment)
    {
        if (auth()->check() && auth()->user() && auth()->user()->isAdmin()) {
            $comment->delete();
            return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comentario eliminado.');
        } else {
            $comment->delete();
            return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comentario eliminado.');
        }
    }

    // Muestra el formulario para editar un comentario.
    public function editComment(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    // Actualiza el contenido de un comentario existente.
    public function updateComment(Request $request, Comment $comment)
    {
        $comment->update(['content' => $request->input('content')]);

        return redirect()->route('posts.show', $comment->post_id);
    }

    // ============================
    // Gestionar reacciones
    // ============================

    // Guarda o actualiza una reacción (like/dislike) asociada a un post.
    public function react(Request $request, Post $post)
    {
        $request->validate([
            'type' => 'required|in:like,dislike',
        ]);

        $post->reactions()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['type' => $request->type]
        );

        return redirect()->back()->with('success', 'Reacción guardada.');
    }

    // ============================
    // Mostrar un post específico
    // ============================

    // Muestra un post específico junto con sus detalles.
    public function show(Post $post)
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.forum.index', compact('posts', 'post'));
    }
}
