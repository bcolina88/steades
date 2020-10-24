<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <section class="content-header">
      <h1>
        Información personal <br>
        <small>Esto se utilizará para ingresar la información de sus cheques de paga y formularios de impuestos.</small>
    </section>
                  <hr>
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
                <form role="form">
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                      
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Nombre</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Inicial del segundo nombre</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('segundo_nombre', null, ['class' => 'form-control', 'placeholder' => 'Inicial', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Apellido</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) !!}
                    </div>



                     <div class="col-md-12">
                       <br>
                      <label for="exampleInputPassword1">Domicilio</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('domicilio', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Depto./Suite</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Depto./Suite', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Ciudad</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Estado</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                    </div>



  

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Código postal(ZIP)</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('codigo_postal', null, ['class' => 'form-control', 'placeholder' => 'Código postal(ZIP)', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Fecha de nacimiento</label> 
                 
            
                    <input type="text" class="form-control" name="fecha_nacimiento" id="datepicker_inicio">
                        
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Número de seguro social</label> <span style="color: #E6674A;">*</span>
                  
                        {!! Form::text('seguro_social', null, ['class' => 'form-control', 'placeholder' => '000-00-0000','data-inputmask'=>'"mask": "999-99-9999"' ,'required','data-mask']) !!}
                   
                  
                    </div>




                  

                 
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Contraseña</label>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>
                  
                    <div class="col-md-4">
                      <br>
                    <label for="exampleInputPassword1">Rol</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="idrole" name="idrole" required style="width: 100%;">

   
                          <option value="">Seleccione rol</option>
            
                          @foreach ($roles as $key => $role)

                          <option value="{{$role->id}}">{{$role->tipo}}</option>

                          @endforeach

                        </select>
                    
                         


                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Correo Elecronico</label> <span style="color: #E6674A;">*</span>
                      

                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}


                    </div> 



                     <div class="col-md-12">

                       <br>


                      <div class="col-md-4">


                  

                      
                          {!! Form::label('cargo', 'Tipo de empleo') !!} <span style="color: #E6674A;">*</span>
                       
                      </div> 

                      <div class="col-md-8">
                        <div class="form-group">
                          <div class="radio">
                            <label>
                              <input type="radio" id="tipo_empleo1" name="tipo_empleo" value="empleado" required>
                              Empleado<br>
                              <small>Este miembro de equipo recibirá un formulario W-2.</small>
    
                            </label>
                          </div>

                          <div class="radio">
                            <label>
                              <input type="radio" id="tipo_empleo2" name="tipo_empleo" value="contratista" required>
                              Contratista<br>
                              <small>Este miembro de equipo recibirá un formulario 1099-MISC.</small>
                            </label>
                          </div>


                          <div class="radio">
                            <label>
                              <input type="radio" id="tipo_empleo3" name="tipo_empleo" value="otro" required>
                              Otro<br>
                            </label>
                          </div>

                          <div class="checkbox" >
                            <label class="hide" id="declaracion">
                              <input type="checkbox" id="declaracion_buton" name="declaracion">
                              Declare automáticamente el Formulario 1099-MISC para este contratista.
                              Si ya le pagoa este contratista con anterioridad, necesita registrar su pago de un año hasta la fecha para que el formulario 1099-MISC contenga información precisa.Si este es un nuevo empleado, es posible que necesite presentar un informe de nueva contratación. 
                            </label>
                          </div>

                        
                        </div>    
                      </div>     



                    </div>  


                    <div class="col-md-12">
                     <h3 >Detalles de depósitos directos <hr>
                    </div>



                    <div class="col-md-4">
                      <br>
                    <label for="exampleInputPassword1">Tipo de cuenta</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="tipo_cuenta" name="tipo_cuenta" required style="width: 100%;">

   
                          <option value="">Seleccione tipo de cuenta</option>
                          <option value="corriente">Corriente</option>
            
                         

                        </select>
                    

                    </div>


                    <div class="col-md-4">
                      <br>
                    <label for="exampleInputPassword1">Forma de pago</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="forma_pago" name="forma_pago" required style="width: 100%;">

   
                          <option value="">Seleccione forma de pago</option>
                          <option value="deposito directo">Depósito directo</option>
            
                        

                        </select>

                    </div>


                   
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Número de ruta y tránsito</label> 
                  
                       {!! Form::text('ruta_transito', null, ['class' => 'form-control', 'placeholder' => 'Número de ruta y tránsito']) !!}
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Nombre del titular de la cuenta</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('titular_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Nombre del titular de la cuenta', 'required']) !!}
                    </div>



                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Número de cuenta</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('numero_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Número de cuenta', 'required']) !!}
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Confirmar Nº. de cuenta</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('confi_numero_cuenta', null, ['class' => 'form-control', 'placeholder' => 'Confirmar Nº. de cuenta', 'required']) !!}
                    </div>


                      
                    <div class="col-md-12">
                     <h3 >Compensación <hr>
                    </div>
                    <br>



                    <div class="col-md-4">
                   

                      <div class="form-group">
                        {!! Form::label('cargo', 'Puesto') !!} <span style="color: #E6674A;">*</span>
                        {!! Form::text('cargo', null, ['class' => 'form-control', 'placeholder' => 'Puesto']) !!}
                      </div>     
                    </div>  


                    <div class="col-md-4">
                   
                      <label for="exampleInputPassword1">Tipo de pago</label>  <span style="color: #E6674A;">*</span>

                         
                        <select class="form-control select2" id="tipo_pago" name="tipo_pago" required style="width: 100%;">

   
                          <option value="">Seleccione tipo de pago</option>
                          <option value="por hora">Por hora</option>
            
                        

                        </select>

                    </div>


                    <div class="col-md-4"> 

                      <label for="exampleInputPassword1">Pago por hora</label>  <span style="color: #E6674A;">*</span>

                    

                      <div class="form-group">
            
                        {!! Form::number('pago_hora', null, ['class' => 'form-control', 'placeholder' => '$0.00', 'required']) !!}
                      </div>     
                    </div> 



                    <div class="col-md-12">
                     <h3 >Información adicional <hr>
                    </div>
                    


                    <div class="col-md-4">
                        <label for="exampleInputPassword1">Contacto de emergencia</label>  <span style="color: #E6674A;">*</span>
                        {!! Form::text('contacto_emergencia', null, ['class' => 'form-control', 'placeholder' => '(000)-000-0000', 'data-inputmask'=>'"mask": "(999) 999-9999"','required','data-mask']) !!}

                  
                    </div>  


                    <div class="col-md-4">
                        <label for="exampleInputPassword1">Fecha de contratación</label>  <span style="color: #E6674A;">*</span>
                        <input type="text" class="form-control" name="fecha_contrato" id="datepicker_contrato" required>
                    </div>

             

                    <div class="col-md-4">
                        <label for="exampleInputPassword1">Fecha de despido</label> 
                        <input type="text" class="form-control" name="fecha_despido" id="datepicker_despido" >   
                    </div>

                     @if ($user2)


                          <div class="col-md-4">
                            <br>
                            <label for="exampleInputPassword1">Estado</label> 
    
                              <select class="form-control select2" id="estado" name="estado" style="width: 100%;">
                                <option value="">Seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Despedido</option>
                              </select>
                              
                          </div>

                    @endif


                    <div class="col-md-12">
                       <br><br>
                      <div class="col-md-12" id="ver-image"></div> 
       
                       <label for="exampleInputPassword1">Cargar documentos de identificación</label>

                       @if (!$user2)

                       <label style="color: #E6674A;">*</label>

                      <input type="file" name="images" id="images" multiple required>
                       

                       @else

                      <input type="file" name="images" id="images" multiple >

                       @endif
                     
               
                      <br>
                      <span style="color: #E6674A;">*</span> Campos Obligatorios
                      <br><br>
                    </div>

                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                
                  <div class="box-footer">


                   <button type="button" id="ingresar" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
              </form>
              </div><!-- /.box -->
          </div>

  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('javascript')

