@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Registro de Tipo de Servicios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('tiposervicios.store')}}" method="post" novalidate >
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nombre del tipo</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('name')}}" id="nombre">
                        @error('nombre')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>

                   

                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese la descripción</label>
                        <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" id="descripcion">
                        @error('descripcion')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                        
                       
                    </div>
                    
                    <div class="form-row">
                      
                        <label for="domicilio">Es servicio a domicilio?</label> 
                      

                        <input type="checkbox" name="domicilio" class="form-control" value="1" {{ old('domicilio') ? 'checked="checked"' : '' }}/>

                        <br><br>

                     
                        @error('domicilio')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
               
                    </div>   
           
                    
                </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit">Añadir tipo</button>
                    <a class="btn btn-danger" href="{{route('tiposervicios.index')}}">Volver</a>
                </div>
                
            </form>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop