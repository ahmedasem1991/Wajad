<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        Schema::table('answers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('item_images', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->foreign('item_id')->references('id')->on('items')->onDelete('CASCADE');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->foreign('item_id')->references('id')->on('items')->onDelete('SET NULL');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('founder_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('publisher_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('SET NULL');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('SET NULL');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('SET NULL');
        });

        Schema::table('user_verifications', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('SET NULL');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('SET NULL');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('SET NULL');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
        });

        Schema::table('brand_sub_category', function (Blueprint $table){
            $table->engine = "InnoDB";
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('SET NULL');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');
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
