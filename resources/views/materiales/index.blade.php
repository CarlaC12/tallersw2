@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Herramientas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('materiales.create')}}" class="btn btn-primary btb-sm">Añadir Herramienta</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="materiales" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($materiales as $material)
                        <tr>
                            <td>{{$material->id}}</td>
                            <td>{{$material->nombre}}</td>
                            <td>{{$material->cantidad}}</td>
                            <td>{{$material->tipo}}</td>
             
                            <td>
                                <form action="{{route('materiales.destroy', $material)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('materiales.edit', $material)}}" class="btn btn-info btn-sm">Editar<a>
                                    @can('editar herramienta')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                    @can('eliminar herramienta')
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#materiales').DataTable();
        } );
    </script> 
@stop