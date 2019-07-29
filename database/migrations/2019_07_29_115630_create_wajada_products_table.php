<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWajadaProductsTable extends Migration {

	public function up()
	{
		Schema::create('wajada_products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->mediumText('description');
			$table->string('image', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('wajada_products');
	}
}