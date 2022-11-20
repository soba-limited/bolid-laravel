<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CItem>
 */
class CItemFactory extends Factory
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
            'c_profile_id' => $this->faker->numberBetween($min=13, $max=24),
            'title' => $this->faker->realText(20),
            'category' => $this->faker->realText(10),
        ];
    }
}
