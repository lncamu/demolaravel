@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Registro de ingresos a empleados</h1>

    <form action="{{ url('ingresos_empleados') }}" method="post">
        @csrf
        <!-- llave de seguridad para saber si estamos en el mismo sistema, 
        automaticamente laravel responde cuando enviemos la informacion al metodo storage -->

        <label for="">Concepto</label>
        <select class="form-control" name="conceptos_id" required>
            <option selected value="" disabled>Seleccione el concepto del ingreso</option>
            @foreach($conceptos as $concepto)
            <option value="{{$concepto->id_conceptos}}">{{$concepto->descripcion_conceptos}}</option>
            @endforeach
        </select><br>


        <label for="Empleado">Empleado</label>
        <select class="form-control" name="empleado_id" required>
            <option selected value="" disabled>Seleccione el empleado</option>
            @foreach($empleados as $empleados)
            <option value="{{$empleados->id}}">{{$empleados->nombre}} {{$empleados->apellido_paterno}}</option>
            @endforeach
        </select><br>


        <label for="valor_ingreso">Valor</label>
        <input type="text" name="valor_ingreso" title="Valor Ej. $10" placeholder="Valor Ej. $10.50" class="form-control" value="" autocomplete="off" required> <br>


        <br> <input type="submit" value="Registrar" class="btn btn-danger">
        <a href="{{ url('/ingresos_empleados') }}" class="btn btn-info">Mostrar ingresos</a>
    </form>
</div>
@endsection