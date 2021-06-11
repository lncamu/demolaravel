@extends('layouts.app')

@section('content')
@php
$valor_total_ingreso = 00;
$valor_total_egreso = 00;
$valor_total_sueldo = 00;
$valor_total_roldepago = 00;
@endphp
<div class="container">
    <h1>Rol de pago de @foreach($datos_ingresos as $datos_ingreso) {{$datos_ingreso->nombre_empleado}} @endforeach </h1>

    TOTAL A PAGAR = Sueldo + Ingresos - Descuentos.
    <table class="table table-light table-responsive">
        <thead class="thead-light">
            <tr>
                <th colspan="2">Ingresos</th>
            </tr>
            @foreach($datos_ingresos as $datos_ingreso)
            @php
            $var_ingreso = $datos_ingreso->valor_de_ingreso;
            $valor_total_ingreso = $valor_total_ingreso + $var_ingreso;
            @endphp
            <tr title="Lista de ingresos">

                <td> {{$datos_ingreso->descripcion_conceptos}}</td>
                <td> ${{$var_ingreso}}</td>
            </tr>
            @endforeach
            @php
            $valor_total_roldepago = $valor_total_roldepago + $valor_total_ingreso + $valor_total_sueldo - $valor_total_egreso;
            @endphp
            <th colspan="2">Total ingresos $ {{ $valor_total_ingreso }}</th>
        </thead>
        <tbody>
            <tr>
                <td>Total a pagar </td>
                <td> $ {{ $valor_total_roldepago }} </td>
            </tr>
        </tbody>
    </table>
    {{-- <span> $var_ingreso es la variable que contiene los ingresos </span>--}}
    {{-- <span>$valor_total_ingreso es la Variable que suma los ingresos </span>--}}
</div>
@endsection