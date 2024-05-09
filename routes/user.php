<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/users',                                [UserController::class, 'index'])->name('user.management');
    Route::post('/users',                               [UserController::class, 'store'])->name('user.store');
    Route::get('/users/create',                         [UserController::class, 'create'])->name('user.create');
    Route::put('/users/updatePersonalInfo/{user}',      [UserController::class, 'updatePersonalInfo'])->name('user.updatePersonalInfo');
    Route::put('/users/updatePassword/{user}',          [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::put('/users/updateAccess/{user}',            [UserController::class, 'updateAccess'])->name('user.updateAccess');
    Route::get('/users/{user}/edit',                    [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/users/{user}',                      [UserController::class, 'destroy'])->name('user.destroy');
});