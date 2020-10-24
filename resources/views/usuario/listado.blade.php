@extends('layout.template')
@section('title')
Listado de usuarios | Steades
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de usuarios
        <small></small>
    </section>


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">

            <br>
            @if (Session::has('message'))
             <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
            @endif

            {!!Form::open(['route'=>'usuarios.index', 'method'=>'GET'])!!}
            <div class="input-group">

                      <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar..."/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>

            </div>
            {!!Form::close()!!}
 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>
                    <th>Usuario(E-mail)</th>
                    <th>Apellido y nombres</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    @if (Auth::user()->idrole != 3)
                    <th>Acciones</th>
                      @endif  
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $key => $user)
                  <tr>

                  
                    <td>{{$user->email}}</td>
                    <td>{{$user->apellido}}, {{$user->nombre}} {{$user->segundo_nombre}}</td>
                    <td>{{$user->role->tipo}} </td>
                    <td>


                        @if($user->active ===  1)
                          <p class="text-green">Activo</p>
                        @endif

                        @if($user->active ===  0)
                          <p class="text-red">Despedido</p>
                        @endif


                    </td>
                     
                     <td>
                      @if (Auth::user()->idrole != 3)
                      <div class="btn-group">
          
                          {!! Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'DELETE']) !!}

                          <a href="{{route("usuarios.show", ['id' => $user->id])}}" class="btn btn-default btn-success fa fa-search"><b></b></a> 
                          
                          @if (Auth::user()->idrole != 2)

                          <a href="{{route("usuarios.edit", ['id' => $user->id])}}" onclick="return confirm('Seguro que Desea Editar a {{$user->nombre}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar a {{$user->nombre}}')" ></i></button>
                          
                          @endif

                          {!! Form::close() !!}

                      </div>
                      @endif                    
                      </td>
                     
                  </tr>
                     @empty

                  No hay Datos que Motrar.
                    @endforelse


                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

              @if (Auth::user()->idrole != 2)
                <a href="{{route('usuarios.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nuevo Usuario</b></a> 
              @endif

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $users->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop