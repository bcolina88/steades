<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timesheets', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('rango');

            $table->integer('total')->nullable();
            $table->integer('lunes')->nullable();
            $table->integer('martes')->nullable();
            $table->integer('miercoles')->nullable();
            $table->integer('jueves')->nullable();
            $table->integer('viernes')->nullable();
            $table->integer('sabado')->nullable();
            $table->integer('domingo')->nullable();


            $table->integer('idempleado')->unsigned();

  
            $table->timestamps();

            $table->foreign('idempleado')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDetete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timesheets');
    }
}
