@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Editar Servicio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('servicios.update', $servicio)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nuevo nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('name', $servicio->nombre)}}" id="nombre">
                        @error('nombre')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>

                    <div class="form-group col-md-3">
                        <label for="precio">Ingrese nuevo precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{old('precio', $servicio->precio_base)}}" id="precio">
                        @error('precio')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>   

                    

                   
                </div>
                <div class="form-group col-md-12">
                    <label for="precio">Ingrese nueva descripción</label>
                    <input type="text" name="descripción" class="form-control" value="{{old('descripción', $servicio->descripcion)}}" id="descripción">
                    @error('descripción')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>   
        <br>

                <button  class="btn btn-primary" type="submit">Actualizar servicio</button>
                <a class="btn btn-danger" href="{{route('servicios.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop