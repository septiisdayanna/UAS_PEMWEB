<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\ConfigController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\PostController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController as FrontPostController; 
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/p/{seotitle}', [FrontPostController::class, 'show']);
Route::get('/Posts', [FrontPostController::class, 'index']);
Route::post('/posts/search', [FrontPostController::class, 'index'])->name('search');

Route::get('categories/{seotitle}', [FrontCategoryController::class, 'index']);
Route::get('all-category/', [FrontCategoryController::class, 'allCategory']);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('post', PostController::class);

    Route::resource('/categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:1');

    Route::resource('/users', UserController::class);
    Route::resource('/config', ConfigController::class)->only([
        'index', 'update'
    ])->middleware('UserAccess:1');

    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

