<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Prisioner;
use Illuminate\Database\Seeder;

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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
    }
}
