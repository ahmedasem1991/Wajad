<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserItemPackageProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_item_package_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('package_product_pivot_id')->nullable()->unsigned();
            $table->integer('item_id')->nullable()->unsigned();
            $table->date('starts_at');
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
        Schema::dropIfExists('user_item_package_product');
    }
}
