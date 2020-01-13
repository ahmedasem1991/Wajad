<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corporate;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Corporate::class, function (Faker $faker) {
    $data = [
        'unique_id' => 'WJ-' . Str::random(15),
        'location' => $faker->paragraph(5),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'status' => 1,
        'image' => 'images/profile/default-profile.png',
    ];

    # English Data
    $data['name_en'] =  $faker->text(5);
    $data['details_en'] = $faker->paragraph(15);
    $data['address_en'] = $faker->paragraph(15);

    # Arabic Data
    $data['details_ar'] = $faker->text();
    $data['address_ar'] = $faker->text(100);

    $faker = \Faker\Factory::create('ar_JO');

    $data['name_ar'] = $faker->company;

    return $data;
});
