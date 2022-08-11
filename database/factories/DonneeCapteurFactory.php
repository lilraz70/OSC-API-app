<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DonneeCapteur>
 */
class DonneeCapteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'n' => fake()->numberBetween(1, 50),
                'p' => fake()->numberBetween(1, 50),
                'k' => fake()->numberBetween(1, 50),
                'ph' => fake()->numberBetween(1, 50),
                'ec' => fake()->numberBetween(1, 50),
                'temperature' => fake()->numberBetween(1, 10),
                'humidite' => fake()->numberBetween(1, 10),
                'champ_id' => fake()->numberBetween(1, 10),
                'created_at'=>now()
        ];
    }
}
