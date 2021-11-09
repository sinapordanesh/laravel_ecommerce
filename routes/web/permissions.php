<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function ()
{
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
});
