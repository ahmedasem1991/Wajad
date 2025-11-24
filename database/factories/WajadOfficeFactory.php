<?php



namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\WajadOffice;

class WajadOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = [
            'location' => $this->faker->paragraph(5),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'status' => 1,
            'image' => 'images/profile/default-profile.png',
        ];

        // English Data
        $data['name_en'] = $this->faker->sentence;
        $data['details_en'] = $this->faker->paragraph(15);
        $data['address_en'] = $this->faker->paragraph(15);

        // Arabic Data
        $data['details_ar'] = $this->faker->text();
        $data['address_ar'] = $this->faker->text();

        $faker = \Faker\Factory::create('ar_JO');

        $data['name_ar'] = $this->faker->company;

        return $data;
    }
}
