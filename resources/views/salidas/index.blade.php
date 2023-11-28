@extends('adminlte::page')

@section('title', 'EntradaSalidas')

@section('content_header')
    <h1>Lista de Registros de Salidas del taller</h1>
@stop

@section('content')

    <!-- Mensaje de error -->
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('salidas.create') }}" class="btn btn-primary btb-sm">Nueva Salida</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="procesos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">fecha</th>
                        <th scope="col">hora</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($salidas as $salida)
                        <tr>
                            <td>{{ $salida->id }}</td>
                            <td>{{ $salida->fecha }}</td>
                            <td>{{ $salida->hora }}</td>
                            <td>
                            @foreach ($imagenes as $imagen)
                                @if ($imagen['id_foranea'] == $salida->id)
                                    <img src="{{ $imagen['image_url'] }}" alt="..." width="150">
                                @endif
                            @endforeach
                            </td>
                            <td>
                                <form action="{{ route('salidas.destroy', $salida->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    {{-- <a href="{{ route('salidas.show', $salida) }}" class="btn btn-info btn-sm">Ver
                                        Detalles<a> --}}
                                    {{-- <a href="{{route('entradas.edit', $salida)}}" class="btn btn-info btn-sm">Editar<a> --}}

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                        value="Borrar">Eliminar</button>
                                    @can('eliminar usuario')
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> --}}
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#procesos').DataTable();
        });
    </script>
@stop
