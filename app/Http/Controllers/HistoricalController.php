<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Historical;
use App\Model\HistoricalHasTimesheet;
use App\Model\User;
use Barryvdh\DomPDF\Facade as PDF;
use Session;
use DB;


class HistoricalController extends Controller
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
        
        $search = $request->get('search');


        $historicals = Historical::with(['empleado', 'transcriptor'])->Join('users', function($f) use($search)
                    {
                        $f->on('users.id','=','historicals.idtranscriptor');
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('users.created_at','LIKE','%'.$search.'%')
                      ->orderBy('historicals.id','DESC')
                      ->select('historicals.*')
                      ->paginate(25);

        $empleados = User::where('active',1)->where('idrole',4)->get();
        $transcriptores = User::where('active',1)->where('idrole',1)->get();;


        return view('historial', compact('empleados','transcriptores'));


    }


    public function pdf($id)
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
        $historical =  Historical::with(['empleado', 'transcriptor'])->where('id',$id)->first();

        $timesheet = HistoricalHasTimesheet::with(['timesheet'])->where('idhistorical',$historical->id)->first();

        if ($timesheet) {
            $historical['timesheet_info'] = $timesheet;
        }else{
            $historical['timesheet_info'] ='';
        }

        $seguro_social = explode("-", $historical->empleado->seguro_social);
        $ssn = $seguro_social[2];



        $ytd = DB::table('historicals')->where("historicals.idempleado", $id)
                  ->select(DB::raw("sum(historicals.monto) AS total"))
                  ->get();





       // return $ytd;

        $pdf = PDF::loadView('pdf.recibo', compact('historical','ssn','ytd'));

        return $pdf->download('PayStatement.pdf');
    }



    

}
