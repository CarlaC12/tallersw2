@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Registro de Tipo de Herramientas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('tipomateriales.store')}}" method="post" novalidate >
                @csrf
                <label for="descripcion">Ingrese el nombre del tipo</label>
                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
                @error('descripcion')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>
                <button  class="btn btn-primary" type="submit">Añadir tipo</button>
                <a class="btn btn-danger" href="{{route('tipomateriales.index')}}">Volver</a>
            </form>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop