<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Config;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.layout.side-widget', function($view) {
            $categories = Category::withCount(['Posts' => function(Builder $query) {
                $query->where('status', 'publish');
            }])->where('active', 'yes')->take(7)->latest()->get();
            $view->with('categories', $categories);
        });

        View::composer('front.layout.side-widget', function($view) {
            $posts = Post::orderBy('hits', 'desc')->take(3)->get();
            $config = Config::where('name',  'ads_widget')->pluck('value', 'name');

            $view->with('popular_posts', $posts);
            $view->with('config', $config);
        });

        View::composer('front.layout.navbar', function($view) {
            $categories = Category::where('active', 'yes')->latest()->take(3)->get();
            $view->with('categories_navbar', $categories);
        });
    }
}
