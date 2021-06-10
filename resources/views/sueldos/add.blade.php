@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Registro de sueldo a empleados</h1>

    <form action="{{ url('sueldos') }}" method="post">
        @csrf
        <!-- llave de seguridad para saber si estamos en el mismo sistema, 
        automaticamente laravel responde cuando enviemos la informacion al metodo storage -->

        <label for="Empleado">Empleado</label>
        <select class="form-control" name="empleado_id" required>
            <option selected value="" disabled>Seleccione el empleado</option>
            @foreach($empleados as $empleados)
            <option value="{{$empleados->id}}">{{$empleados->nombre}} {{$empleados->apellido_paterno}}</option>
            @endforeach
        </select><br>

        <label for="valor_sueldo">Valor de suldo </label>
        <input type="text" name="valor_sueldo" title="Valor Ej. $10" placeholder="Valor Ej. $400" class="form-control" value="" autocomplete="off" required> <br>
        <h6>Recuerde que al sueldo se le resta el 9.35% del IESS</h6>


        <br> <input type="submit" value="Registrar" class="btn btn-danger">
        <a href="{{ url('/sueldos') }}" class="btn btn-info">Mostrar sueldos</a>
    </form>
</div>
@endsection