<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('post_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->boolean('is_request_valid')->default(0);
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('post_requests');
    }
}
