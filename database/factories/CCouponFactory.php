<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CCoupon>
 */
class CCouponFactory extends Factory
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
            'c_profile_id' => 1,
            'title' => $this->faker->realText(20),
            'limit' => $this->faker->date('Y.m.d').'まで',
        ];
    }
}