<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->float('latitude', 12, 7)->unsigned()->nullable();
            $table->float('longitude', 12, 7)->unsigned()->nullable();
            $table->integer('radius')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
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
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['city_id']);
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign(['region_id']);
        });

        Schema::dropIfExists('cities');
    }
}
