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
			$table->string('description_en', 500)->nullable();
            $table->string('description_ar', 500)->nullable();
            $table->string('image')->default('images/default.png');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}