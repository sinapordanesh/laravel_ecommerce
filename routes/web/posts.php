<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//POSTS ROUTES:

Route::middleware('auth')->group(function ()
{
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::delete('/post/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
});
