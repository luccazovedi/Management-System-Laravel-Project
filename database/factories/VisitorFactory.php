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
        if (empty(self::$prisionerIds)) {
            self::$prisionerIds = Prisioner::pluck('id')->toArray();
        }

        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'document' => $this->faker->numerify('##########'), 
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
            'prisioner_id' => $this->faker->randomElement(self::$prisionerIds),
        ];
    }
}
