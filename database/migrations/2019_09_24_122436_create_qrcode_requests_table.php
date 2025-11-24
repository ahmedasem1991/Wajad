<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrcodeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcode_requests', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('number');
            $table->Integer('corporate_id')->unsigned()->nullable();
            $table->Integer('corporate_admin_id')->unsigned()->nullable();
            $table->Integer('status')->default(0);
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
        Schema::dropIfExists('qrcode_requests');
    }
}
