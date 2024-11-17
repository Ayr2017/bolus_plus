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
            'number' => Str::ulid($this->faker->unique()->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null))->toString(),
            'version' => strval($this->faker->numberBetween(1, 10)),
            'batch_number' => strval($this->faker->unique()->randomNumber()),
            'produced_at' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
