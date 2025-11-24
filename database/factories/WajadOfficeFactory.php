<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WajadOffice;
use Faker\Generator as Faker;

$factory->define(WajadOffice::class, function (Faker $faker) {
    // Data
    $data = [
        'location' => $faker->paragraph(5),
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'status' => 1,
        'image' => 'images/profile/default-profile.png',
    ];

    // English Data
    $data['name_en'] = $faker->sentence;
    $data['details_en'] = $faker->paragraph(15);
    $data['address_en'] = $faker->paragraph(15);

    // Arabic Data
    $data['details_ar'] = $faker->text();
    $data['address_ar'] = $faker->text();

    $faker = \Faker\Factory::create('ar_JO');

    $data['name_ar'] = $faker->company;

    return $data;
});
