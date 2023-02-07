<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomRating = random_int(1, 5);

        return [
            'id' => Str::uuid(),
            'content' => $this->faker->sentence(5, true),
            'rating' => $randomRating,
        ];
    }
}
