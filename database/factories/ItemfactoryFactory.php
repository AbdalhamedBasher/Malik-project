<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemfactoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // factory for item table
            'name' => $this->faker->word,
            // random from type table
            'type_id' => $this->faker->numberBetween(1, 10),
            'size_id' => $this->faker->numberBetween(1, 10),
            'unit_id' => $this->faker->numberBetween(1, 10),
            'line_id' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'brand' => $this->faker->randomElement(['brand1', 'brand2', 'brand3']),
        ];
    }
}
