<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Casal>
 */
class CasalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'data_inici' => fake()->date(),
            'data_final' => fake()->date(),
            'n_places' => fake()->numberBetween(1000, 10000),
            'id_ciutat' => fake()->numberBetween(1, 10),
        ];
    }
}
