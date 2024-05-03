<?php

use App\Http\Controllers\{
    UserController,
    GuardController,
    VisitorController,
    EmployeeController,
    PrisionerController,
    DashboardController
};

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/users',                    [UserController::class, 'index'])->name('user.management');
    Route::post('/users',                   [UserController::class, 'store'])->name('user.store');
    Route::get('/users/create',             [UserController::class, 'create'])->name('user.create');
    Route::put('/users/{user}',             [UserController::class, 'update'])->name('user.update');
    Route::get('/users/{user}/edit',        [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/users/{user}',          [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/prisioner',                   [PrisionerController::class, 'index'])->name('prisioner.management');
    Route::get('/prisioner/create',            [PrisionerController::class, 'create'])->name('prisioner.create');
    Route::post('/prisioner',                  [PrisionerController::class, 'store'])->name('prisioner.store');
    Route::get('/prisioner/{prisioner}/edit', [PrisionerController::class, 'edit'])->name('prisioner.edit');
    Route::put('/prisioner/{prisioner}',      [PrisionerController::class, 'update'])->name('prisioner.update');
    Route::delete('/prisioner/{prisioner}',   [PrisionerController::class, 'destroy'])->name('prisioner.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/employees',                    [EmployeeController::class, 'index'])->name('employee.management');
    Route::get('/employees/create',             [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employees',                   [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employees/{employee}/edit',   [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{employee}',        [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employees/{employee}',     [EmployeeController::class, 'destroy'])->name('employee.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/guards',                   [GuardController::class, 'index'])->name('guards.management');
    Route::get('/guards/create',            [GuardController::class, 'create'])->name('guards.create');
    Route::post('/guards',                  [GuardController::class, 'store'])->name('guards.store');
    Route::get('/guards/{guards}/edit',     [GuardController::class, 'edit'])->name('guards.edit');
    Route::put('/guards/{guards}',          [GuardController::class, 'update'])->name('guards.update');
    Route::delete('/guards/{guards}',       [GuardController::class, 'destroy'])->name('guards.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/visitors',                 [VisitorController::class, 'index'])->name('visitor.management');
    Route::get('/visitors/create',          [VisitorController::class, 'create'])->name('visitor.create');
    Route::post('/visitors',                [VisitorController::class, 'store'])->name('visitor.store');
    Route::get('/visitors/{visitor}/edit', [VisitorController::class, 'edit'])->name('visitor.edit');
    Route::put('/visitors/{visitor}',      [VisitorController::class, 'update'])->name('visitor.update');
    Route::delete('/visitors/{visitor}',   [VisitorController::class, 'destroy'])->name('visitor.destroy');
});

require __DIR__.'/auth.php';
