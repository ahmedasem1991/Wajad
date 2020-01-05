<?php

namespace App\Console\Commands;

use App\Post;
use App\User;
use App\Brand;
use App\City;
use App\Color;
use App\Item;
use App\Model;
use App\SubCategory;
use Illuminate\Console\Command;

class SeedPosts extends Command
{
    protected $signature = 'seed:posts';

    protected $description = 'Command description';

    public function handle()
    {
        $usersIds = User::normalusers()->get()->pluck('id');
        $modelIds = Model::get()->pluck('id');
        $colorIds = Color::get()->pluck('id');
        $subCategoriesIds = SubCategory::get()->pluck('id');
        $brandIds = Brand::get()->pluck('id');
        $citiesIds = City::get()->pluck('id');
        $itemsIds = Item::get()->pluck('id');

        $postsCount = $this->ask('Posts Count', 10);

        $postRelatedToItems = $this->ask('Posts Are Related Into Current Items', 5);

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < $postsCount; $i++) {
            $posts = Post::create([
                'title' => $faker->text(),
                'description' => $faker->paragraph(),
                'publisher_id' => $usersIds->random(),
                'status' => $faker->boolean(),
                'owner_id' => $usersIds->random(),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'approval_status' => $faker->boolean(),
                'sub_category_id' => $subCategoriesIds->random(),
                'model_id' => $modelIds->random(),
                'color_id' => $colorIds->random(),
                'appearance_status' => $faker->boolean(),
                'brand_id' => $brandIds->random(),
                'city_id' => $citiesIds->random(),
                'reward' => $faker->numberBetween(5, 1000) . 'USD'
            ]);
        }
        $posts = Post::all();

        foreach ($posts as $post) {
            if ($post->isLost()) {
                $post->update([
                    'losted_at' => $faker->dateTime()
                ]);
            }

            if ($post->isFound()) {
                $post->update([
                    'founded_at' => $faker->dateTime()
                ]);
            }
        }

        $posts = Post::get()->random($postRelatedToItems);

        $posts->each(function ($post) {
            $post->update([
                'item_id' => Item::where('owner_id', $post->owner_id)->first()->id ?? null
            ]);
        });

        $this->line('|-----------------------|');
        $this->line('|-- Posts Seeder Done --|');
        $this->line('|-----------------------|');
    }
}
