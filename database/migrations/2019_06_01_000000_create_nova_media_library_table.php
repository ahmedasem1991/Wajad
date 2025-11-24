<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaMediaLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nova_media_library', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->index()->nullable();
            $table->string('path');
            $table->string('mime', 50);
            $table->string('size', 50);
            $table->string('type')->index()->collation('utf8_bin');
            $table->unsignedInteger('corporate_id')->nullable();
            $table->timestamp('created')->index()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nova_media_library');
    }
}
