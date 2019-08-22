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
        'longitude' => '56.018',
        'latitude' => '54630.06',
        'radius' => $faker->numberBetween(5, 30),
        'owner_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function(){
            return factory(App\Category::class)->create()->id;
        },
        'founder_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'is_public' => $faker->boolean()
    ];
});
