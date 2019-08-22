<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text')->nullable();
            $table->string('background')->nullable();
            $table->string('logo')->nullable();
            $table->string('name')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('item_id')->unsigned()->nullable();
            $table->Boolean('active')->default(1);
            $table->string('link')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrcodes');
    }
}
