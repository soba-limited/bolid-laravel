<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DShopDTag>
 */
class DShopDTagFactory extends Factory
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
            'd_tag_id' => $this->faker->numberBetween($min=1, $max=20),
            'd_shop_id' => $this->faker->numberBetween($min=1, $max=100),
        ];
    }
}
