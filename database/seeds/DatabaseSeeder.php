<?php

use App\Item;
use PageSeeder;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $this->call(PageSeeder::class);
    }
}
