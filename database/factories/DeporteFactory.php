<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Deporte;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deporte>
 */
class DeporteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Deporte::class;
    public function definition(): array
    {

        return [
            'name' => $this->faker->name(),
            'descripcion' => $this->faker->sentence(),
            'personas' => $this->faker->numberBetween(0, 100),
        ];
    }
}
