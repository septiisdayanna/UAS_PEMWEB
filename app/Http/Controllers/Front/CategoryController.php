<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function index($seotitleCategory)
    {
        return view('front.category.index', [
            'posts' => Post::with('categories')->whereHas('categories', function($q) use ($seotitleCategory) {
                $q->where('seotitle', $seotitleCategory);
            })->where('status', 'publish')->latest()->paginate(6),
            'category_title' => $seotitleCategory, // Menggunakan nama variabel yang lebih deskriptif
        ]);
    }

    public function allCategory()
    {
        $categories = Category::withCount(['Posts' => function(Builder $query) {
            $query->where('status', 'publish');
        }])->where('active', 'yes')->take(15)->latest()->get();

        return view('front.category.all-category', compact('categories'));
    }
}
