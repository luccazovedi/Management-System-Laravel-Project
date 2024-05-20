<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DashboardController;

Route::get('/',         [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('export',    [ExportController::class,    'export'])->middleware(['auth'])->name('export');

require __DIR__.'/api.php';
require __DIR__.'/user.php';
require __DIR__.'/auth.php';
require __DIR__.'/visitor.php';
require __DIR__.'/employee.php';
require __DIR__.'/prisioner.php';
