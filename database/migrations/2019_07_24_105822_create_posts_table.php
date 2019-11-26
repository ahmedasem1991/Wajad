<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('item_id')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('appearance_status')->default(0);
            $table->boolean('open_status')->default(1);
            $table->integer('approval_status')->default(0);
            $table->integer('reports_number')->default(0);
            $table->integer('reward')->default(0);
            $table->unsignedInteger('owner_id')->nullable();
            $table->unsignedInteger('founder_id')->nullable();
            $table->unsignedInteger('publisher_id')->nullable();
            $table->timestamp('losted_at')->nullable();
            $table->timestamp('founded_at')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->unsignedInteger('model_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
