<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CCard>
 */
class CCardFactory extends Factory
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
            'c_profile_id' => $this->faker->numberBetween($min=3, $max=25),
            'title' => $this->faker->realText(20),
        ];
    }
}