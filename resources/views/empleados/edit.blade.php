<!-- <h1>Formulario de edici&oacute;n de los empleados</h1> -->
@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('empleados.form',['modo'=>'Editar'])
        <!-- ,['modo'=>'Editar'] es el texto a presentarle en el boton  -->
    </form>
</div>
@endsection