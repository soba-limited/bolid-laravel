<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CPost>
 */
class CPostFactory extends Factory
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
            'user_id' => 1,
            'title' => $this->faker->realText(20),
            'state' => $this->faker->numberBetween($min=0, $max=1),
            'c_cat_id' => $this->faker->numberBetween($min=1, $max=18),
            'date' => $this->faker->date('Y.m.d'),
            'limite_date' => $this->faker->date('Y.m.d'),
            'reward' => '10,000円',
            'number_of_people' => $this->faker->numberBetween($min=10, $max=100).'人',
            'content' => $this->faker->realText(144),
        ];
    }
}