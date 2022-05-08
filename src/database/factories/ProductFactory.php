<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'supplier_id' => $this->faker->numberBetween(1, 1000000),
            'category_id' => $this->faker->numberBetween(1, 1000000),
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'photo' => $this->faker->imageUrl(),
            'photo_thumb' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'unit_price' => $this->faker->randomFloat(2, 0, 100),
            'currency' => $this->faker->currencyCode,
            'quantity_per_unit' => $this->faker->word,
            'unit_weight' => $this->faker->randomFloat(2, 0, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
