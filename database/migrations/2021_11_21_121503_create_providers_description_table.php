<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_description', function (Blueprint $table) {
            $table->id('desc_id');
            $table->String('description');
            $table->String('filetype');

    $table->unsignedBigInteger('provider_id');
    $table->foreign('provider_id')->references('provider_id')->on('providers');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers_description');
    }
}
