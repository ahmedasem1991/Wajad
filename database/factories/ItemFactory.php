<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Item;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6),
            'details' => $this->faker->paragraph(15),
            'status' => $this->faker->numberBetween(1, 3),
            'model_id' => function () {
                return \App\Model::factory()->create()->id;
            },
            'color_id' => function () {
                return \App\Color::factory()->create()->id;
            },
            'owner_id' => function () {
                return \App\User::factory()->create()->id;
            },
            'sub_category_id' => function () {
                return \App\SubCategory::factory()->create()->id;
            },
            'brand_id' => function () {
                return \App\Brand::factory()->create()->id;
            },
        ];
    }
}
