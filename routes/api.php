<?php

use App\Models\User;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Prisioner;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware(['auth'])->group(function () {
    Route::get('/users', function () {
        $users = User::all()->map(function ($user) {
            return $user->only(
                [
                    'id', 
                    'name',
                    'lastname',
                    'access_level' 

                ]);
        });
        return response()->json($users, 200, [], JSON_PRETTY_PRINT);
    })->name('api.users');

    Route::post('/users', function () {
        $faker = \Faker\Factory::create();
        
        $user = User::create([
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'document' => $faker->randomNumber(9),
            'phone' => $faker->phoneNumber,
            'access_level' => $faker->randomElement(['admin', 'visitor_management', 'prisioner_management']),
            'password' => bcrypt('password123'), 
            'email' => $faker->unique()->safeEmail,
        ]);
        
        return response()->json($user, 201);
    })->name('api.users.store');

    Route::delete('/users/{user}', function ($userId) {
        $user = User::find($userId);
        if (!$user) {
            return response()->json("Usuário não encontrado", 404, [], JSON_PRETTY_PRINT);
        }
    
        try {
            $user->delete();
            return response()->json("Usuário Deletado com Sucesso", 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json("Erro ao excluir usuário", 500, [], JSON_PRETTY_PRINT);
        }
    })->name('api.users.destroy');

    Route::get('/employees', function () {
        $employees = Employee::all()->map(function ($employee) {
            return $employee->only(
                [
                    'id', 
                    'name', 
                    'lastname', 
                    'gender',
                    'role'
            ]);
        });
        return response()->json($employees, 200, [], JSON_PRETTY_PRINT);
    })->name('api.employees');

    Route::post('/employees', function () {
        $faker = \Faker\Factory::create();
        
        $employee = Employee::create([
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'gender' => $faker->randomElement(['Masculino', 'Feminino']),
            'role' => $faker->randomElement(['Outro', 'Cozinheiro', 'Zelador', 'Motorista']),
        ]);

        return response()->json($employee, 201);
    })->name('api.employees.store');

    Route::delete('/employees/{employee}', function ($employeeId) {
        $employee = Employee::find($employeeId);
        if (!$employee) {
            return response()->json("Funcionário não encontrado", 404, [], JSON_PRETTY_PRINT);
        }
    
        try {
            $employee->delete();
            return response()->json("Funcionário Deletado com Sucesso", 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json("Erro ao excluir funcionário", 500, [], JSON_PRETTY_PRINT);
        }
    })->name('api.employees.destroy');
    
    Route::get('/prisioners', function () {
        $prisioners = Prisioner::all()->map(function ($prisioner) {
            return $prisioner->only(
                [
                    'id', 
                    'name',
                    'lastname', 
                    'age',
                    'gender',
                    'crime',
                    'cell', 
                    'observation',
                    'date_entry',
                    'date_out'
                ]);
        });
        return response()->json($prisioners, 200, [], JSON_PRETTY_PRINT);
    })->name('api.prisioners');

    Route::post('/prisioners', function () {
        $faker = \Faker\Factory::create();
        
        $prisioner = Prisioner::create([
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'age' => $faker->numberBetween(18, 80),
            'gender' => $faker->randomElement(['Masculino', 'Feminino']),
            'document' => $faker->randomNumber(9),
            'zipcode' => $faker->postcode,
            'address' => $faker->streetAddress,
            'number' => $faker->buildingNumber,
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
            'observation' => $faker->sentence,
            'date_entry' => $faker->dateTimeBetween('-5 years', 'now'),
            'date_out' => $faker->dateTimeBetween('-5 years', 'now'),
            'cell' => $faker->phoneNumber,
            'crime' => $faker->sentence,
            'updated_at' => $faker->dateTimeBetween('-5 years', 'now'),
            'created_at' => $faker->dateTimeBetween('-5 years', 'now')
        ]);

        return response()->json($prisioner, 201);
    })->name('api.prisioners.store');

    Route::delete('/prisioners/{prisioner}', function ($prisionerId) {
        $prisioner = Prisioner::find($prisionerId);
        if (!$prisioner) {
            return response()->json("Detento não encontrado", 404, [], JSON_PRETTY_PRINT);
        }
    
        try {
            $prisioner->delete();
            return response()->json("Detento Deletado com Sucesso", 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json("Erro ao excluir detento", 500, [], JSON_PRETTY_PRINT);
        }
    })->name('api.prisioners.destroy');

    Route::get('/visitors', function () {
        $visitors = Visitor::all()->map(function ($visitor) {
            return $visitor->only(
                [
                    'id', 
                    'name',
                    'lastname',
                    'document',
                    'age',
                    'address',
                    'visit_date',
                    'visit_time',
                    'prisioner_id'
                ]);
        });
        return response()->json($visitors, 200, [], JSON_PRETTY_PRINT);
    })->name('api.visitors');

    Route::post('/visitors', function () {
        $faker = \Faker\Factory::create();
        
        $visitor = Visitor::create([
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'document' => $faker->randomNumber(9),
            'age' => $faker->numberBetween(18, 80),
            'address' => $faker->streetAddress,
            'visit_date' => $faker->dateTimeBetween('-5 years', 'now'),
            'visit_time' => $faker->time(),
            'prisioner_id' => $faker->randomElement(Prisioner::all()->pluck('id')->toArray())
        ]);

        return response()->json($visitor, 201);
    })->name('api.visitors.store');

    Route::delete('/visitors/{visitor}', function ($visitorId) {
        $visitor = Visitor::find($visitorId);
        if (!$visitor) {
            return response()->json("Visitante não encontrado", 404, [], JSON_PRETTY_PRINT);
        }
    
        try {
            $visitor->delete();
            return response()->json("Visitante Deletado com Sucesso", 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json("Erro ao excluir visitante", 500, [], JSON_PRETTY_PRINT);
        }
    })->name('api.visitors.destroy');
});