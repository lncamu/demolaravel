@extends('layouts.app')

@section('content')
<div class="container">
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
            </tr>
        </thead>
        <tbody>
            @foreach($datos_vista as $consultas_report_ingresoa)
            <tr>
                <td>{{$consultas_report_ingresoa->nombre_empleado}}</td>
                <td>{{$consultas_report_ingresoa->apellido_paterno}}</td>
                <td>{{$consultas_report_ingresoa->valor_de_ingreso}}</td>
                <td>{{$consultas_report_ingresoa->descripcion_conceptos}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection