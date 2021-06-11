@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Sueldos registrados <a href="{{ url('/sueldos/create') }}" class="btn btn-success">Nuevo sueldo</a></h1>

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
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sueldos as $sueldo)
            <tr>
                <td>{{$sueldo->id_sueldo}}</td>
                <td>{{$sueldo->nombre}} {{$sueldo->apellido_paterno}}</td>
                <td>{{$sueldo->valor_sueldo}}</td>
                <td>
                    <form action="{{ url('/sueldos/'.$sueldo->id_sueldo) }}" method="post" class="d-inline">
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