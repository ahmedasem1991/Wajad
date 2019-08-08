<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->mediumText('description');
            $table->integer('days')->nullable()->unsigned();
            $table->integer('products_per_package')->nullable()->unsigned()->default(1);
            $table->integer('price')->nullable()->unsigned();
            $table->integer('period')->nullable()->unsigned();
            $table->boolean('on_sale')->default(false);
            $table->integer('old_price')->nullable()->unsigned();
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
        Schema::dropIfExists('packages');
    }
}
