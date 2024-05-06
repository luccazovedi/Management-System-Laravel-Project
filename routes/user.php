<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/users',                    [UserController::class, 'index'])->name('user.management');
    Route::post('/users',                   [UserController::class, 'store'])->name('user.store');
    Route::get('/users/create',             [UserController::class, 'create'])->name('user.create');
    Route::put('/users/{user}',             [UserController::class, 'update'])->name('user.update');
    Route::get('/users/{user}/edit',        [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/users/{user}',          [UserController::class, 'destroy'])->name('user.destroy');
});

