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
            $table->integer('type')->default(3); // Super Admin
            $table->integer('status')->default(1); // Active
            $table->char('mobile_number')->unique()->nullable();
            $table->integer('mobile_country_id')->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('corporate_id')->nullable();
            $table->boolean('receive_emails')->default(false);
            $table->boolean('receive_push_notifications')->default(false);
            $table->string('default_distance_unit')->default('kilo');
            $table->text('device_token')->nullable();
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
