<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(PageSeeder::class);

        $users = \App\Item::factory()->count(15)
            ->create()
            ->each(function ($user) {
                $user->model()->create(
                    \App\Model::factory()->count(5)->create()->id
                );
                $user->color()->create(
                    \App\Color::factory()->count(5)->create()->id
                );
                $user->owner()->create(
                    \App\User::factory()->count(5)->create()->id
                );
            });
    }
}
