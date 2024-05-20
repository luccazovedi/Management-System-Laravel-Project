<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrisionerController;

Route::middleware(['auth'])->group(function () {
    Route::get('/prisioners',                   [PrisionerController::class, 'index'])->name('prisioner.management');
    Route::get('/prisioners/create',            [PrisionerController::class, 'create'])->name('prisioner.create');
    Route::post('/prisioners',                  [PrisionerController::class, 'store'])->name('prisioner.store');
    Route::get('/prisioners/{prisioner}/edit',  [PrisionerController::class, 'edit'])->name('prisioner.edit');
    Route::put('/prisioners/{prisioner}',       [PrisionerController::class, 'update'])->name('prisioner.update');
    Route::delete('/prisioners/{prisioner}',    [PrisionerController::class, 'destroy'])->name('prisioner.destroy');
});

