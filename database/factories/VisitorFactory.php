<?php

namespace Database\Factories;

use App\Models\Visitor;
use App\Models\Prisioner;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    // Armazena os IDs dos prisioneiros
    private static $prisionerIds = [];

    /**
     * Define o modelo de fábrica correspondente.
     *
     * @return string
     */
    protected $model = Visitor::class;

    /**
     * Define os atributos padrão do modelo.
     *
     * @return array
     */
    public function definition()
    {    
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'document' => $this->faker->numerify('##########'), 
            'age' => $this->faker->numberBetween(18, 90),
            'gender' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'zipcode' => $this->faker->postcode,
            'address' => $this->faker->streetAddress,
            'number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'visit_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'visit_time' => $this->faker->time('H:i:s'),
        ];
    }
}