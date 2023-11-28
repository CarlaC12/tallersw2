@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
<h1>Factura</h1>
@stop

@section('content')
<div class="card">
    
    <div class="card-body">
    
        <form action="{{route('facturas.store',['orden'=>$orden])}}" method="post" novalidate>
            @csrf
            
            <p class="h5 font-weight-bold">Orden Trabajo</p>
            <hr>
            <dl class="row">
                <dt class="col-sm-3">Id Orden : </dt>
                <dd class="col-sm-9">{{$orden->id}}</dd>
            
                <dt class="col-sm-3">Descripcion : </dt>
                <dd class="col-sm-9">{{$orden->descripcion}}
                </dd>
            
                <dt class="col-sm-3">Fecha Inicio : </dt>
                <dd class="col-sm-9">{{$orden->fechaf}}</dd>
            
                <dt class="col-sm-3 text-truncate">Fecha Final : </dt>
                <dd class="col-sm-9">{{$orden->fechaf}}</dd>
            
                <dt class="col-sm-3">Estado : </dt>
                <dd class="col-sm-9">{{$orden->estado}}
                </dd>
            </dl>
            <hr>

            <label for="nit_label">Nit</label>
    
            <input type="text" name="nit" class="form-control" value="{{old('nit')}}">
            @error('nit')
            <small>*{{$message}}</small>
            <br><br>
            @enderror
            <br>
    
            <button class="btn btn-primary" type="submit">Generar factura</button>
        </form>
    
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop