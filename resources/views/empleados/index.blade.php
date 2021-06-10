@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Lista de los empleados <a href="{{ url('/empleados/create') }}" class="btn btn-success">Nuevo empleado</a></h1>

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
                <th style="width: 10%;">Foto</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Acciones</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td><img src="{{ asset('storage').'/'.$empleado->foto }}" class="img-thumnail img-fluid"></td>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellido_paterno}} {{$empleado->apellido_paterno}}</td>
                <td>{{$empleado->correo}}</td>
                <td>
                    <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>|
                    <form action="{{ url('/empleados/'.$empleado->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('Quieres borrar')" value="Eliminar" class="btn btn-danger btn-sm">
                    </form>
                </td>
                <td><a href="{{ url('/consultas/'.$empleado->id) }}" class="btn btn-sm" style="border-color: red;">Mostrar rol</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection