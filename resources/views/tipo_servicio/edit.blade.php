@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Editar tipo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('tiposervicios.update', $tipoServicio)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nueva nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('name', $tipoServicio->descripción)}}" id="nombre">
                        @error('nombre')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                   
                </div>
                <div class="form-group col-md-12">
                    <label for="nombre">Ingrese nueva descripción</label>
                    <input type="text" name="descripcion" class="form-control" value="{{old('descripcion', $tipoServicio->descripcion)}}" id="nombre">
                    @error('nombre')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
                <div class="form-group col-md-2">
                    <label for="domicilio">Servicio a Domicilio</label> 

                    <input type="checkbox" checked="checked" name="domicilio" class="form-control" value="{{old('domicilio')}}" id="domicilio">
                    @error('domicilio')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div>   
        <br>


        <button  class="btn btn-primary" type="submit">Actualizar tipo de servicio</button>
        <a class="btn btn-danger" href="{{route('tiposervicios.index')}}">Volver</a>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop