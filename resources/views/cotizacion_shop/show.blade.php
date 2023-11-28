@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
{{-- <h1>Nuestros Servicios</h1> --}}
@stop

@section('content')
<div class="card">
</div>

<div class="card">

    <div class="card-body">
        <h3 class="text">Cotizacion</h3> 

        <p class="h5">{{$cotizacion->count()}} Items en Total</p>
        <p class="h5">Total en Bs.{{Cart::getTotal()}}</p>
        @foreach ($cotizacion as $row)
    
    
            <div class="card h-100">
                <div class="card-body">
                    <dl class="row">
        
                        <dt class="col-sm-2">Nombre : </dt>
                         <dd class="col-sm-9">{{$row->name}}</dd>
         
                         <dt class="col-sm-2">Precio : </dt>
                         <dd class="col-sm-9">{{$row->price}}</dd>
        
                         <dt class="col-sm-2">Cantidad : </dt>
                        <dd class="col-sm-9">{{$row->quantity}}</dd>

                        <dt class="col-sm-2">Tipo de Servicio : </dt>
                        <dd class="col-sm-9">{{$row->attributes->nameType}}</dd>

                        <dt class="col-sm-2">Subtotal : </dt>
                        <dd class="col-sm-9">{{$row->price*$row->quantity}}</dd>
        
                    </dl>
        
                    <a href="#" class="btn btn-primary">Button</a>
                </div>
            </div>
    

        
        @endforeach
        <a href="{{route('reservas.create')}}" class="btn btn-primary">Reservar</a>
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
@stop