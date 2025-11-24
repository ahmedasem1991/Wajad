<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Category;
use Illuminate\Support\Facades\DB;

$categories = [
    'Electronics' => 'اليكترونيات',
    'Clothes' => 'ملابس',
    'Cars' => 'سيارات',
    'Books' => 'كتب',
    'Home' => 'منزل',
    'Fashon' => 'موضة',
    'Food' => 'طعام',
];

DB::transaction(function () {
    DB::table('categories')->delete();
});

foreach ($categories as $key => $value) {
}

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $key,
            'name_ar' => $value,
            'description_en' => $this->faker->paragraph(),
            'description_ar' => $this->faker->paragraph(),
            'image' => 'images/profile/default-profile.png',

        ];
    }
}
