<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LPost;
use App\Models\User;
use App\Models\LSeries;
use App\Models\LCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LPost>
 */
class LPostFactory extends Factory
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
            'user_id' => $this->faker->numberBetween($min=1, $max=2),
            'l_series_id' => $this->faker->numberBetween($min=1, $max=10),
            'l_category_id' => $this->faker->numberBetween($min=1, $max=44),
            'title' => $this->faker->realText(30),
            'sub_title' => $this->faker->realText(50),
            'discription' => $this->faker->realText(300),
            'content' => $this->faker->realText(1000),
            'state' => $this->faker->numberBetween($min=0, $max=1),
        ];
    }
}