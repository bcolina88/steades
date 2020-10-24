<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Historical;

use Session;
use DB;


class AjusteController extends Controller
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





    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user2 = User::where('active',1)->where('idrole',4)->get();;
        //return $user2;
        return view('ajuste.crearajuste', compact('user2'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            date_default_timezone_set("America/Chicago");
            $rango_inicio = date("Y/m/d", strtotime($request->fecha_inicio));


            $rango_fin = date("Y/m/d", strtotime($request->fecha_fin));
            $rango_total = $rango_inicio.'-'.$rango_fin;


            $historical = Historical::firstOrCreate([
                 'fecha_inicio'    => $request->fecha_inicio,
                 'fecha_fin'       => $request->fecha_fin,
                 'monto'           => $request->monto,
                 'idempleado'      => $request->empleado,
                 'descripcion'     => $request->descripcion,
                 'idtranscriptor'  => Auth::user()->id,
                 'rango'           => $rango_total,
                 'tipo'            => 'ajuste',

            ]);



        $historical->save();
        session::flash('message','El ajuste de pago fue creado correctamente');
        session::flash('icon','success');


        $user2 = User::where('active',1)->where('idrole',4)->get();;
        return view('ajuste.crearajuste', compact('user2'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {




   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }








}
