<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'key' => $faker->slug(),
        'title_en' => $faker->sentence(6),
        'body_en' => $faker->paragraph(25),
        'title_ar' => $faker->sentence(6),
        'body_ar' => $faker->paragraph(25),
    ];
});
