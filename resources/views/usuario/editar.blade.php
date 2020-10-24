@extends('layout.template')
@section('title')
Editar Usuario | Steades
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Usuario
        <small></small>
    </section>

 {!! Form::model($user2, ['route'=>['usuarios.update', $user2->id],'id'=>'formCreate']) !!}



@include('usuario.forms.user')


{!! Form::close() !!}

@stop