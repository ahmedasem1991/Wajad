<?php

namespace Database\Factories;

use App\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->sentence(),
            'name_ar' => $this->faker->sentence(),
            'description_en' => $this->faker->sentence(),
            'description_ar' => $this->faker->sentence(),
            'image' => $this->faker->image(),
            'sub_category_id' => function () {
                return SubCategory::factory()->create()->id;
            },
        ];
    }
}
