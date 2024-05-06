<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

Route::middleware(['auth'])->group(function () {
    Route::get('/visitors',                 [VisitorController::class, 'index'])->name('visitor.management');
    Route::get('/visitors/create',          [VisitorController::class, 'create'])->name('visitor.create');
    Route::post('/visitors',                [VisitorController::class, 'store'])->name('visitor.store');
    Route::get('/visitors/{visitor}/edit',  [VisitorController::class, 'edit'])->name('visitor.edit');
    Route::put('/visitors/{visitor}',       [VisitorController::class, 'update'])->name('visitor.update');
    Route::delete('/visitors/{visitor}',    [VisitorController::class, 'destroy'])->name('visitor.destroy');
});