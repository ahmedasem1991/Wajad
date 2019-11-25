<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemImagesTable extends Migration
{

    public function up()
    {
        Schema::create('item_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->string('image', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('item_images');
    }
}
