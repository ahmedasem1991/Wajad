<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->email,
        'password' => bcrypt('123456789'),
        'default_distance_unit' => 'kilo',
        'type' => User::Types['user'],
        'status' => 1,
        'mobile_number' => $faker->phoneNumber,
        'receive_push_notifications' => $faker->boolean(),
        'is_mobile_number_verified' => $faker->boolean(),
        'image' => 'images/profile/default-profile.png',
        'email_verified_at' => Carbon::now()->toDateTimeString(),
        'receive_emails' => 1,
        'posts_number' => 0,
    ];
});
