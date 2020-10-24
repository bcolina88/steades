@extends('layout.template')
@section('title')
Ajuste de pago | Steades
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Pagos pendientes por empleados
        <small></small>
    </section>


{!! Form::open(['route' => 'ajustes.store', 'method' => 'POST']) !!}

@include('ajuste.forms.ajuste') 

{!! Form::close() !!}

@stop