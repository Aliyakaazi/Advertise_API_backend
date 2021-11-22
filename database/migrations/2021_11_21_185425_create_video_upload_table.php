<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_upload', function (Blueprint $table) {
            $table->id('video_id');
            $table->binary('video');
            $table->String('video_name');
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
        Schema::dropIfExists('video_upload');
    }
}
