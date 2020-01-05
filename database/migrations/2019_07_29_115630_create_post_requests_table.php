<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('post_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('post_id')->unsigned()->nullable();
            $table->boolean('is_request_valid')->default(0);
            $table->timestamp('rejected_at')->nullable();
           $table->softDeletes();
$table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('post_requests');
    }
}
