@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rol de pago de {{ isset($datos_empleado->nombre)?$datos_empleado->nombre:'' }}</h1>
    TOTAL A PAGAR = Sueldo + Ingresos - Descuentos.
    <table class="table table-light table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Sueldo</th>
                <th>{{ isset($datos_empleado->nombre)?$datos_empleado->nombre:'' }}</th>
            </tr>
            <tr>
                <th>Ingresos</th>
                <th></th>
                <th>{{ isset($datos_empleado->nombre)?$datos_empleado->nombre:'' }}</th>
            </tr>
            <tr>
                <th>Egresos</th>
                <th></th>
                <th></th>
                <th>{{ isset($datos_empleado->nombre)?$datos_empleado->nombre:'' }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>total a pagar</td>
                <td></td>
                <td></td>
                <td> </td>
                <td>x </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection