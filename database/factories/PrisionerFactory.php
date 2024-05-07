<?php

namespace Database\Factories;

use App\Models\Prisioner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PrisionerFactory extends Factory
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
            'age' => $this->faker->numberBetween(18, 90),
            'gender' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'zipcode' => $this->faker->postcode,
            'address' => $this->faker->streetAddress,
            'number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'date_entry' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'date_out' => $this->faker->dateTimeBetween('now', '+1 year'),
            'cell' => $this->faker->regexify('[A-Z]{2}-\d{4}'),
            'observation' => $this->faker->sentence,
            'crime' => $this->faker->sentence,
        ];
    }
}
