@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Lista de ingresos a empleados <a href="{{ url('/ingresos_empleados/create') }}" class="btn btn-success">Nuevo ingreso</a></h1>

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
            @foreach($ingreso_empleados as $r)
            <tr>
                <td>{{$r->id_ingreso}}</td>
                <td>{{$r->empleado_id}}</td>
                <td>{{$r->conceptos_id}}</td>
                <td>{{$r->valor_ingreso}}</td>
                <td>
                    <form action="{{ url('/ingresos_empleados/'.$r->id_ingreso) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('Quieres borrar')" value="Eliminar" class="btn btn-danger btn-sm">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection