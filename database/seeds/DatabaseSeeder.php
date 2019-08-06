<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Item;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		factory(Item::class, 100)->create();
	}
}