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
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('default_distance_unit')->default('kilo');
            $table->boolean('first_time_login')->default(true);

            $table->integer('type')->default(3); // Super Admin
            $table->integer('status')->default(1); // Active
            $table->integer('mobile_country_id')->unsigned()->nullable();
            $table->integer('corporate_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('role_id')->nullable();
            //$table->integer('posts_number')->default(env('POST_LIMITATION',50));
            $table->integer('posts_number')->default(0);
            $table->integer('max_posts_number')->default(100);
            $table->string('social_name')->nullable();
            $table->boolean('is_social_user')->default(0);
            $table->string('created_from')->nullable();

            $table->text('device_token')->nullable();

            $table->char('mobile_number')->nullable();

            $table->boolean('receive_emails')->default(false);
            $table->boolean('receive_push_notifications')->default(false);
            $table->boolean('is_mobile_number_verified')->default(false);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('image', 500)->default("images/profile/default-profile.png");
            $table->string('language', 5)->default('en');
            $table->integer('quick_user_id')->nullable();
            $table->string('quick_user_password')->default('QuickBlox1!');
            $table->integer('v_mobile_number')->nullable();
            $table->integer('v_mobile_country_id')->nullable();
            $table->string('social_id')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
