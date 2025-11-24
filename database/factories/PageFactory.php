<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->slug(),
            'title_en' => $this->faker->sentence(6),
            'body_en' => $this->faker->paragraph(25),
            'title_ar' => $this->faker->sentence(6),
            'body_ar' => $this->faker->paragraph(25),
        ];
    }
}
