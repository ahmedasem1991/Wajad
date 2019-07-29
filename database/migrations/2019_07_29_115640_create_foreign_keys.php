<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('items', function (Blueprint $table) {
			$table->foreign('owner_id')->references('id')->on('users')
				->onDelete('set null')
				->onUpdate('set null');
		});
		Schema::table('items', function (Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
				->onDelete('set null')
				->onUpdate('set null');
		});
		Schema::table('items', function (Blueprint $table) {
			$table->foreign('founder_id')->references('id')->on('users')
				->onDelete('set null')
				->onUpdate('no action');
		});
		Schema::table('item_images', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')
				->onDelete('set null')
				->onUpdate('no action');
		});
		Schema::table('questions', function (Blueprint $table) {
			$table->foreign('founder_id')->references('id')->on('users')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('questions', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('answers', function (Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('answers', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('answers', function (Blueprint $table) {
			$table->foreign('request_id')->references('id')->on('item_requests')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('item_requests', function (Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('item_requests', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('cards', function (Blueprint $table) {
			$table->foreign('item_id')->references('id')->on('items')
				->onDelete('set null')
				->onUpdate('restrict');
		});
		Schema::table('cards', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('wajada_products')
				->onDelete('set null')
				->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('items', function (Blueprint $table) {
			$table->dropForeign('items_owner_id_foreign');
		});
		Schema::table('items', function (Blueprint $table) {
			$table->dropForeign('items_category_id_foreign');
		});
		Schema::table('items', function (Blueprint $table) {
			$table->dropForeign('items_founder_id_foreign');
		});
		Schema::table('item_images', function (Blueprint $table) {
			$table->dropForeign('item_images_item_id_foreign');
		});
		Schema::table('questions', function (Blueprint $table) {
			$table->dropForeign('questions_founder_id_foreign');
		});
		Schema::table('questions', function (Blueprint $table) {
			$table->dropForeign('questions_item_id_foreign');
		});
		Schema::table('answers', function (Blueprint $table) {
			$table->dropForeign('answers_question_id_foreign');
		});
		Schema::table('answers', function (Blueprint $table) {
			$table->dropForeign('answers_user_id_foreign');
		});
		Schema::table('answers', function (Blueprint $table) {
			$table->dropForeign('answers_request_id_foreign');
		});
		Schema::table('item_requests', function (Blueprint $table) {
			$table->dropForeign('item_requests_user_id_foreign');
		});
		Schema::table('item_requests', function (Blueprint $table) {
			$table->dropForeign('item_requests_item_id_foreign');
		});
		Schema::table('cards', function (Blueprint $table) {
			$table->dropForeign('cards_item_id_foreign');
		});
		Schema::table('cards', function (Blueprint $table) {
			$table->dropForeign('cards_product_id_foreign');
		});
	}
}
