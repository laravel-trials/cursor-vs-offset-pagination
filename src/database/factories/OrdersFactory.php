<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 1000000),
            'shipper_id' => $this->faker->numberBetween(1, 1000000),
            'employee_id' => $this->faker->numberBetween(1, 1000000),
            'supplier_id' => $this->faker->numberBetween(1, 1000000),
            'order_number' => $this->faker->numberBetween(1, 1000000),
            'order_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'ship_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'ship_method' => $this->faker->word,
            'ship_address' => $this->faker->address,
            'ship_city' => $this->faker->city,
            'ship_state' => $this->faker->state,
            'ship_zip' => $this->faker->postcode,
            'ship_country' => $this->faker->country,
            'ship_notes' => $this->faker->sentence,
            'ship_tracking' => $this->faker->word,
            'ship_tracking_url' => $this->faker->url,
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