<script>

   @if (Auth::user()->idrole === 3)

      $("#idrole").val(4).trigger('change');
      $("#idrole").prop('disabled',true);


   @endif

  $('[data-mask]').inputmask()

  $('[name="tipo_empleo"]').click(function(){

      var bb = $('input:radio[name=tipo_empleo]:checked').val();


      if (bb === "contratista") {
        $('#declaracion').removeClass('hide');
    
      }else{
        $('#declaracion').addClass('hide');

      }

  });



  $('.select2').select2();

   $('#datepicker_inicio').val(moment(new Date()).format("YYYY-MM-DD"))
    $('#datepicker_inicio').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_contrato').val(moment(new Date()).format("YYYY-MM-DD"))
    $('#datepicker_contrato').datetimepicker({
      format: 'YYYY-MM-DD'
    });

   // $('#datepicker_despido').val(moment(new Date()).format("YYYY-MM-DD"))
    $('#datepicker_despido').datetimepicker({
      format: 'YYYY-MM-DD'
    });


  @if ($user2)
      $("#tipo_cuenta").val("{{$user2->tipo_cuenta}}").trigger('change');
      $("#idrole").val("{{$user2->idrole}}").trigger('change');
      $("#forma_pago").val("{{$user2->forma_pago}}").trigger('change');
      $("#tipo_pago").val("{{$user2->tipo_pago}}").trigger('change');
      $("#tipo_pago").val("{{$user2->tipo_pago}}").trigger('change');
      $('[name="confi_numero_cuenta"]').val("{{$user2->numero_cuenta}}").trigger('change');

     // '[name="confi_numero_cuenta"]'
     

      $("#datepicker_contrato").val("{{$user2->fecha_contrato}}").trigger('change');
      $("#datepicker_despido").val("{{$user2->fecha_despido}}").trigger('change');
      $("#datepicker_inicio").val("{{$user2->fecha_nacimiento}}").trigger('change');

      $("#estado").val("{{$user2->active}}").trigger('change');
      $("#seguro_social").val("{{$user2->seguro_social}}").trigger('change');


      @if ($user2->tipo_empleo === "empleado")

         document.getElementById('tipo_empleo1').checked = true;

      @endif

      @if ($user2->tipo_empleo === "contratista")

         document.getElementById('tipo_empleo2').checked = true;

      @endif
      

      @if ($user2->tipo_empleo === "otro")

         document.getElementById('tipo_empleo3').checked = true;

      @endif
      
      

      @if ($user2->declaracion ===1)

         $("#declaracion").removeClass("hide");
         document.getElementById('declaracion_buton').checked = true;

      @endif

      @if ($user2->declaracion ===0)

         $("#declaracion").addClass("hide");
         document.getElementById('declaracion_buton').checked = false;

      @endif


      


      var images = "{{$user2->images}}";
      var dd = images.split(",");
      var text="";

      for (var i = 0; i < dd.length - 1; i++) {
        text+="<img class='logo-mini' style='padding-right:30px;' src='"+dd[i]+"' width='200' height='200'>";  
      
      };


      $('#ver-image').html(text);



  @endif


