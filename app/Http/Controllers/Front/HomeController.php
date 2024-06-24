<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
       
        return view('front.home.index', [
            'latest_post' => Post::with(['User', 'categories'])->where('status', 'publish')->latest()->first(),
            'posts' => Post::with(['User', 'categories'])->where('status', 'publish')->latest()->paginate(4),
        ]);
    }

    public function about() 
    {
        return view('front.home.about', [
        ]);
    }
}
