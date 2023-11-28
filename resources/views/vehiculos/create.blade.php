@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Registrar vehiculo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">        
        <form method="post" action="{{route('vehiculos.store')}}" >
        @csrf

        <h5>Matricula:</h5>
        <input type="text"  name="matricula" class="focus border-primary  form-control">
        @error('matricula')
        <span class="text-danger">{{$message}}</span>
        @enderror
        
        <h5>Marca:</h5>
        <input type="text"  name="marca" class="focus border-primary  form-control">
        @error('marca')
        <span class="text-danger">{{$message}}</span>
        @enderror
            
        <h5>Modelo:</h5>
        <input type="text"  name="modelo" class="focus border-primary  form-control">
        @error('modelo')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <h5>Año:</h5>
        <input type="text"  name="year" class="focus border-primary  form-control">
        @error('year')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <div class="form-group">
            <h5>Combustible:</h5>
            <select name="combustible"  class="focus border-primary  form-control">
                <option value="Gasolina">Gasolina</option>
                <option value="Diesel">Diesel</option>
                <option value="Gas">Gas</option>
                </select>
        </div>

        <div class="form-group">
            <h5>Caja:</h5>
            <select name="caja"  class="focus border-primary  form-control">
                <option value="Mecanica">Mecanica</option>
                <option value="Automatica">Automatica</option>
                </select>
        </div>


        <h5>Color:</h5>
        <input type="text"  name="color"  class="focus border-primary  form-control">
        @error('color')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <div class="form-group">
            <h5>Tipo:</h5>
            <select name="tipo"  class="focus border-primary  form-control">
                <option value="Automovil">Automovil</option>
                <option value="Motocicleta">Motocicleta</option>
                <option value="Autobus">Autobus</option>
                <option value="Camion">Camion</option>
                <option value="Micro">Micro</option>
                </select>
        </div>

        <br>
        <button  class="btn btn-primary" type="submit">Registrar</button>
        <a class="btn btn-danger" href="{{route('vehiculos.index')}}">Volver</a>
        </form> 
       
    </div>
</div>  
@stop