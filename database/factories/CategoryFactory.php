<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_en' => $faker->sentence(6),
        'name_ar' => 'لوريم ايبسوم دولار سيت اميت',
        'icon' => 'default-icon.png',
        'items_has_default_image' => false,
        'default_image' => null
    ];
});
