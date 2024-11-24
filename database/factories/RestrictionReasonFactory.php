<?php

namespace Database\Factories;

use App\Models\RestrictionReason;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestrictionReasonFactory extends Factory
{
    /**
     * Имя связанной модели.
     *
     * @var string
     */
    protected $model = RestrictionReason::class;

    /**
     * Определение состояния модели.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(2, true), // Генерация уникального имени
            'description' => $this->faker->sentence,         // Генерация описания
        ];
    }
}
