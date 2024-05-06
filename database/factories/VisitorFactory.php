<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'document' => $this->faker->numerify('##########'), // Generates a random 10-digit document number
            'age' => $this->faker->numberBetween(18, 90),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->streetAddress,
            'number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'zipcode' => $this->faker->postcode,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'gender' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'visit_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'visit_time' => $this->faker->time('H:i:s'),
            'prisioner_id' => null, // By default, no associated prisoner
        ];
    }
}
