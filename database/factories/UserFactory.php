<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        "name" => $faker->name(),
        "email" => $faker->email,
        "password" => bcrypt("123456789"),
        "type" => $faker->numberBetween(1, 3),
        "status" => $faker->boolean(),
        "mobile_number" => $faker->phoneNumber,
        "mobile_country_id" => null,
        "email_verified_at" => $faker->dateTime(),
        "city_id" => null,
        "corporate_id" => null,
        "show_my_data" => $faker->boolean(),
    ];
});
