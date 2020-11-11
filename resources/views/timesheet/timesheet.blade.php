@extends('layout.template')
@section('title')
Timesheet | Steades
@endsection
@section('content')


  <section class="content-header">
      <h1>
        Timesheet
        <small></small>
    </section>



    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box col-md-12">
            <div class="box-header with-border">

           

            <section style="text-align:center" class="bg-aqua">

  
                    <h3>{{$monday}}</h3>
                    <h5>Lunes</h5>
             

                    <h3> {{$sunday}}</h3>
                    <h5>Domingo</h5>

            </section>


            
            {!!Form::open(['route'=>'busqueda', 'method'=>'POST'])!!}
            <div class="row">
                        

                      <div class="col-lg-3">
                        
                        <label for="exampleInputPassword1">Elige una fecha</label> 
                   
                        <input type="text" class="form-control" name="fecha" id="datepicker_inicio">
                          
                      </div>

                        
                       
                        <div class="col-lg-1">
                            <div class="form-group">
                                <br>
                                <div class="input-group">
                                    <button id="search" class="btn btn-primary pull-right" style="margin-left:10px;">
                                        BUSCAR
                                    </button>
                                </div>
                            </div>
                        </div>
            </div>
            {!!Form::close()!!}



            <!-- /.box-header -->
            {!!Form::open(['route'=>'actualizar', 'method'=>'POST'])!!}


            <input type="hidden" id="fecha_inicio" name="fecha_inicio" value="{{$inicio}}">
            <input type="hidden" id="fecha_fin" name="fecha_fin" value="{{$fin}}">
            <input type="hidden" id="rango" name="rango" value="{{$rango_total}}">


            <h3 class="widget-user-username"> Ingrese las horas diarias de trabajo de la semana por empleado.</h3>





            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>
                    <th>Empleado</th>
                    <th style="text-align:center">Lunes <p>{{$days[0]}}<p></th>
                    <th style="text-align:center">Martes <p>{{$days[1]}}<p></th>
                    <th style="text-align:center">Miercoles <p>{{$days[2]}}<p></th>
                    <th style="text-align:center">Jueves <p>{{$days[3]}}<p></th>
                    <th style="text-align:center">Viernes <p>{{$days[4]}}<p></th>
                    <th style="text-align:center">Sabado <p>{{$days[5]}}<p></th>
                    <th style="text-align:center">Domingo <p>{{$days[6]}}<p></th>
                    <th>Total Horas</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($empleados as $empleado)
                  <tr>

                    <td>{{$empleado->apellido}}, {{$empleado->nombre}} {{$empleado->segundo_nombre}} </td>

        

                     @foreach ($empleado->pagos as $pago)


                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="lunes_{{$empleado->id}}" name="lunes_{{$empleado->id}}" placeholder="0" value="{{$pago['lunes']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="martes_{{$empleado->id}}" name="martes_{{$empleado->id}}" placeholder="0" value="{{$pago['martes']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="miercoles_{{$empleado->id}}" name="miercoles_{{$empleado->id}}" placeholder="0" value="{{$pago['miercoles']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="jueves_{{$empleado->id}}" name="jueves_{{$empleado->id}}" placeholder="0" value="{{$pago['jueves']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="viernes_{{$empleado->id}}" name="viernes_{{$empleado->id}}" placeholder="0" value="{{$pago['viernes']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="sabado_{{$empleado->id}}" name="sabado_{{$empleado->id}}" placeholder="0" value="{{$pago['sabado']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="number" class="form-control" style="width: 70px;"  min="0" id="domingo_{{$empleado->id}}" name="domingo_{{$empleado->id}}" placeholder="0" value="{{$pago['domingo']}}" onchange="sumar({{$empleado->id}},this.value);">
                    <td><input type="text"   class="form-control" style="width: 70px;"  min="0" id="total_{{$empleado->id}}" name="total_{{$empleado->id}}" placeholder="0" value="{{$pago['total']}}" >

                 

                     @endforeach

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
            <div class="box-footer clearfix pull-right">

            <br>

            @if (Auth::user()->idrole != 2)

            <button name="boton" value="cambiar" class="btn btn-default btn-flat"><b>Guardar y actualizar horas</b></button>
            <button name="boton" value="guardar" class="btn btn-primary btn-flat"><b>Guardar pagos</b></button>

            @endif
     
            </div>

            {!!Form::close()!!}



            <!-- /.box-footer -->
     

  </section>
@stop

@section('javascript')

<script type="text/javascript">
  $('.select2').select2();


 // $('#datepicker_inicio').val(moment(new Date()).format("YYYY-MM-DD"))
  $('#datepicker_inicio').datetimepicker({
      format: 'YYYY-MM-DD'
  });




  @if (session('message'))
  $(".callout").fadeTo(5000, 500).slideUp(500, function(){
     $(".callout").slideUp(500);
  });
  @endif


   @if (Session::has('message'))



            swal({
              title: '{{ Session::get('message')}}',
              
              icon: '{{ Session::get('icon')}}',
              buttons: {
    
                cancel: {
                  text: "Salir",
                  value: false,
                  visible: true
                }
              }
            }).then((result) => {});



   @endif



  function sumar (id,valor) {

        var total_horas = 0; 
        var articulo ={};


        //valor = parseFloat(valor); // Convertir el valor a un entero (número).
        var dias = ["lunes","martes","miercoles","jueves","viernes","sabado","domingo"];

        for (var i = 0; i <= 6; i++) {

           var nombre_dia = dias[i]+'_'+id;
           var valor_dia = $('[name='+nombre_dia+']').val();


            if (valor_dia != "") {
              valor_dia = parseFloat(valor_dia);
              total_horas += valor_dia;
            };


        };

        $('[name=total_'+id+']').val(total_horas);


    
}

</script>
@endsection