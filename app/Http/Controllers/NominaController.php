<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

use Session;
use DB;


class NominaController extends Controller
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


        $users = User::Join('roles', function($f) use($search)
                    {
                        $f->where('roles.id','=',4)
                          ->on('roles.id','=','users.idrole');
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('users.created_at','LIKE','%'.$search.'%')
                      ->orderBy('users.id','DESC')
                      ->select('users.*')
                      ->paginate(25);

        return view('usuario.nomina', compact('users'));


    }



    

}
