<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_reference_number')->nullable();
            $table->string('generate_reference_number')->nullable();
            $table->string('assign_reference_number')->nullable();
            $table->string('corporate_assign_reference_number')->nullable();
            $table->integer('type')->default(1);//default  (single)
            $table->integer('status')->default(1);// default (In stock)
            $table->integer('quantity')->default(1);
            $table->string('qrcode_url')->unique();
            $table->string('image')->nullable();
            $table->string('available_period')->default(1);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->integer('package_product_pivot_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('corporate_id')->nullable();
            $table->tinyInteger('printed')->define(0);

            $table->integer('item_id')->unsigned()->nullable();
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
        Schema::dropIfExists('qrcodes');
    }
}
