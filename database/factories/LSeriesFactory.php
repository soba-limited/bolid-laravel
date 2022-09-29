<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LSeries;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LSeries>
 */
class LSeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->realText(10),
        ];
    }
}