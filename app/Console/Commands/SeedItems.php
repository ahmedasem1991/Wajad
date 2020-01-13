<?php

namespace App\Console\Commands;

use App\Brand;
use App\Color;
use App\Item;
use App\Model;
use App\SubCategory;
use App\User;
use Illuminate\Console\Command;

class SeedItems extends Command
{
    protected $signature = 'seed:items';

    protected $description = 'Seed Items';

    public function handle()
    {
        $usersIds = User::normalusers()->get()->pluck('id');
        $modelIds = Model::get()->pluck('id');
        $colorIds = Color::get()->pluck('id');
        $subCategoriesIds = SubCategory::get()->pluck('id');
        $brandIds = Brand::get()->pluck('id');

        $itemsCount = $this->ask('Items Count', 50);

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < (int) $itemsCount; $i++) {
            Item::create([
                'title' => $faker->text(10),
                'details' => $faker->paragraph(),
                'owner_id' => $usersIds->random(),
                'model_id' => $modelIds->random(),
                'color_id' => $colorIds->random(),
                'sub_category_id' => $subCategoriesIds->random(),
                'brand_id' => $brandIds->random(),
                'images' => [
                    "images/posts/post1.jpg",
                    "images/posts/post2.jpg",
                    "images/posts/post3.jpg",
                    "images/posts/post4.jpg",
                    "images/posts/post5.jpg",
                ]
            ]);
        }

        $this->info('|------------------------|');
        $this->info('| Items Seeder Completed |');
        $this->info('|------------------------|');
    }
}
