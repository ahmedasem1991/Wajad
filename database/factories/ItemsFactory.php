<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'details' => $faker->paragraph(15),
        'status' => $faker->numberBetween(1, 3),
        'model_id' => function () {
            return factory(App\Model::class)->create()->id;
        },
        'color_id' => function(){
            return factory(App\Color::class)->create()->id;
        },
        'owner_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
