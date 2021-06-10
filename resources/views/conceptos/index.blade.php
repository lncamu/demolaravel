@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Lista de los conceptos registrados
        <a href="{{ url('/conceptos/create') }}" class="btn btn-success">Nuevo concepto</a>
    </h1>

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
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conceptos as $concepto)
            <tr>
                <td>{{$concepto->id_conceptos}}</td>
                <td>{{$concepto->descripcion_conceptos}}</td>
                <td>
                    <!-- <a href="{{ url('/conceptos/'.$concepto->id_conceptos.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>| -->

                    <form action="{{ url('/conceptos/'.$concepto->id_conceptos) }}" method="post" class="d-inline">
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