<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $keyword = request()->keyword;
        if ($keyword) {
            $posts = Post::with('categories')
            ->where('status', 'publish')
            ->where('title', 'like', '%' .$keyword. '%')
            ->latest()
            ->paginate(4);
        } else {
            $posts = Post::with('categories')
            ->where('status', 'publish')
            ->latest()
            ->paginate(4);
        }

        return view('front.post.index', [
            'posts' => $posts,
            'keyword' => $keyword,
        ]);
    }

    public function show($seotitle)
    {
        $post = Post::whereseotitle($seotitle)
            ->where('status', 'publish')
            ->with('categories')
            ->firstOrFail();
        $post-> increment('hits');

        return view('front.post.show', [
            'post' => $post,
        ]);
    }
}

