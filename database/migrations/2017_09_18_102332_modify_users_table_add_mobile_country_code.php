<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTableAddMobileCountryCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->integer( 'mobile_no' )->unsigned()->nullable();
            $table->integer( 'mobile_country_id' )->unsigned()->nullable();
            $table->foreign('mobile_country_id')->references('id')->on('countries')->onDelete('CASCADE');
        });

 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) 
        {
            $table->dropForeign(['mobile_country_id']);
            $table->dropColumn('mobile_country_id');
        });

 
    }
}
