@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle de servicio</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalle de Pago</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Cliente: {{ $cliente->nombre }}</h5>
                            <h5>Vehículo: {{ $vehiculo->marca }} {{ $vehiculo->modelo }} ({{ $vehiculo->matricula }})</h5>
                        </div>
                        <div class="mb-4">
                            <h5>Orden de Trabajo #{{ $ordenTrabajo->id }}</h5>
                            <p>Descripción: {{ $ordenTrabajo->descripcion }}</p>
                            <p>Horas trabajadas: {{ $ordenTrabajo->horas }}</p>
                            <p>Fecha de inicio: {{ $ordenTrabajo->fechai }}</p>
                        </div>
                        <div class="mb-4">
                            <h5>Mecánico: {{ $mecanico->nombre }}</h5>
                        </div>
                        <div>
                            <h5>Servicios:</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($servicios as $servicio)
                                        <tr>
                                            <td>{{ $servicio->nombre }}</td>
                                            <td>{{ $servicio->precio }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <h4>Total: {{ $total }} Bs</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')

@stop
