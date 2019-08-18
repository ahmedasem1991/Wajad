<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersItemsQrcodesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_items_qrcodes_pivot', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('user_id')->nullable();
            $table->Integer('item_id')->nullable();
            $table->Integer('qrcode_id')->nullable();
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
        Schema::dropIfExists('users_items_qrcodes_pivot');
    }
}
