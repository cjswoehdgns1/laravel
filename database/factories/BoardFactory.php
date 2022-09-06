<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'subject' => $this->faker->name,
            'contents' => $this->faker->realText,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
