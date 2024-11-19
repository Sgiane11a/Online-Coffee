<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('forum', compact('posts'));
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
}
