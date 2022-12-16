<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CPostApp>
 */
class CPostAppFactory extends Factory
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
            'user_id' => $this->faker->numberBetween($min=2, $max=24),
            'c_post_id' => $this->faker->numberBetween($min=1, $max=100),
            'state' => $this->faker->numberBetween($min=0, $max=2),
            'comment' => $this->faker->realText('30'),
        ];
    }
}