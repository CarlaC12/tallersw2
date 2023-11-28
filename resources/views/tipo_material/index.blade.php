@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Tipo de Herramientas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('tipomateriales.create')}}" class="btn btn-primary btb-sm">Añadir Tipo</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tipomateriales" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                   
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tipoMateriales as $tipoMaterial)
                        <tr>
                            <td>{{$tipoMaterial->id}}</td>
                            <td>{{$tipoMaterial->descripción}}</td>
                   
             
                            <td>
                                <form action="{{route('tipomateriales.destroy', $tipoMaterial)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('tipomateriales.edit', $tipoMaterial)}}" class="btn btn-info btn-sm">Editar<a>
                                    @can('editar tipo herramienta')
                                    @endcan
                                    <button class="btn btn-danger btn-sm" tipoMaterial="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                    @can('eliminar tipo de herramienta')
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