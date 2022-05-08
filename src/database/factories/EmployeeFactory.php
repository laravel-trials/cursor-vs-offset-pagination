<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'added_by' => $this->faker->numberBetween(1, 1000000),
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'hire_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'termination_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'phone' => $this->faker->phoneNumber,
            'home_phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'country' => $this->faker->country,
            'notes' => $this->faker->sentence,
            'photo' => $this->faker->imageUrl(),
            'photo_thumb' => $this->faker->imageUrl(),
            'salary' => $this->faker->randomFloat(2, 0, 100000),
            'currency' => $this->faker->currencyCode,
            'pay_frequency' => $this->faker->randomElement(['weekly', 'biweekly', 'monthly', 'quarterly', 'yearly']),
            'pay_type' => $this->faker->randomElement(['hourly', 'salary']),
            'pay_method' => $this->faker->randomElement(['bank', 'cash', 'check']),
            'pay_bank' => $this->faker->company,
            'pay_iban' => $this->faker->iban,
            'created_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
