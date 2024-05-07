<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Usuário',
            'lastname' => 'Admin',
            'document' => '12345678900',
            'phone' => '12345678900',
            'email' => 'admin@email',
            'email_verified_at' => now(),
            'password' => Hash::make('senha123'),
            'remember_token' => $this->faker->randomAscii,
        ];
        
    }
}