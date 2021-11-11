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
            $table->boolean('approve')->default(0);
            $table->string('rational');
            $table->string('responsible');
            $table->unsignedBigInteger('user_id');
            $table->string('location');
            $table->string('budget');
            $table->string('year');
            $table->string('target_quantity');
            $table->string('target_quality');
            $table->unsignedBigInteger('year_id');
            $table->boolean('status_result')->default(0);
            $table->boolean('status_offer')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('strategic_t_id')->nullable();
            $table->unsignedBigInteger('strategic_g_id')->nullable();
            $table->unsignedBigInteger('strategic_s_id')->nullable();
            $table->unsignedBigInteger('tactic_t_id')->nullable();
            $table->unsignedBigInteger('tactic_g_id')->nullable();
            $table->unsignedBigInteger('tactic_s_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('year_id')->references('id')->on('years');

            $table->foreign('strategic_t_id')->references('id')->on('strategics');
            $table->foreign('strategic_g_id')->references('id')->on('strategics');
            $table->foreign('strategic_s_id')->references('id')->on('strategics');
            $table->foreign('tactic_t_id')->references('id')->on('tactics');
            $table->foreign('tactic_g_id')->references('id')->on('tactics');
            $table->foreign('tactic_s_id')->references('id')->on('tactics');

        });
        Schema::create('objectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });

        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('activity');
            $table->string('start');
            $table->string('stop');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
        Schema::create('detail_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('detail');
            $table->string('amount');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
        Schema::create('usefuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->string('name');
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
        Schema::dropIfExists('objectives');
        Schema::dropIfExists('procedures');
        Schema::dropIfExists('times');
        Schema::dropIfExists('detail_budgets');
        Schema::dropIfExists('usefuls');
        Schema::dropIfExists('offers');
    }
}
