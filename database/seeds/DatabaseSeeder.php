<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(PageSeeder::class);

        $users = factory(App\Item::class, 15)
            ->create()
            ->each(function ($user) {
                $user->model()->create(
                    factory(App\Model::class, 5)->create()->id
                );
                $user->color()->create(
                    factory(App\Color::class, 5)->create()->id
                );
                $user->owner()->create(
                    factory(App\User::class, 5)->create()->id
                );
            });
    }
}
