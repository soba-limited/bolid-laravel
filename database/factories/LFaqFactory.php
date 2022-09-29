<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LFaq>
 */
class LFaqFactory extends Factory
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
            'type' => $this->faker->numberBetween($min=0, $max=1),
            'question' => $this->faker->realText(30),
            'answer' => $this->faker->realText(30),
        ];
    }
}