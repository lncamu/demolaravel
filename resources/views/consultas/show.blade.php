@extends('layouts.app')

@section('content')
@php
$valor_total_ingreso = 00;
$valor_total_egreso = 00;
$valor_total_sueldo = 00;
$valor_total_roldepago = 00;
@endphp
<div class="container">
    <h1>Rol de pago de @foreach($datos_ingresos as $datos_ingreso) {{$datos_ingreso->nombre}} @endforeach </h1>

    TOTAL A PAGAR = Sueldo + Ingresos - Egresos.
    <table class="table table-light table-responsive">
        <thead class="thead-light">
          
            @foreach($datos_ingresos as $datos_ingreso)
            @php
                $valor_total_sueldo  = $datos_ingreso->valor_de_sueldo;
                $valor_total_ingreso = $datos_ingreso->valor_de_ingreso;
                $valor_total_egreso  = $datos_ingreso->valor_de_egreso;
            @endphp

            <tr title="Lista de sueldo">
                <td> + Sueldo</td>
                <td> ${{ $valor_total_sueldo}}</td>
            </tr>

            <tr title="Lista de ingresos">
                <td> + Ingresos</td>
                <td> ${{$valor_total_ingreso}}</td>
            </tr>
            
            <tr title="Lista de egresos">
            <td> - Egresos</td>
                <td>${{$valor_total_egreso}}</td>
            </tr>
            @endforeach
            @php
            $valor_total_roldepago = $valor_total_roldepago + $valor_total_ingreso + $valor_total_sueldo - $valor_total_egreso;
            @endphp
            
        </thead>
        <tbody>
            <tr>
                <td>= Total a pagar </td>
                <td> $ {{ $valor_total_roldepago }} </td>
            </tr>
        </tbody>
    </table>
   
</div>
@endsection