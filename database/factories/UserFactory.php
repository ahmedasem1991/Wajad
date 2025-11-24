<?php

namespace Database\Factories;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email,
            'password' => bcrypt('123456789'),
            'default_distance_unit' => 'kilo',
            'type' => User::Types['user'],
            'status' => 1,
            'mobile_number' => $this->faker->phoneNumber,
            'receive_push_notifications' => $this->faker->boolean(),
            'is_mobile_number_verified' => $this->faker->boolean(),
            'image' => 'images/profile/default-profile.png',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'receive_emails' => 1,
            'posts_number' => 0,
        ];
    }
}
