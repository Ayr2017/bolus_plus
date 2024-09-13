<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class BolusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => Str::ulid($this->faker->unique()->dateTime()),
            'version' => $this->faker->numberBetween(1, 10),
            'batch_number' => $this->faker->unique()->randomNumber(),
            'produced_at' => $this->faker->dateTime(),
        ];
    }
}
