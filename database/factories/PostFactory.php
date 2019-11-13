<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph(15),
        'item_id' => null,
        'status' => $faker->boolean(),
        'appearance_status' => $faker->boolean(),
        'open_status' => $faker->boolean(),
        'owner_id' => null,
        'founder_id' => null,
        'publisher_id' => null,
        'losted_at' => null,
        'founded_at' => null,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'sub_category_id' => 1,
        'model_id' => 1,
        'color_id' => 1,

    ];
});
