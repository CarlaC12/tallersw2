@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="center">Factura</h1>
@stop

@section('content')
<form method="post" action="#">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-6">
            logo
        </div>
        <div class="col-6">
            ubicacion
        </div>
    </div>

    <div class="row">
       
            <dt class="col-sm-3">Nro Factura : </dt>
            <dd class="col-sm-9">{{$factura->id}}</dd>
        
            <dt class="col-sm-3">Nit : </dt>
            <dd class="col-sm-9">{{$factura->nit}}
            </dd>
        
            <dt class="col-sm-3">Fecha y Hora de emision : </dt>
            <dd class="col-sm-9">{{$factura->fecha.' '. $factura->hora}}</dd>
        
            <dt class="col-sm-3">Nro Reserva : </dt>
            <dd class="col-sm-9">{{$factura->reserva_id}}
            </dd>
        
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Detalle de la Facturacion</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del servicio</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $detail)
                    <tr>
                        <td>{{$detail->detalleServicio->id}}</td>
                        <td>{{$detail->detalleServicio->servicio->nombre}}</td>
                       
                        <td>{{$detail->precio}}</td>
                    </tr>
                    @endforeach
                    <div class="row">
                        <div class="col-9">
                            <p class="font-weight-bold">Total a pagar</p>
                        </div>
                        <div class="col-3">
                            <p class="font-weight-bold">{{$factura->total.' Bs'}}</p>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    
    <p>Nota: Los precio de los servicios incluyen la mano de obra</p>

    <a class="btn btn-primary btn" href="{{route('facturas.index')}}">Ver Facturas</a>
</form>
@stop