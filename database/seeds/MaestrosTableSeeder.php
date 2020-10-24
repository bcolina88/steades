<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class MaestrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      DB::table('maestros')
          ->insert([[ 'titulo' => 'Escritorio', 'idpadre' => 1, 'ruta' => 'home', 'tipo' => 'ver'],
                    [ 'titulo' => 'Equipo', 'idpadre' => 2, 'ruta' => 'equipo', 'tipo' => 'ver'],
                    [ 'titulo' => 'Timesheet', 'idpadre' => 3, 'ruta' => 'timesheet', 'tipo' => 'ver'],
                    [ 'titulo' => 'Ajustes', 'idpadre' => 4, 'ruta' => 'ajustes.create', 'tipo' => 'ver'],
                    [ 'titulo' => 'Historial', 'idpadre' => 5, 'ruta' => 'historial', 'tipo' => 'ver'],

                    [ 'titulo' => 'Configuracion', 'idpadre' => 6, 'ruta' => '', 'tipo' => 'ver'],

                    [ 'titulo' => 'Crear/Usuarios', 'idpadre' => 6, 'ruta' => 'usuarios.create', 'tipo' => 'agregar'],

                    [ 'titulo' => 'Listar/Usuarios', 'idpadre' => 6, 'ruta' => 'usuarios.index', 'tipo' => 'ver'],
                    [ 'titulo' => 'Reset/Password', 'idpadre' => 9, 'ruta' => 'resetPassword', 'tipo' => 'ver'],
                    [ 'titulo' => 'Editar/Usuarios', 'idpadre' => 6, 'ruta' => 'usuarios.edit', 'tipo' => 'editar'],

                    [ 'titulo' => 'Ver/Usuarios', 'idpadre' => 11, 'ruta' => 'usuarios.show', 'tipo' => 'ver'],
                    [ 'titulo' => 'Ajustes', 'idpadre' => 4, 'ruta' => 'ajustes.store', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Crear/Usuarios', 'idpadre' => 6, 'ruta' => 'create_product', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Recibo', 'idpadre' => 5, 'ruta' => 'reciboPago', 'tipo' => 'ver'],
                    [ 'titulo' => 'Reset/Password', 'idpadre' => 9, 'ruta' => 'resetPass', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Timesheet', 'idpadre' => 3, 'ruta' => 'actualizar', 'tipo' => 'agregar'],
                    [ 'titulo' => 'Eliminar/Usuarios', 'idpadre' => 6, 'ruta' => 'usuarios.destroy', 'tipo' => 'borrar'],
                  
                 
                ]);
    }
}
