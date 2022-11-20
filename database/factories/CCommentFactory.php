<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CComment>
 */
class CCommentFactory extends Factory
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
            'user_id' => $this->faker->numberBetween($min=3, $max=24),
            'to_user_id' => $this->faker->numberBetween($min=3, $max=24),
            'title' => $this->faker->realText(20),
            'content' => $this->faker->realText(144),
        ];
    }
}