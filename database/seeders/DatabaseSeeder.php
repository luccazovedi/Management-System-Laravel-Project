<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Prisioner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Visitor::factory(10)->create();
        Employee::factory(3)->create();
        Prisioner::factory(5)->create();
        User::factory()->create([
            'name' => 'Usuário',
            'lastname' => 'Admin',
            'email' => 'admin@email',
            'password' => Hash::make('senha123'),
            'access_level' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Usuário',
            'lastname' => 'Gestor de Visitantes',
            'email' => 'visitor@email',
            'password' => Hash::make('senha123'),
            'access_level' => 'visitor_management',
        ]);
        User::factory()->create([
            'name' => 'Usuário',
            'lastname' => 'Gestor de Detentos',
            'email' => 'prisioner@email',
            'password' => Hash::make('senha123'),
            'access_level' => 'prisioner_management',
        ]);
        
    }
}
