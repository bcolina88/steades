<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Model\Historical;
use App\Model\User;


use Carbon\Carbon;
use DateTime;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $photos_path = "documentos";


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */



    public function searchArticle(Request  $request)
    {
      
      $periodo = explode(" - ", $request->periodo);
      $from    = $periodo[0];
      $to      = $periodo[1];



     $movements = Historical::with(['empleado', 'transcriptor'])
                      ->where("historicals.idempleado", $request->empleado)
                      ->whereBetween('historicals.fecha_inicio', [$from, $to])             
                      ->whereBetween('historicals.fecha_fin', [$from, $to])          
                      ->select('historicals.*')
                      ->get();


     return response()->Json(['movements' => $movements], 200, [], JSON_NUMERIC_CHECK);

      

    }




    public function createProduct(Request $request)
    {

         
        $images =  '';



        if ($request->declaracion ==="on") {
          $declaracion = true;
        }else{
          $declaracion = false;
        }



        if($request->tipo === "guardar"){



            if ($request->file('images')) {


                            $photos = $request->file('images');

                            if (!is_array($photos)) {
                                $photos = [$photos];
                            }

                            if (!is_dir($this->photos_path)) {
                                mkdir($this->photos_path, 0777);
                            }


                            for ($i = 0; $i < count($photos); $i++) {

                                $photo = $photos[$i];
                                $name = sha1(date('YmdHis') . str_random(30));
                                $save_name = $name . '.' . $photo->getClientOriginalExtension();
                                $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

                                $photo->move($this->photos_path, $save_name);
                            
                               
                                $src = url("/{$this->photos_path}/{$save_name}");

                                $images = $src.','.$images;

                            }

            }


            $user = User::firstOrCreate([
             'nombre'          => $request->nombre,
             'segundo_nombre'  => $request->segundo_nombre,
             'apellido'        => $request->apellido,
             'email'           => $request->email, 
             'idrole'          => $request->idrole,
             'password'        => bcrypt($request->password),
             'cargo'           => $request->cargo,
             'active'          => 1,
             'domicilio'       => $request->domicilio,
             'tipo_empleo'     => $request->tipo_empleo,
             'departamento'    => $request->departamento,
             'ciudad'          => $request->ciudad,
             'estado'          => $request->estado,
             'codigo_postal'   => $request->codigo_postal,
             'fecha_nacimiento'=> $request->fecha_nacimiento,
             'seguro_social'   => $request->seguro_social,
             'tipo_cuenta'     => $request->tipo_cuenta,
             'titular_cuenta'  => $request->titular_cuenta,
             'ruta_transito'   => $request->ruta_transito,
             'numero_cuenta'   => $request->numero_cuenta,
             'forma_pago'      => $request->forma_pago,
             'tipo_pago'       => $request->tipo_pago,
             'pago_hora'       => $request->pago_hora,
             'contacto_emergencia' => $request->contacto_emergencia,
             'fecha_contrato'  => $request->fecha_contrato,
             'fecha_despido'   => $request->fecha_despido,
             'images'          => $images,
             'declaracion'     => $declaracion,

            ]);



            $user->save();

            return json_encode("guardar");

        }  


        if($request->tipo === "editar"){ 


            if ($request->file('images')) {


                        $photos = $request->file('images');

                        if (!is_array($photos)) {
                            $photos = [$photos];
                        }

                        if (!is_dir($this->photos_path)) {
                            mkdir($this->photos_path, 0777);
                        }


                        for ($i = 0; $i < count($photos); $i++) {

                            $photo = $photos[$i];
                            $name = sha1(date('YmdHis') . str_random(30));
                            $save_name = $name . '.' . $photo->getClientOriginalExtension();
                            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

                            $photo->move($this->photos_path, $save_name);
                            
                               
                            $src = url("/{$this->photos_path}/{$save_name}");

                            $images = $src.','.$images;

                        }





                        if($request->password != null){
         
                        } else {
                         unset($request->password);
                        }

                        $user = User::with(['role'])->find($request->id);



                        $user->fill([
                         'nombre'          => $request->nombre,
                         'segundo_nombre'  => $request->segundo_nombre,
                         'apellido'        => $request->apellido,
                         'email'           => $request->email, 
                         'idrole'          => $request->idrole,
                         'password'        => bcrypt($request->password),
                         'cargo'           => $request->cargo,
                         'domicilio'       => $request->domicilio,
                         'tipo_empleo'     => $request->tipo_empleo,
                         'departamento'    => $request->departamento,
                         'ciudad'          => $request->ciudad,
                         'estado'          => $request->estado,
                         'codigo_postal'   => $request->codigo_postal,
                         'fecha_nacimiento'=> $request->fecha_nacimiento,
                         'seguro_social'   => $request->seguro_social,
                         'tipo_cuenta'     => $request->tipo_cuenta,
                         'titular_cuenta'  => $request->titular_cuenta,
                         'ruta_transito'   => $request->ruta_transito,
                         'numero_cuenta'   => $request->numero_cuenta,
                         'forma_pago'      => $request->forma_pago,
                         'tipo_pago'       => $request->tipo_pago,
                         'pago_hora'       => $request->pago_hora,
                         'contacto_emergencia' => $request->contacto_emergencia,
                         'fecha_contrato'  => $request->fecha_contrato,
                         'fecha_despido'   => $request->fecha_despido,
                         'images'          => $images,
                         'declaracion'     => $declaracion,
                         'active'          => $request->estado,

                        ]);



                        $user->save();

                        return json_encode("editar");



            }else{



                        if($request->password != null){
         
                        } else {
                         unset($request->password);
                        }

                        $user = User::with(['role'])->find($request->id);



                        $user->fill([
                         'nombre'          => $request->nombre,
                         'segundo_nombre'  => $request->segundo_nombre,
                         'apellido'        => $request->apellido,
                         'email'           => $request->email, 
                         'idrole'          => $request->idrole,
                         'password'        => bcrypt($request->password),
                         'cargo'           => $request->cargo,
                         'domicilio'       => $request->domicilio,
                         'tipo_empleo'     => $request->tipo_empleo,
                         'departamento'    => $request->departamento,
                         'ciudad'          => $request->ciudad,
                         'estado'          => $request->estado,
                         'codigo_postal'   => $request->codigo_postal,
                         'fecha_nacimiento'=> $request->fecha_nacimiento,
                         'seguro_social'   => $request->seguro_social,
                         'tipo_cuenta'     => $request->tipo_cuenta,
                         'titular_cuenta'  => $request->titular_cuenta,
                         'ruta_transito'   => $request->ruta_transito,
                         'numero_cuenta'   => $request->numero_cuenta,
                         'forma_pago'      => $request->forma_pago,
                         'tipo_pago'       => $request->tipo_pago,
                         'pago_hora'       => $request->pago_hora,
                         'contacto_emergencia' => $request->contacto_emergencia,
                         'fecha_contrato'  => $request->fecha_contrato,
                         'fecha_despido'   => $request->fecha_despido,
                         'declaracion'     => $declaracion,
                         'active'          => $request->estado,
                         

                        ]);



                        $user->save();

                        return json_encode("editar");



            }




        } 

    

    }
    
       
}
