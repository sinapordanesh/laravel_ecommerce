<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


//USERS ROUTES:

Route::middleware('auth')->group(function ()
{
    //  ADMIN ACCESSES:
    Route::middleware('role:ADMIN')->group(function ()
    {
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::put('users/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
        Route::put('users/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');
    });
//  USER ACCESSES:
//      USER PERSONAL ACCESSES:
    Route::middleware('can:view,user')->group(function ()
    {
        Route::get('users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
    });
//      USER GENERAL ACCESSES:
    Route::put('users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

});
