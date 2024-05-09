<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::middleware(['auth'])->group(function () {
    Route::get('/employees',                    [EmployeeController::class, 'index'])->name('employee.management');
    Route::get('/employees/create',             [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees',                   [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employees/{employee}/edit',    [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{employee}',         [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employees/{employee}',      [EmployeeController::class, 'destroy'])->name('employee.destroy');
});