<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'icon' => 'default-icon.png',
        'has_default_image' => $faker->boolean(),
        'default_image' => 'default-image.jpg'
    ];
});
