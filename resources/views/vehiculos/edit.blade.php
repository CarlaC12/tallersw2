@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Datos De Vehiculo</h1>
@stop

@section('content')
<form method="post" action="{{route('vehiculos.update',$vehiculo)}}">
    @csrf
    @method('PATCH')
    
        <h5>Matricula:</h5>
        <input type="text"  name="matricula" value="{{$vehiculo->matricula}}" class="focus border-primary  form-control">
        @error('matricula')
        <span class="text-danger">{{$message}}</span>
        @enderror
    
        <h5>Marca:</h5>
        <input type="text"  name="marca" value="{{$vehiculo->marca}}"class="focus border-primary  form-control">
        @error('marca')
        <span class="text-danger">{{$message}}</span>
        @enderror
            
        <h5>Modelo:</h5>
        <input type="text"  name="modelo" value="{{$vehiculo->modelo}}"class="focus border-primary  form-control">
        @error('modelo')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <h5>Año:</h5>
        <input type="text"  name="year" value="{{$vehiculo->year}}"class="focus border-primary  form-control">
        @error('year')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <div class="form-group">
            <h5>Combustible:</h5>
            <select name="combustible"  class="focus border-primary  form-control">
                <option value="{{$vehiculo->combustible}}">{{$vehiculo->combustible}}</option>
                <option value="Gasolina">Gasolina</option>
                <option value="Diesel">Diesel</option>
                <option value="Gas">Gas</option>
                </select>
        </div>

        <div class="form-group">
            <h5>Caja:</h5>
            <select name="caja"  class="focus border-primary  form-control">
            <option value="{{$vehiculo->caja}}">{{$vehiculo->caja}}</option>
            <option value="Mecanica">Mecanica</option>
            <option value="Automatica">Automatica</option>
            </select>
        </div>


        <h5>Color:</h5>
        <input type="text"  name="color" value="{{$vehiculo->color}}" class="focus border-primary  form-control">
        @error('color')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <div class="form-group">
            <h5>Tipo:</h5>
            <select name="tipo"  class="focus border-primary  form-control">
            <option value="{{$vehiculo->tipo}}">{{$vehiculo->tipo}}</option>
                <option value="Automovil">Automovil</option>
                <option value="Motocicleta">Motocicleta</option>
                <option value="Autobus">Autobus</option>
                <option value="Camion">Camion</option>
                <option value="Micro">Micro</option>
                </select>
        </div>
        <h5>CI del Propietario:</h5>
        <input type="text"  name="ci" value="{{$vehiculo->cliente_id}}" class="focus border-primary  form-control" readonly>
        @error('ci')
        <span class="text-danger">{{$message}}</span>
        @enderror
    <br>
    <button type="submit"  class="btn btn-info">Guardar</button>
    <a class="btn btn-danger" href="{{route('vehiculos.index')}}">Volver</a>

</form>
@stop