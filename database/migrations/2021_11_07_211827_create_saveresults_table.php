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
        Schema::create('saveresults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('cause');

            $table->foreign('offer_id')->references('id')->on('offers');
        });
        Schema::create('conclusions', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('saveresult_id');

            $table->foreign('saveresult_id')->references('id')->on('saveresults');
        });
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('saveresult_id');

            $table->foreign('saveresult_id')->references('id')->on('saveresults');
        });
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('saveresult_id');
            $table->foreign('saveresult_id')->references('id')->on('saveresults');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conclusions');
        Schema::dropIfExists('problems');
        Schema::dropIfExists('feedback');
        Schema::dropIfExists('saveresults');
    }
}
