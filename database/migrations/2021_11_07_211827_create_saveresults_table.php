<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaveresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conclusions', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('offer_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('offer_id');

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causes');
        Schema::dropIfExists('conclusions');
        Schema::dropIfExists('problems');
        Schema::dropIfExists('feedback');
    }
}
