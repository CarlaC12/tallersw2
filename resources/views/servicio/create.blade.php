@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Registro de Servicios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('servicios.store')}}" method="post" novalidate >
                @csrf
                <label for="name">Ingrese el nombre del servicio</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="precio">Ingrese el precio</label>
                <input type="number" step="0.01" name="precio" class="form-control" value="{{old('precio')}}">
                @error('precio')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="precio">Ingrese la descripción</label>
                <input type="text"  name="descripción" class="form-control" value="{{old('descripción')}}">
                @error('descripción')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>



                <button  class="btn btn-primary" type="submit">Añadir Servicio</button>
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