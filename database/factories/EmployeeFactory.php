<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'document' => $this->faker->numerify('##########'), // Generates a random 10-digit document number
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'age' => $this->faker->numberBetween(18, 70),
            'gender' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'zipcode' => $this->faker->postcode,
            'address' => $this->faker->streetAddress,
            'number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'role' => $this->faker->jobTitle,
            'other' => $this->faker->sentence,
            'date_admission' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'salary' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}
