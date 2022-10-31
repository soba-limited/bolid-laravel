<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DMallIn>
 */
class DMallInFactory extends Factory
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
            'd_mall_id' => $this->faker->numberBetween($min=1, $max=5),
            'd_shop_id' => $this->faker->numberBetween($min=1, $max=100),
        ];
    }
}
