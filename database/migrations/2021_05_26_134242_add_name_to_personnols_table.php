<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToPersonnolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnols', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("department_id");
            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnols', function (Blueprint $table) {
            //
        });
    }
}
