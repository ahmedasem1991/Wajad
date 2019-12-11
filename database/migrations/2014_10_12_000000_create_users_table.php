<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('default_distance_unit')->default('kilo');

            $table->integer('type')->default(3); // Super Admin
            $table->integer('status')->default(1); // Active
            $table->integer('mobile_country_id')->unsigned()->nullable();
            $table->integer('corporate_id')->nullable();
            $table->integer('city_id')->nullable();
            //$table->integer('posts_limitation')->default(env('POST_LIMITATION',50));
            $table->integer('posts_limitation')->nullable();

            $table->text('device_token')->nullable();

            $table->char('mobile_number')->unique()->nullable();

            $table->boolean('receive_emails')->default(false);
            $table->boolean('receive_push_notifications')->default(false);
            $table->boolean('is_mobile_number_verified')->default(false);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('image', 500)->default("images/profile/default-profile.png");
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
        Schema::dropIfExists('users');
    }
}
