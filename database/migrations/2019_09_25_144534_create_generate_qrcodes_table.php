<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_qrcodes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('generate_reference_number')->nullable();
            $table->integer('type')->default(1); // default  (single)
            $table->string('status')->default('waiting'); // finished
            $table->integer('quantity')->default(1);
            $table->integer('blue_eyes')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->string('created_from')->default('web');
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
        Schema::dropIfExists('generate_qrcodes');
    }
}
