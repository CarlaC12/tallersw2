@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista vehiculos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('vehiculos.create')}}">Registrar vehiculo</a>
        <a class="btn btn-primary" href="{{route('reportes.vehiculo.index')}}">Realizar Reportes</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="vehiculos">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Matricula</th>
                    <th >Marca</th>
                    <th >Modelo</th>
                    <th >Año</th>
                    <th >Combustible</th>
                    <th >Caja</th>
                    <th>Color</th>
                    <th>Tipo</th>
                    <th>Nombre De Propietarios</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehiculo as $vehiculos)
                <tr>
                    <td>{{$vehiculos->id}}</td>
                    <td>{{$vehiculos->matricula}}</td>
                    <td>{{$vehiculos->marca}}</td>
                    <td>{{$vehiculos->modelo}}</td>
                    <td>{{$vehiculos->year}}</td>
                    <td>{{$vehiculos->combustible}}</td>
                    <td>{{$vehiculos->caja}}</td>
                    <td>{{$vehiculos->color}}</td>
                    <td>{{$vehiculos->tipo}}</td>
                    @foreach ($cliente as $clientes)
                        @if($vehiculos->cliente_id == $clientes->id)
                        <td>{{$clientes->nombre}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('vehiculos.edit',$vehiculos)}}">Editar</a>
                        <form action="{{route('vehiculos.destroy',$vehiculos)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#vehiculos').DataTable({
            autoWidth:false
        });
    </script>
@endsection