<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido');
            $table->string('domicilio');
            $table->string('tipo_empleo');
            $table->string('departamento')->nullable();
            $table->string('ciudad');
            $table->string('estado');
            $table->string('telefono');
            $table->string('codigo_postal');
            $table->string('fecha_nacimiento')->nullable();
            $table->string('seguro_social');
            $table->string('tipo_cuenta')->nullable();
            $table->string('titular_cuenta')->nullable();
            $table->string('ruta_transito')->nullable();
            $table->string('numero_cuenta')->nullable();
            $table->string('forma_pago');
            $table->string('cargo');
            $table->string('tipo_pago');
            $table->float('pago_hora', 12, 2);
            $table->string('contacto_emergencia');
            $table->string('fecha_contrato');
            $table->string('fecha_despido')->nullable();
            $table->boolean('declaracion')->nullable();
            $table->text('images');


            $table->boolean('active');
            $table->integer('idrole')->unsigned();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('idrole')->references('id')->on('roles')
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
        Schema::dropIfExists('users');
    }
}
