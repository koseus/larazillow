<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bedrooms' => fake()->numberBetween(1, 7),
            'bathrooms' => fake()->numberBetween(1, 7),
            'area' => fake()->numberBetween(30, 400),
            'city' => fake()->city(),
            'zipcode' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_num' => fake()->numberBetween(1, 7),
            'price' => (round(fake()->numberBetween(50_000, 2_000_000) / 1000, 0) * 1000)
        ];
    }
}
