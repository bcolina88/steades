<?php
use App\Model\User;

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       'nombre' => 'Alex',
       'segundo_nombre' => '',
       'apellido' => 'Roman',
       'cargo' => 'Jefe de Sistemas',
       'idrole'  => 1,
       'active'  => true,
       'email' => 'alexisr@steades.com',
       'password' => bcrypt('secret'),

       'domicilio' => '',
       'tipo_empleo' => '',
       'departamento' => '',
       'ciudad'=> '',
       'estado'=> '',
       'codigo_postal'=> '',
       'fecha_nacimiento'=> '',
       'seguro_social'=> '',
       'tipo_cuenta'=> '',
       'titular_cuenta'=> '',
       'ruta_transito'=> '',
       'numero_cuenta'=> '',

       'forma_pago'=> '',
       'tipo_pago'=> '',
       'pago_hora'=> 0,
       'contacto_emergencia' => '',
       'fecha_contrato'=> '',
       'fecha_despido'=> '',
       'images'=> '',
       'declaracion'=> false,


       ]);


 

        $user = factory(App\Model\User::class, 48)->create([
          'idrole' =>function() {
            return App\Model\Role::inRandomOrder()->first()->id;
          },
         'password' => bcrypt('secret'),


         'tipo_empleo' => '',
         'departamento' => '',

         'estado'=> '',
         'codigo_postal'=> '',
         'fecha_nacimiento'=> '',

         'tipo_cuenta'=> '',

         'ruta_transito'=> '',
         'numero_cuenta'=> '',
         'cargo' => '',
         'forma_pago'=> '',
         'tipo_pago'=> '',


         'fecha_contrato'=> '',
         'fecha_despido'=> '',
         'images'=> '',
         'declaracion'=> false,


        ]);


      

    }
}
