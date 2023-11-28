@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
<h1>Servicios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('detalle.orden.trabajo.index')}}" class="btn btn-primary btb-sm">Orden Trabajo</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="servicios" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($ordenTrabajos as $ordenTrabajo)
                <tr>
                    <td>{{$ordenTrabajo->id}}</td>
                    <td>{{$ordenTrabajo->estado}}</td>
                    <td>{{$ordenTrabajo->fechai}}</td>
                    <td>{{$ordenTrabajo->fechaf}}</td>


                    <td>
                        <a href="{{route('detalle.orden.index', [$ordenTrabajo])}}" class="btn btn-info btn-sm">Agregar Materiales<a>
                            
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