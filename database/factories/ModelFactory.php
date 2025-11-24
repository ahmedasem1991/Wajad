<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name_en' => $faker->sentence(),
        'name_ar' => $faker->sentence(),
        'description_en' => $faker->sentence(),
        'description_ar' => $faker->sentence(),
        'image' => 'images/profile/default-profile.png',
        'brand_id' => function () {
            return factory(App\Brand::class)->create()->id;
        },
    ];
});
