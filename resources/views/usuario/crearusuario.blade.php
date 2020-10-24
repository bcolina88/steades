@extends('layout.template')
@section('title')
Crear usuario | Steades
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear Usuario</h1>
        <small></small>
    </section>



{!! Form::open([ 'id'=>'formCreate']) !!}

@include('usuario.forms.user') 

{!! Form::close() !!}

@stop