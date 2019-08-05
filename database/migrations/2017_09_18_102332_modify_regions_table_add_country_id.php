<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyregionsTableAddCountryID extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) 
        {
             
            $table->integer( 'country_id' )->unsigned()->default(189);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE');
        });

 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regions', function (Blueprint $table) 
        {
            $table->dropForeign(['country_id']);
            $table->dropColumn('country_id');
        });

 
    }
}
