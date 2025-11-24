<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Brand;
use App\SubCategory;

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
