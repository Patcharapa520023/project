<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('accord')->default(0)->change();
            $table->string('rational');
            $table->string('responsible');
            $table->string('location');
            $table->string('budget');
        });
        Schema::create('objectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->foreign('offer_id')->references('id')->on('offers');
        });
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('quantity');
            $table->string('quality');
            $table->foreign('offer_id')->references('id')->on('offers');
        });
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->foreign('offer_id')->references('id')->on('offers');
        });
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('activity');
            $table->string('start');
            $table->string('stop');
            $table->foreign('offer_id')->references('id')->on('offers');
        });
        Schema::create('usefuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->foreign('offer_id')->references('id')->on('offers');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer');
    }
}
