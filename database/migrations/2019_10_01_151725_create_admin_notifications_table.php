<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->Increments('id');
            $table->text('body');
            $table->string('send_to')->nullable();
            $table->text('users')->nullable();
            $table->string('search_user')->nullable();
            $table->string('send_by')->nullable();
            $table->string('country_id')->nullable();
            $table->string('region_id')->nullable();
            $table->string('city_id')->nullable();
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
        Schema::dropIfExists('admin_notifications');
    }
}
