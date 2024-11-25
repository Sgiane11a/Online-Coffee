<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('forum.index', compact('posts'));
    }

    function guest()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('forum.guest', compact('posts'));
    }

    function admin()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.forum.index', compact('posts'));
    }

    function create()
    {
        return view('forum.create');
    }

    function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route('forum.index')->with('success', 'Post creado exitosamente.');
    }

    function edit(Post $post)
    {
        return view('forum.update', compact('post'));
    }

    function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('forum.index')->with('success', 'Post actualizado exitosamente.');
    }

    function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Post eliminado exitosamente.');
    }
    
    /*
    //GUARDAR UN COMENTARIO 
    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comentario publicado.');
    }

    // ELIMINAR UN COMENTARIO
    public function destroyComment(Comment $comment)
    {
        $this->authorize('delete', $comment); // Verifica si el usuario tiene permiso para eliminar el comentario
        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado.');
    }

    // GUARDAR UNA REACCION
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
    }*/
}
