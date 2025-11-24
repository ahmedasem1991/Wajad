<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name_en' => $faker->sentence(),
        'name_ar' => $faker->sentence(),
        'description_en' => $faker->sentence(),
        'description_ar' => $faker->sentence(),
        'image' => $faker->image(),
        'sub_category_id' => function () {
            return factory(SubCategory::class)->create()->id;
        },
    ];
});
