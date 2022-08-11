<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resultat>
 */
class ResultatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'donnee_capteur_id' => fake()->numberBetween(1, 10),
            'type_sol_id' => fake()->numberBetween(1, 10),
            'created_at'=>now()
        ];
    }
}
