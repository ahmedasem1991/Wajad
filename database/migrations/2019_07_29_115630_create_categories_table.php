<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->json('title');
			$table->string('icon', 255);
			$table->boolean('has_default_image');
			$table->string('default_image', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}