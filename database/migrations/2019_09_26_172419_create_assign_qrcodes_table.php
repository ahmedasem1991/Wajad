<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignQrcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_qrcodes', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('assign_reference_number')->nullable();
            $table->integer('assign_to');
            $table->integer('user_id')->nullable();
            $table->integer('corporate_id')->nullable();
            $table->integer('type')->default(1);//default  (single)
            $table->integer('available_period')->default(1);//default 1day
            $table->integer('quantity')->default(1);
            $table->integer('created_by')->nullable();
            $table->string('created_from')->default('web');
            $table->string('status')->default('waiting');//finished
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
        Schema::dropIfExists('assign_qrcodes');
    }
}
