@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Registrar Mecanico</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{route('mecanicos.store')}}" >
        @csrf

        <h5>CI:</h5>
        <input type="text"  name="ci" class="focus border-primary  form-control">
        @error('ci')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <h5>Nombre:</h5>
        <input type="text"  name="nombre" class="focus border-primary  form-control">
        @error('nombre')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <h5>Email:</h5>
        <input type="email"  name="email" class="focus border-primary  form-control">
        @error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <h5>Fecha:</h5>
        <input type="date"  name="fecha" class="focus border-primary  form-control">
        @error('fecha')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <div class="form-group">
            <h5>especialidad:</h5>
            <select name="especialidad"  class="focus border-primary  form-control">
                <option value="Mecanico">Mecanico</option>
                <option value="Chaperio">Chaperio</option>
                <option value="Hidraulica">Hidraulica</option>
                <option value="Hidraulica">Pintura</option>
            </select>
        </div>

        <div class="form-group">
            <h5>Genero:</h5>
            <select name="genero"  class="focus border-primary  form-control">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
        </div>

        <h5>Celular:</h5>
        <input type="text"  name="celular"  class="focus border-primary  form-control">
        @error('celular')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('mecanicos.index')}}">Volver</a>
        </form>

    </div>
</div>
@stop
