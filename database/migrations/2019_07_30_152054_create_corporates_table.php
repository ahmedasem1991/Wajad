<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->nullable();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('mobile_number')->nullable();
            $table->integer('mobile_country_id')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('location')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('status')->default(0);
            $table->text('image')->nullable();
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('corporates');
    }
}
