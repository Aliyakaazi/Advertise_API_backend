<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_upload', function (Blueprint $table) {
            $table->id('image_id');
            $table->binary('image');
            $table->String('image_name');
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('provider_id')->on('providers');
            $table->timestamp('uploaded_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_upload');
    }
}
