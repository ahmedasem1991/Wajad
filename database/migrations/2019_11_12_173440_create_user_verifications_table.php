<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->char('mobile_number');
            $table->string('password');
            $table->integer('type')->default(1); // Normal User
            $table->integer('status')->default(0); // Active
            $table->integer('verification_code');
            $table->timestamp('expired_period'); // In Minutes
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('corporate_id')->nullable();
            $table->integer('attemp')->default(1); 
            $table->rememberToken();
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
        Schema::dropIfExists('user_verifications');
    }
}
