<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'name_en' => $faker->sentence(),
        'name_ar' => $faker->sentence(),
        'description_en' => $faker->sentence(),
        'description_ar' => $faker->sentence(),
        'image' => 'images/posts/post1.jpg',
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
