<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\Historical;
use DB;
use Session;


class UsersController extends Controller
{
    
     /**
     * Create a new controller instance.
     *
     * @return void
     */


    private   $photos_path = "documentos";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        

        $search = $request->get('search');


        $users = User::Join('roles', function($f) use($search)
                    {
                        $f->on('roles.id','=','users.idrole');
                    
                    })->orWhere('users.nombre','LIKE','%'.$search.'%')
                      ->orWhere('users.apellido','LIKE','%'.$search.'%')
                      ->orWhere('users.email','LIKE','%'.$search.'%')
                      ->orWhere('roles.tipo','LIKE','%'.$search.'%')
                      ->orderBy('users.id','DESC')
                      ->select('users.*')
                      ->paginate(25);

        return view('usuario.listado', compact('users'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        $user2 = [];
        $roles = Role::all();
        $tipo = "guardar";
        return view('usuario.crearusuario',compact('roles','user2','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data= request()->validate([
            'nombre' => 'min:4|max:255|required',
            'apellido' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,',
            'idrole' => 'required|integer:1,2,3,|not_in:0',
            'password' => 'min:6|max:255|required',
            'cargo' => ''

        ]);

        //$user = new User($request->all());
       // $user->password = bcrypt($request->password);



        $images =  '';



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
             'declaracion'     => $request->declaracion,

          ]);



        $user->save();
        session::flash('message','El usuario Fue Creado Correctamente');

        return redirect(route('usuarios.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $users = User::with(['role'])->find($id);


        $movements = Historical::with(['empleado', 'transcriptor'])
                      ->where("historicals.idempleado", $id)
                      ->orderBy('historicals.id','DESC')       
                      ->select('historicals.*')
                      ->get();

        if(count($movements)>0){
            $ultimo_pay = $movements[0];
        }else{
            $ultimo_pay = [];
        }


        $seguro_social = explode("-", $users->seguro_social);
        $ssn = $seguro_social[2];
      



        //return $movements[1];

        return view('usuario.detalle', compact('users','movements','ultimo_pay','ssn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user2 = User::with(['role'])->find($id);
        $roles = Role::all();
        $tipo = "editar";

        return view('usuario.editar', compact('user2','roles','tipo'));


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
        

        $data = request()->validate([
            'nombre' => 'min:4|max:255|required',
            'apellido' => 'min:4|max:255|required',
            'email' => 'min:4|max:255|required|email|unique:users,email,'.$id,
            'idrole' => 'integer|required',
            'password' => '',
            'cargo' => ''

        ]);


        if($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
            } else {

                unset($data['password']);

            }

            $user = User::with(['role'])->find($id);



            $user->fill([
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
                 'images'          => '[]',
                 'declaracion'     => $request->declaracion,

            ]);

           $user->save();
           // $user->update($data);


        session::flash('message','El usuario Fue actualizado Correctamente');
        $users = User::with(['role'])->find($id);
        return redirect(route('usuarios.index')); 

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        session::flash('message','El usuario Fue Eliminado Correctamente');
        return redirect(route('usuarios.index')); 
    }



    
}
