<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'admin', 'editor'
        Schema::create('roles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('slug');
            $table->string('name')->nullable();
            $table->integer('corporate_id')->nullable();
            $table->integer('limitation_of_posts')->default(10);
            $table->boolean('default_group')->default(0);
            $table->boolean('auto_approve')->default(0);
            $table->boolean('mobile_group')->default(0);
            $table->integer('posts_period')->default(30);
            $table->integer('free_qrcodes')->default(10);
            $table->integer('available_period_qrcodes')->default(30);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('role_permission', function (Blueprint $table) {
            $table->Integer('role_id');
            $table->string('permission_slug');
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('role_id')
            //       ->references('id')
            //       ->on('roles')
            //       ->onDelete('cascade');
            $table->primary(['role_id', 'permission_slug']);
        });
        Schema::create('role_user', function (Blueprint $table) {
            $table->Integer('role_id');
            $table->Integer('user_id');
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('role_id')
            //       ->references('id')
            //       ->on('roles')
            //       ->onDelete('cascade');

            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');
            $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
    }
}
