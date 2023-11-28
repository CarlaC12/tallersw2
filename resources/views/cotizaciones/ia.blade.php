@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Cotización</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('cotizaciones.index') }}" class="btn btn-primary btn-sm">Volver</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {{-- Lado izquierdo: Mostrar la imagen --}}
            <img src="{{ $url }}" alt="Imagen del producto" class="img-fluid" width="500">
        </div>
        <div class="col-md-6">
            {{-- Lado derecho: Mostrar detalles del producto --}}
            <div class="card">
                <div class="card-body">
                    {{-- Detalles del producto --}}
                    <h3>Servicios Requeridos:</h3>
                    <?php $total = 0?>
                    @foreach ($services_ia as $service_ia)
                        <p>Nombre: {{ $service_ia["nombre"] }}</p>
                        <p>Precio: {{ $service_ia["precio"] }} Bs. </p> <br>
                        <?php $total += $service_ia["precio"] ?>
                    @endforeach
                    <h3>Total: {{$total}} Bs.</h3>
                    {{-- Otros detalles aquí --}}
                </div>
            </div>
        </div>
    </div>

@stop
