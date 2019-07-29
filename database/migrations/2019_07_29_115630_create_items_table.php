<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255)->default(' ');
			$table->mediumText('details');
			$table->integer('status')->unsigned()->default('1');
			$table->mediumText('details_if_lost')->nullable();
			$table->geometry('longitude')->nullable();
			$table->geometry('latitude')->nullable();
			$table->integer('radius')->unsigned()->nullable();
			$table->integer('owner_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned()->nullable();
			$table->integer('founder_id')->unsigned()->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('items');
	}
}