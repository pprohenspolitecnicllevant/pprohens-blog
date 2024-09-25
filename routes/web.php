<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/post');
Route::redirect('/dashboard', '/post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('post/my-posts', [PostController::class, 'myPosts'])->name('post.my-posts')->middleware('auth');

Route::resource('post', PostController::class)->except(['index'])->middleware('auth');

Route::get('post', [PostController::class, 'index'])->name('post.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
