<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\isAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::middleware(IsAdminMiddleware::class)->group(function (){
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::delete('/posts/{post}/remove-photo', [PostController::class, 'removePhoto'])->name('posts.removePhoto');
    });
});

require __DIR__.'/auth.php';
