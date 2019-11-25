<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'details' => $faker->paragraph(15),
        'status' => $faker->numberBetween(1, 3),
        'details_if_lost' => $faker->paragraph(15),
        'sub_category_id' => function () {
            return factory(App\SubCategory::class)->create()->id;
        },
        'brand_id' => function () {
            return factory(App\Brand::class)->create()->id;
        },
        'model_id' => function () {
            return factory(App\Model::class)->create()->id;
        },
        'color_id' => function(){
            return factory(App\Color::class)->create()->id;
        },
        'radius' => $faker->numberBetween(5, 30),
        'owner_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'is_public' => $faker->boolean()
    ];
});
