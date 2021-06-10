@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registro de los conceptos</h1>
    <form action="{{ url('conceptos') }}" method="post">
        @csrf
        <!-- llave de seguridad para saber si estamos en el mismo sistema, 
        automaticamente laravel responde cuando enviemos la informacion al metodo storage -->
        <label for="descripcion_conceptos">Nombre del nuevo concepto</label>
        <input type="text" name="descripcion_conceptos" title="Descripción del concepto" placeholder="Describir el nuevo concepto" class="form-control" value="" required> <br>

        <br> <input type="submit" value="Registrar" class="btn btn-danger">
        <a href="{{ url('/conceptos') }}" class="btn btn-info">Mostrar todos</a>
    </form>
</div>
@endsection