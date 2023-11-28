@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Reporte de ventas de servicio</h1>
@stop
@section('css')
@endsection

@section('content')
<div class="card">
    <div class="card-header">

        <form method="post" action="{{route('reportes.factura.filtro')}}">
        @csrf

        <div class="row">
            <div class="col-md-2">
                <button class="btn btn-primary" >Filtrar</button>
            </div>

            <div class="col-md-5">
                <select name="mes" id="mes">
                    <option value="" disabled selected>Seleccione un Mes</option>
                    @foreach ($meses as $mes)
                        <option value="{{$mes['posicion']}}">{{$mes['nombre']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Año" name="year" value="{{old('year')}}">
            </div>
        </div>
        </form>

    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="reservas">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo de Servicio</th>
                    <th scope="col">Nombre de Servicio</th>
                    <th scope="col">Total en Bs</th>
                    <th scope="col">Cantidad Repetida</th>

                </tr>
            </thead>
            <tbody>
                @foreach($informes as $informe)
                <tr>

                    <td>{{$informe->id}}</td>
                    <td>{{$informe->nombre_tipo}}</td>
                    <td>{{$informe->nombre}}</td>
                    <td>{{$informe->subtotal}}</td>
                    <td>{{$informe->cantidad}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a class="btn btn-primary btn-sm" href="{{route('reportes.factura.download',[$month,$years])}}">Descargar PDF</a>

        <a class="btn btn-danger btn-sm" href="{{route('reportes.factura.download.xls',[$month,$years])}}">Excel</a>

    </div>
</div>
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

@endsection