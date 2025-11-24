<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph(15),
            'status' => $this->faker->boolean(),
            'appearance_status' => 1,
            'open_status' => 1,
            'owner_id' => null,
            'approval_status' => 1,
            'founder_id' => null,
            'publisher_id' => null,
            'losted_at' => null,
            'founded_at' => null,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'sub_category_id' => $this->faker->numberBetween(1, 13),
            'model_id' => $this->faker->numberBetween(1, 5),
            'item_id' => null,
            'color_id' => $this->faker->numberBetween(1, 13),
            'city_id' => $this->faker->numberBetween(1, 147),
            'brand_id' => $this->faker->numberBetween(1, 15),
            'publisher_id' => $this->faker->numberBetween(4, 8),
            'reward' => $this->faker->sentence,
        ];
    }
}
