<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CPr>
 */
class CPrFactory extends Factory
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
            'user_id' => $this->faker->numberBetween($min=13, $max=24),
            'state' => $this->faker->numberBetween($min=0, $max=1),
            'title' => $this->faker->realText(20),
            'content' => $this->faker->realText(144),
        ];
    }
}