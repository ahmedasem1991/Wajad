<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$categories = [
    'Electronics' => 'اليكترونيات',
    'Clothes'  =>  'ملابس',
    'Cars' =>    'سيارات',
    'Books' =>     'كتب',
    'Home' => 'منزل',
    'Fashon' =>  'موضة',
    'Food' =>  'طعام',
];

DB::transaction(function () {
    DB::table('categories')->delete();
});

foreach ($categories as $key => $value) {
    $factory->define(Category::class, function (Faker $faker) use ($key, $value) {
        return [
            'name_en' => $key,
            'name_ar' =>  $value,
            'description_en' =>  $faker->paragraph(),
            'description_ar' => $faker->paragraph(),
            'image' => 'images/profile/default-profile.png',

        ];
    });
}
