<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Prisioner;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Employee::factory(3)->create();
        User::factory(1)->create();
        $prisioners = Prisioner::factory(5)->create();
        foreach ($prisioners as $prisioner) {
            Visitor::factory()->create(['prisioner_id' => $prisioner->id]);
        }
        
    }
}