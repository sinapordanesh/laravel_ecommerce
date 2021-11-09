<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:ADMIN'])->group(function ()
{
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
    Route::delete('/roles/{role}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/roles/{role}/update', [RoleController::class, 'update'])->name('role.update');

    Route::put('/roles/{role}/attach', [RoleController::class, 'attach'])->name('role.permission.attach');
    Route::put('/roles/{role}/detach', [RoleController::class, 'detach'])->name('role.permission.detach');
});

