<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
       
                       <div class="row">
<div class="col-md-9">
  @if ($errors->any())
    <ul>
    <div class="alert alert-warning">
  <b>Corrige Los Siguientes Errores:</b>
  @foreach ($errors->all() as $error)
  <li>
  {{$error}}
</li>
@endforeach
</div>
</ul>

@endif
</div>
</div>
                </div><!-- /.box-header -->
                <!-- form start -->               
                <form role="form" >
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                  <div class="box-body">
                    <div class="col-md-12">



                      <div class="col-md-12">
                          
                          <label for="exampleInputPassword1">Empleado</label>  <span style="color: #E6674A;">*</span>

                          <select class="form-control select2" id="empleado" name="empleado"  required style="width: 100%;">
                            
                            <option value="">Seleccione empleado</option>
                            

                            @foreach ($user2 as $key => $emple)
                            <option value="{{$emple->id}}">{{$emple->apellido}}, {{$emple->nombre}} {{$emple->segundo_nombre}} </option>
                            @endforeach
                          </select>
                      
                
                      </div>
                      <br>



                      <div class="col-md-12">        
                          <div class="form-group">
                          <br>

                          {!! Form::label('Fecha Inicio', 'Fecha Inicio') !!} <span style="color: #E6674A;">*</span>

                            <input type="text" class="form-control" name="fecha_inicio" id="datepicker_inicio" required>
                         </div>

                      </div>


                      <div class="col-md-12">        
                          <div class="form-group">
                          {!! Form::label('Fecha Fin', 'Fecha Fin') !!} <span style="color: #E6674A;">*</span>

                            <input type="text" class="form-control" name="fecha_fin" id="datepicker_fin" required>
                         </div>

                      </div>

                      <div class="col-md-12">        
                          <div class="form-group">
                          {!! Form::label('Monto', 'Monto') !!} <span style="color: #E6674A;">*</span>

                            <input type="number" min="1" class="form-control" name="monto" id="monto" required>
                         </div>

                      </div>


                   


                      <div class="col-md-12">        
                          <div class="form-group">
                          {!! Form::label('Descripción', 'Descripción') !!}

                          <textarea class="form-control" name="descripcion" rows="10" cols="80" placeholder="Descripción" ></textarea>


                           
                          </div>

                      </div>

                    </div>

                     <span style="color: #E6674A;">*</span> Campos Obligatorios
                  

                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    @if (Auth::user()->idrole != 2)
                       {!! Form::submit('Guardar', ['class'=> 'btn btn-primary']) !!}
                    @endif
                 

                  </div>
                  </div>
                </form>
              </div><!-- /.box -->
          </div>


<div class="clearfix"></div>
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  

@section('javascript')
<script>


$(function () {

    $('.select2').select2();


    @if ($user2)
        
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


    $('#datepicker_inicio').val(moment(new Date()).format("YYYY-MM-DD"))
    $('#datepicker_inicio').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_fin').val(moment(new Date()).format("YYYY-MM-DD"))
    $('#datepicker_fin').datetimepicker({
      format: 'YYYY-MM-DD'
    });


});

</script>
   
@endsection
