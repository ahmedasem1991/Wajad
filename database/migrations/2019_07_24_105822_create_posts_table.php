<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('item_id')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('appearance_status')->default(0);
            $table->boolean('open_status')->default(1);
            $table->boolean('approval_status')->default(0);
            $table->integer('reports_number')->default(0);
            $table->string('reward')->nullable();
            $table->unsignedInteger('owner_id')->nullable();
            $table->unsignedInteger('founder_id')->nullable();
            $table->unsignedInteger('publisher_id')->nullable();
            $table->string('publisher_type')->nullable(); //1-user  2-corporate   3-admin
            $table->unsignedInteger('corporate_id')->nullable();
            $table->timestamp('losted_at')->nullable();
            $table->timestamp('founded_at')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->unsignedInteger('model_id')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('founder_name')->nullable();
            $table->string('founder_email')->nullable();
            $table->string('founder_mobile_number')->nullable();
            $table->string('founder_address')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('owner_mobile_number')->nullable();
            $table->string('owner_address')->nullable();
            $table->unsignedInteger('owner_releated_to_system')->nullable();
            $table->unsignedInteger('founder_releated_to_system')->nullable();
            $table->unsignedInteger('publisher_id')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
