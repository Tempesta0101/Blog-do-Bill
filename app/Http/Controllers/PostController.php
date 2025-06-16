<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')
            ->published()
            ->recent()
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        return view('posts.show', compact('post'));
    }
    public function buscar(Request $request)
    {
    $request->validate([
        'termo' => 'required|min:3',
    ]);

    $termo = $request->input('termo');
    $posts = Post::buscar($termo)->get();

    return view('posts.resultados', compact('posts', 'termo'));
    }

}