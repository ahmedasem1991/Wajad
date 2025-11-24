<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateAssignQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_assign_qrcodes', function (Blueprint $table) {
            $table->Increments('id');
            // $table->string('assign_reference_number')->nullable();
            $table->string('corporate_assign_reference_number')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('corporate_id')->unsigned()->nullable();
            $table->integer('type')->default(1); // default  (single)
            $table->integer('quantity')->default(1);
            $table->integer('created_by')->unsigned()->nullable();
            $table->string('created_from')->default('web');
            $table->string('search')->nullable();
            $table->string('search_user')->nullable();
            $table->string('status')->default('waiting'); // finished

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
        Schema::dropIfExists('corporate_assign_qrcodes');
    }
}
