<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CoatColor;
use App\Models\Breed;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BreedingBull>
 */
class BreedingBullFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word,
            'semen_supplier' => $this->faker->company,
            'nickname' => $this->faker->name,
            'date_of_birth' => $this->faker->date(),
            'country_of_birth' => $this->faker->country,
            'tag_number' => $this->faker->randomNumber(),
            'semen_code' => $this->faker->randomNumber(),
            'rshn_id' => $this->faker->randomNumber(),
            'coat_color_id' => CoatColor::query()->inRandomOrder()->first()->id, // actual id of coat colors
            'breed_id' => Breed::query()->inRandomOrder()->first()->id, // actual id of breeds
            'is_selected' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'is_own' => $this->faker->boolean,
        ];
    }
}
