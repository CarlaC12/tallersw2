@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('servicios.create')}}" class="btn btn-primary btb-sm">Añadir Servicio</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="servicios" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{$servicio->id}}</td>
                        <td>{{$servicio->nombre}}</td>
                        <td>{{'Bs. '.$servicio->precio_base}}</td>
                        <td>{{$servicio->descripcion}}</td>
                        
                        
                        <td>
                            <form action="{{route('servicios.destroy', $servicio)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('servicios.edit', $servicio)}}" class="btn btn-info btn-sm">Editar<a>
                                @can('editar servicio')
                                @endcan
                                <button class="btn btn-danger btn-sm" servicio="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                @can('eliminar servicio')
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
        $('#servicios').DataTable();
        } );
    </script> 
@stop