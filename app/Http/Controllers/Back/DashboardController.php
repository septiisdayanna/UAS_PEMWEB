<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('back.dashboard.index', [
            'total_posts' => Post::count(),
            'total_categories' => Category::count(),
            'latest_post' => Post::with('categories')->whereStatus('publish')->whereActive('yes')->latest()->take(3)->get(),
            'popular_post' => Post::with('categories')->whereStatus('publish')->orderBy('hits', 'desc')->latest()->take(3)->get()
        ]);
    }
}
