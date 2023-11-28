@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Datos De mecanicos</h1>
@stop

@section('content')
<form method="post" action="{{route('mecanicos.update',$mecanico)}}">
    @csrf
    @method('PATCH')

    <h5>CI:</h5>
    <input type="text"  name="ci" value="{{$mecanico->ci}}" class="focus border-primary  form-control">
    @error('ci')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <h5>Nombres:</h5>
    <input type="text"  name="nombre" value="{{$mecanico->nombre}}" class="focus border-primary  form-control">
    @error('nombre')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <h5>Email:</h5>
    <input type="text"  name="email" value="{{$mecanico->email}}" class="focus border-primary  form-control">
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <h5>Fecha:</h5>
    <input type="date"  name="fecha" value="{{$mecanico->fecha}}" class="focus border-primary  form-control">
    @error('fecha')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <div class="form-group">
            <h5>especialidad:</h5>
            <select name="especialidad"  class="focus border-primary  form-control">
                <option value="{{$mecanico->especialidad}}">{{$mecanico->especialidad}}</option>
                <option value="Mecanico">Mecanico</option>
                <option value="Chaperio">Chaperio</option>
                <option value="Hidraulica">Hidraulica</option>
                <option value="Hidraulica">Pintura</option>
            </select>
        </div>

    <div class="form-group">
            <h5>Genero:</h5>
            <select name="genero" class="focus border-primary  form-control">
                <option value="{{$mecanico->genero}}">{{$mecanico->genero}}</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
    </div>

    <h5>Celular:</h5>
    <input type="text"  name="celular" value="{{$mecanico->celular}}" class="focus border-primary  form-control">
    @error('celular')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <br>
    <button type="submit"  class="btn btn-info">Guardar</button>
    <a class="btn btn-danger" href="{{route('mecanicos.index')}}">Volver</a>

</form>
@stop
