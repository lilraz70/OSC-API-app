<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Champ>
 */
class ChampFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->city(),
            'localisation' => fake()->latitude($min = -90, $max = 90) ,
            'user_id' => fake()->numberBetween(1, 10),
            'created_at'=>now()
        ];
    }
}