$('#ingresar').click(function(){



         if (( $('[name="nombre"]').val() ==="") || ($('[name="segundo_nombre"]').val() ==="")|| ($('[name="apellido"]').val() ==="")|| ($('[name="domicilio"]').val() ==="")|| ($('[name="departamento"]').val() ==="")|| ($('[name="ciudad"]').val() ==="")|| ($('[name="estado"]').val() ==="")|| ($('[name="codigo_postal"]').val() ==="")|| ($('[name="seguro_social"]').val() ==="")|| ($('[name="idrole"]').val() ==="")|| ($('[name="correo"]').val() ==="")|| ($('[name="tipo_empleo"]').val() ==="")|| ($('[name="tipo_cuenta"]').val() ==="")|| ($('[name="forma_pago"]').val() ==="")|| ($('[name="titular_cuenta"]').val() ==="")|| ($('[name="segundo_nombre"]').val() ==="")|| ($('[name="numero_cuenta"]').val() ==="")|| ($('[name="confi_numero_cuenta"]').val() ==="")|| ($('[name="tipo_pago"]').val() ==="")|| ($('[name="pago_hora"]').val() ==="")|| ($('[name="contacto_emergencia"]').val() ==="")|| ($('[name="fecha_contrato"]').val() ==="")|| ($('[name="cargo"]').val() ==="")) {
    


            swal({
              title: 'Verifique los campos obligatorios',
              
              icon: 'warning',
              buttons: {
    
                cancel: {
                  text: "Salir",
                  value: false,
                  visible: true
                }
              }
            }).then((result) => {});






        }else{
                agregarOrden(); 
        };


  


});



function agregarOrden(){


      var data = getFiles();
      data=getFormData("formCreate",data);


      $.ajax({
          url: "{{ route('create_product') }}",                                          
          data: data,
          contentType: false,
          processData: false,
          method: 'POST',
      })
      .done(function(msg) {

        if (msg === "guardar") {
          var message = 'El Usuario Fue Creado Correctamente';

        };

        if (msg === "editar") {
          var message = 'El Usuario Fue Actualizado Correctamente';

        };

          window.location.href = "{{ route('usuarios.index') }}";

      })
      .fail(function(msg) {
            //console.log("error en createAlbarane");
      });



}



function getFiles(){

  var idFiles=document.getElementById("images");
  var archivos=$("#images")[0].files;
  var data=new FormData();

  for (var i = 0; i < archivos.length; i++) {
    data.append("images[]",archivos[i])
  };

  data.append("tipo","{{$tipo}}");

  @if ($user2)

    data.append("id","{{$user2->id}}");
   // data.append("estado","{{$user2->id}}");


  @endif
  

  return data;

}

function getFormData(id,data){

  $("#"+id).find("input,select").each(function(i, v) {
      if (v.type!=="file") {
       

          if (v.type==="checkbox"){

              if(v.checked===false) {
                 data.append(v.name,"off");
              }

              if(v.checked===true) {
                 data.append(v.name,"on");
              }

             
          }else{


            if (v.type==="radio"){

                if(v.checked===true) {
                   data.append(v.name,v.value);
                }
               
            }else{
              data.append(v.name,v.value);
            }

          }

      };
  });




  return data;

}



</script>
@endsection
