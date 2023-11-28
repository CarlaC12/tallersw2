@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Datos De Tipos De Vehiculo</h1>
@stop

@section('content')
<form method="post" action="{{route('tipos.update',$tipo)}}">
    @csrf
    @method('PATCH')
    <h5>Nombres:</h5>
    <input type="text"  name="nombre" value="{{$tipo->nombre}}" class="focus border-primary  form-control">
    @error('nombre')
    <span class="text-danger">{{$message}}</span>
    @enderror
    <br>
    <button type="submit"  class="btn btn-info">Guardar</button>
    <a class="btn btn-danger" href="{{route('tipos.index')}}">Volver</a>
</form>
@stop