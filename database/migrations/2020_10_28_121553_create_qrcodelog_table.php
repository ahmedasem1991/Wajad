<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrcodelogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrcode_log', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->default('0.0.0.0');
            $table->string('location')->default('https://www.google.com/maps/search/?api=1&query=21.4498898,39.4913423');
            $table->string('lat')->default('21.4498898');
            $table->string('lng')->default('39.4913423');
            $table->string('device_type')->default('default web');
            $table->unsignedInteger('qrcode_id')->nullable();
            $table->foreign('qrcode_id')->references('id')->on('qrcodes');
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
        Schema::dropIfExists('qrcodelog');
    }
}
