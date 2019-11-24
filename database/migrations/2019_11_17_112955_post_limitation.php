<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostLimitation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_limitation', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unique();
            $table->integer('posts_limitation')->default(env('POST_LIMITATION',50));
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
        Schema::dropIfExists('posts_limitation');
    }
}
