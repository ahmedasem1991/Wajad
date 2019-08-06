<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Item;

class DatabaseSeeder extends Seeder {

	public function run()
	{
<<<<<<< HEAD
		Model::unguard();
		$this->call(CategoriesFactory::class);
		$this->call(ItemsFactory::class);
=======
		factory(Item::class, 100)->create();
>>>>>>> 2019-07-29-SCHEMA-MODIFICATION
	}
}