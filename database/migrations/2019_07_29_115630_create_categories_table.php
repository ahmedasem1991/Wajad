<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_en');
			$table->string('name_ar');
			$table->boolean('items_has_default_image')->default(0);
			$table->string('default_image', 255)->nullable();
			$table->string('icon', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}