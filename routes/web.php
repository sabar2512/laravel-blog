<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // if you don’t put with() here, you will have N+1 query performance problem
    $posts = Post::with('category', 'tags')->take(5)->latest()->get();

    return view('pages.home', [
        'posts' => $posts,
    ]);
})->name('home');
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');
Route::view('about', 'pages.about')->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('tags', Admin\TagController::class);
    Route::resource('posts', Admin\PostController::class);
});

require __DIR__.'/auth.php';
