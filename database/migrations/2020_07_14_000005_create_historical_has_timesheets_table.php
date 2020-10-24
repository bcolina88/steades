<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricalHasTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historical_has_timesheets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idtimesheet')->unsigned();
            $table->integer('idhistorical')->unsigned();


            $table->foreign('idtimesheet')->references('id')->on('timesheets')
            ->onUpdate('cascade')
            ->onDetete('cascade');

            $table->foreign('idhistorical')->references('id')->on('historicals')
            ->onUpdate('cascade')
            ->onDetete('cascade');

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
        Schema::dropIfExists('historical_has_timesheets');
    }
}
