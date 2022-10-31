<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DShop>
 */
class DShopFactory extends Factory
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
            'url' => $this->faker->url,
            'name' => $this->faker->realText(20),
            'description' => $this->faker->realText(144),
            'image_permission' => $this->faker->numberBetween($min=0, $max=1),
        ];
    }
}
