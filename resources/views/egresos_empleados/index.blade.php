@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Lista de egresos a empleados <a href="{{ url('/egresos_empleados/create') }}" class="btn btn-success">Nuevo egreso</a> </h1>

    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
        <!-- //si hay un mensaje lo muestra -->
        {{Session::get('mensaje')}}
    </div>
    @endif

    <table class="table table-light table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Empleado</th>
                <th>Concepto</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($egreso_empleados as $egreso_empleado)
            <tr>
                <td>{{$egreso_empleado->id_egreso}}</td>
                <td>{{$egreso_empleado->nombre}} {{$egreso_empleado->apellido_paterno}}</td>
                <td>{{$egreso_empleado->descripcion_conceptos}}</td>
                <td>{{$egreso_empleado->valor_egreso}}</td>
                <td>
                    <form action="{{ url('/egresos_empleados/'.$egreso_empleado->id_egreso) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¡Quieres borrar?')" value="Eliminar" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection