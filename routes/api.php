<?php

use App\Models\User;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Prisioner;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware(['auth'])->group(function () {
    Route::get('/users', function () {
        $users = User::all()->map(function ($user) {
            return $user->only(['id', 'name', 'email']);
        });
        return response()->json($users, 200, [], JSON_PRETTY_PRINT);
    })->name('api.users');

    Route::get('/employees', function () {
        $employees = Employee::all()->map(function ($employee) {
            return $employee->only(['id', 'name', 'position']);
        });
        return response()->json($employees, 200, [], JSON_PRETTY_PRINT);
    })->name('api.employees');

    Route::get('/prisioners', function () {
        $prisioners = Prisioner::all()->map(function ($prisioner) {
            return $prisioner->only(['id', 'name', 'crime']);
        });
        return response()->json($prisioners, 200, [], JSON_PRETTY_PRINT);
    })->name('api.prisioners');

    Route::get('/visitors', function () {
        $visitors = Visitor::all()->map(function ($visitor) {
            return $visitor->only(['id', 'name', 'purpose']);
        });
        return response()->json($visitors, 200, [], JSON_PRETTY_PRINT);
    })->name('api.visitors');
});