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
        'approval_status' => 1,
        'founder_id' => null,
        'publisher_id' => null,
        'losted_at' => null,
        'founded_at' => null,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'sub_category_id' => function () {
            return factory(\App\SubCategory::class)->create()->id;
        },
        'model_id' => function () {
            return factory(\App\Model::class)->create()->id;
        },
        'color_id' => null,
    ];
});
