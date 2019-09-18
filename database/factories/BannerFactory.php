<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
       
            'title_en' => $faker->sentence(6),
            'title_ar' => $faker->sentence(6),
            'description_en' => $faker->paragraph(20),
            'description_ar' => $faker->paragraph(20),
            'image' => 'images/banners/'.$faker->sentence(1).'png',
           
    ];
});
