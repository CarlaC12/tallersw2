@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Facturas</h1>
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('reportes.factura.index')}}">Reporte de Ventas Anuales</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="reservas">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nit</th>
                    <th scope="col">Total</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($facturas as $factura)
                <tr>
                    
                    <td>{{$factura->id}}</td>
                    <td>{{$factura->nit}}</td>
                    <td>{{$factura->total}}</td>
                    <td>{{$factura->fecha}}</td>
                    <td>{{$factura->hora}}</td>
                    
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
    $('#reservas').DataTable({
            autoWidth:false
        });
</script>
@endsection