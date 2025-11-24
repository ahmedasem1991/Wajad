<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('SET NULL');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('SET NULL');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('item_id')->references('id')->on('items')->onDelete('SET NULL');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('founder_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('publisher_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('SET NULL');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('SET NULL');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('founder_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('SET NULL');
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('post_request_id')->references('id')->on('post_requests')->onDelete('SET NULL');
        });

        Schema::table('user_verifications', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('SET NULL');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('SET NULL');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('SET NULL');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
        });

        Schema::table('brand_sub_category', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('SET NULL');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
        });

        Schema::table('assign_qrcodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('SET NULL');
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('product_id')->references('id')->on('products')->onDelete('SET NULL');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('SET NULL');
        });

        Schema::table('corporate_assign_qrcodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL');
        });

        Schema::table('corporate_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
        });

        Schema::table('devices_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });

        Schema::table('generate_qrcodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('created_by')->references('id')->on('users')->onDelete('SET NULL');
        });

        Schema::table('models', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
        });

        Schema::table('package_product_table', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('package_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('corporate_id')->references('id')->on('corporates');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('package_id')->references('id')->on('packages');
        });

        Schema::table('post_requests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('SET NULL');
        });

        Schema::table('posts_reports', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('SET NULL');
        });

        Schema::table('qrcode_requests', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('corporate_admin_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
        });

        Schema::table('qrcodes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('corporate_id')->references('id')->on('corporates')->onDelete('SET NULL');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('SET NULL');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys_migration');
    }
}
