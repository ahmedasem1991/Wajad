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
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('region_id')->references('id')->on('regions');
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
