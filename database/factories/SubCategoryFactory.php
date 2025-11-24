<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\SubCategory;

class SubCategoryFactory extends Factory
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
            'image' => 'images/posts/post1.jpg',
            'category_id' => function () {
                return \App\Category::factory()->create()->id;
            },
        ];
    }
}
