<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration
{

	public function up()
	{
		Schema::create('questions', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('founder_id')->unsigned()->nullable();
			$table->integer('corporate_id')->unsigned()->nullable();
			$table->integer('post_id')->unsigned();
			$table->char('question');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}
