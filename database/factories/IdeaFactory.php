<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(4),
            'content' => $this->faker->paragraph(3),
            'votes' => $this->faker->numberBetween(1, 100),
        ];
    }
}
