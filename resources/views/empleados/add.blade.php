@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{ url('empleados') }}" method="post" enctype="multipart/form-data">

        @csrf
        <!-- llave de seguridad para saber si estamos en el mismo sistema, 
        automaticamente laravel responde cuando enviemos la informacion al metodo storage -->

        @include('empleados.form',['modo'=>'Registrar'])
        <!-- ,['modo'=>'Registrar'] es el texto a presentarle en el boton  -->

    </form>
</div>
@endsection