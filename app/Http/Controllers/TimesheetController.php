<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Historical;
use App\Model\User;
use App\Model\Timesheet;
use App\Model\HistoricalHasTimesheet;

use Session;
use DB;


class TimesheetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        date_default_timezone_set("America/Chicago");

        $date = date("Y-m-d");
        $dia = date("l");
        $empleados =[];
        $days =[];
        $hay_pago = false;
        $empleados = User::where('active','=',1)->where('idrole','=',4)->orderBy('id','ASC')->get();
        $total_empleados = count($empleados);


        //Fechas

            if($dia ==="Monday"){
              $monday =date("d F Y", strtotime("monday"));
              $rango_inicio = date("Y/m/d", strtotime("monday"));
              $inicio = date("Y-m-d", strtotime("monday"));
              $day1=date("d", strtotime("monday"));



            }else{
              $monday =date("d F Y", strtotime("previous monday"));
              $rango_inicio = date("Y/m/d", strtotime("previous monday"));
              $inicio = date("Y-m-d", strtotime("previous monday"));
              $day1=date("d", strtotime("previous monday"));

            }


            $sunday = date("d F Y", strtotime("$monday +6 day"));
            $fin = date("Y-m-d", strtotime("$monday +6 day"));

            array_push($days,$day1);
            for ($i=1; $i < 7 ; $i++) {
                $day1=date("d", strtotime("$monday +$i day"));
                array_push($days,$day1);
            }

        //Fin Fechas

        //Rango

            $rango_fin = date("Y/m/d", strtotime("$monday +6 day"));
            $rango_total = $rango_inicio.'-'.$rango_fin;


        //Fin rango



        for ($i=0; $i < $total_empleados; $i++) {


          $pagos = Timesheet::where("timesheets.idempleado", $empleados[$i]->id)
                      ->where('timesheets.rango', $rango_total)
                      ->select('timesheets.*')
                      ->get();


                      if(count($pagos) > 0){
                         $empleados[$i]['pagos']=$pagos;


                      }else{

                        $pagos = array('lunes' => '','martes' => '','miercoles' => '','jueves' => '','viernes' => '','sabado' => '','domingo' => '','total' => '');
                        $empleados[$i]['pagos']=[$pagos];


                      }


        }

     // return  $dia;


        return view('timesheet.timesheet', compact('empleados','total_empleados','monday','sunday','inicio','fin','days','rango_total','hay_pago'));



    }



    public function actualizar(Request $request)
    {

        date_default_timezone_set("America/Chicago");


        $empleados = User::where('active','=',1)->where('idrole','=',4)->orderBy('id','ASC')->get();
        $total_empleados = count($empleados);





        if ($request->boton==="cambiar") {


                    $Historical = Historical::where("historicals.rango", $request->rango)
                      ->where("historicals.tipo",'pago')
                      ->select('historicals.*')
                      ->get();



                    if (count($Historical) === 0) {


                            $pagos = Timesheet::where("timesheets.rango", $request->rango)
                                    ->select('timesheets.*')
                                    ->get();


                            if (count($pagos) === 0) {


                                for ($i=0; $i < $total_empleados; $i++) {


                                    $data=([
                                      'idempleado'   => $empleados[$i]->id,
                                      'fecha_inicio' => $request->fecha_inicio,
                                      'fecha_fin'    => $request->fecha_fin,
                                      'rango'        => $request->rango,
                                      'total'        => $request->get("total_".$empleados[$i]->id),
                                      'lunes'        => $request->get("lunes_".$empleados[$i]->id),
                                      'martes'       => $request->get("martes_".$empleados[$i]->id),
                                      'miercoles'    => $request->get("miercoles_".$empleados[$i]->id),
                                      'jueves'       => $request->get("jueves_".$empleados[$i]->id),
                                      'viernes'      => $request->get("viernes_".$empleados[$i]->id),
                                      'sabado'       => $request->get("sabado_".$empleados[$i]->id),
                                      'domingo'      => $request->get("domingo_".$empleados[$i]->id),
                                    ]);


                                    $timesheet = new Timesheet($data);
                                    $timesheet->save();


                                }

                            }else{



                               for ($i=0; $i < $total_empleados; $i++) {


                                    $timesheet = Timesheet::where("timesheets.idempleado", $empleados[$i]->id)
                                        ->where('timesheets.rango', $request->rango)->first();


                                      $timesheet->total        = $request->get("total_".$empleados[$i]->id);
                                      $timesheet->lunes        = $request->get("lunes_".$empleados[$i]->id);
                                      $timesheet->martes       = $request->get("martes_".$empleados[$i]->id);
                                      $timesheet->miercoles    = $request->get("miercoles_".$empleados[$i]->id);
                                      $timesheet->jueves       = $request->get("jueves_".$empleados[$i]->id);
                                      $timesheet->viernes      = $request->get("viernes_".$empleados[$i]->id);
                                      $timesheet->sabado      = $request->get("sabado_".$empleados[$i]->id);
                                      $timesheet->domingo      = $request->get("domingo_".$empleados[$i]->id);




                                      $timesheet->save();

                                 }


                            }


                            session::flash('message','Fueron actualizadas las horas de trabajo diarias de los empleados');
                            session::flash('icon','success');
                            return redirect(route('timesheet'));


                    }else{

                      session::flash('message','Ya fueron realizados los pagos por empleados para esta semana, no puede actualizar las horas de trabajo diarias.');
                      session::flash('icon','warning');

                      return redirect(route('timesheet'));

                    }


        }

        if ($request->boton==="guardar") {



            $pagos = Historical::where("historicals.rango", $request->rango)
                      ->where("historicals.tipo",'pago')
                      ->select('historicals.*')
                      ->get();


            if (count($pagos) === 0) {


                for ($i=0; $i < $total_empleados; $i++) {


                          $data=([
                            'idempleado'      => $empleados[$i]->id,
                            'fecha_inicio'    => $request->fecha_inicio,
                            'fecha_fin'       => $request->fecha_fin,
                            'monto'           => $request->get("total_".$empleados[$i]->id) * $empleados[$i]->pago_hora,
                            'descripcion'     => "Pago de semana ".$request->rango,
                            'idtranscriptor'  => Auth::user()->id,
                            'rango'           => $request->rango,
                            'tipo'            => 'pago',
                          ]);


                          $historical = new Historical($data);
                          $historical->save();


                          $horas = Timesheet::where("timesheets.rango", $request->rango)
                                        ->where("timesheets.idempleado", $empleados[$i]->id)
                                        ->select('timesheets.*')
                                        ->first();


                          $data1=([
                            'idtimesheet'   => $horas->id,
                            'idhistorical'  => $historical->id,
                          ]);

                          $historicalHasTimesheet = new HistoricalHasTimesheet($data1);
                          $historicalHasTimesheet->save();


                }

                session::flash('message','Los pagos por empleados para esta semana fueron registrados correctamente');
                session::flash('icon','success');

                return redirect(route('timesheet'));



            }else{

                session::flash('message','Previamente, ya fueron realizados los pagos por empleados para esta semana.');
                session::flash('icon','warning');

                return redirect(route('timesheet'));

            }


        }






    }


    public function busqueda(Request $request)
    {

        

        $date = $request->get('fecha');


        date_default_timezone_set("America/Chicago");

       // $date = date("Y-m-d");
        $dia = date("l",strtotime("$date"));
        $empleados =[];
        $days =[];
        $hay_pago = false;
        $empleados = User::where('active','=',1)->where('idrole','=',4)->orderBy('id','ASC')->get();
        $total_empleados = count($empleados);


        //Fechas

            if($dia ==="Monday"){
              $monday =date("d F Y", strtotime("$date monday"));
              $rango_inicio = date("Y/m/d", strtotime("$date monday"));
              $inicio = date("Y-m-d", strtotime("$date monday"));
              $day1=date("d", strtotime("$date monday"));



            }else{
              $monday =date("d F Y", strtotime("$date previous monday"));
              $rango_inicio = date("Y/m/d", strtotime("$date previous monday"));
              $inicio = date("Y-m-d", strtotime("$date previous monday"));
              $day1=date("d", strtotime("$date previous monday"));

            }


            $sunday = date("d F Y", strtotime("$monday +6 day"));
            $fin = date("Y-m-d", strtotime("$monday +6 day"));

            array_push($days,$day1);
            for ($i=1; $i < 7 ; $i++) {
                $day1=date("d", strtotime("$monday +$i day"));
                array_push($days,$day1);
            }

        //Fin Fechas

        //Rango

            $rango_fin = date("Y/m/d", strtotime("$monday +6 day"));
            $rango_total = $rango_inicio.'-'.$rango_fin;


        //Fin rango



        for ($i=0; $i < $total_empleados; $i++) {


          $pagos = Timesheet::where("timesheets.idempleado", $empleados[$i]->id)
                      ->where('timesheets.rango', $rango_total)
                      ->select('timesheets.*')
                      ->get();


                      if(count($pagos) > 0){
                         $empleados[$i]['pagos']=$pagos;


                      }else{

                        $pagos = array('lunes' => '','martes' => '','miercoles' => '','jueves' => '','viernes' => '','sabado' => '','domingo' => '','total' => '');
                        $empleados[$i]['pagos']=[$pagos];


                      }


        }

     // return  $dia;


        return view('timesheet.timesheet', compact('empleados','total_empleados','monday','sunday','inicio','fin','days','rango_total','hay_pago'));




        
     //   return  $dia;




    }





}
