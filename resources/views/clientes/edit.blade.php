@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Datos De clientes</h1>
@stop

@section('content')
<form method="post" action="{{route('clientes.update',$cliente)}}">
    @csrf
    @method('PATCH')
    
    <h5>CI:</h5>
    <input type="text"  name="ci" value="{{$cliente->ci}}" class="focus border-primary  form-control">
    @error('ci')
    <span class="text-danger">{{$message}}</span>
    @enderror
    
    <h5>Nombres:</h5>
    <input type="text"  name="nombre" value="{{$cliente->nombre}}" class="focus border-primary  form-control">
    @error('nombre')
    <span class="text-danger">{{$message}}</span>
    @enderror
    
    <div class="form-group">
            <h5>Genero:</h5>
            <select name="genero" class="focus border-primary  form-control">
                <option value="{{$cliente->genero}}">{{$cliente->genero}}</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
    </div>
    
    <h5>Celular:</h5>
    <input type="text"  name="celular" value="{{$cliente->celular}}" class="focus border-primary  form-control">
    @error('celular')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <h5>Email:</h5>
    <input type="text"  name="email" value="{{$cliente->email}}" class="focus border-primary  form-control">
    @error('email')
    <span class="text-danger">{{$message}}</span>
    @enderror
    
    <h5>Fecha:</h5>
    <input type="text"  name="fecha" value="{{$cliente->fecha}}" class="focus border-primary  form-control">
    @error('fecha')
    <span class="text-danger">{{$message}}</span>
    @enderror
    
    <br>
    <button type="submit"  class="btn btn-info">Guardar</button>
    <a class="btn btn-danger" href="{{route('clientes.index')}}">Volver</a>

</form>
@stop