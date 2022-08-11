<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeSolTypeCulture>
 */
class TypeSolTypeCultureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type_sol_id' => fake()->numberBetween(1, 10),
            'type_culture_id' => fake()->numberBetween(1, 10),
            'created_at'=>now()
        ];
    }
}
