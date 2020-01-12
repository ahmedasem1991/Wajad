<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Color;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph(15),
        'status' => $faker->boolean(),
        'appearance_status' =>  1,
        'open_status' => 1,
        'owner_id' => null,
        'approval_status' => 1,
        'founder_id' => null,
        'publisher_id' => null,
        'losted_at' => null,
        'founded_at' => null,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'sub_category_id' =>  $faker->numberBetween(1, 13),
        'model_id' =>  $faker->numberBetween(1, 5),
        'item_id' => null,
        'color_id' =>  $faker->numberBetween(1, 13),
        'city_id' =>  $faker->numberBetween(1, 147),
        'brand_id' =>  $faker->numberBetween(1, 15),
        'publisher_id' => $faker->numberBetween(4, 8),
        'reward' => $faker->sentence
    ];
});
