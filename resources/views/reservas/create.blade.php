@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
<h1>Registro de Reserva</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{route('reservas.store')}}" method="post" novalidate>
            @csrf
            <label for="fecha">Realizar una reserva</label>
            <input type="date" name="fecha" class="form-control" value="{{old('fecha')}}">
            @error('fecha')
            <small>*{{$message}}</small>
            <br><br>
            @enderror
            <br>

            <label for="hora">Seleccione una hora</label>
            <input type="time" name="hora" class="form-control" value="{{old('hora')}}">
            @error('hora')
            <small>*{{$message}}</small>
            <br><br>
            @enderror
            <br>


            <div>
                <select name="vehiculo_id" id="vehiculo_id">
                    <option value="" disabled selected>Elija una opción</option>
                    @foreach($vehiculos as $vehiculo)
                    <option value="{{$vehiculo->id}}">{{ $vehiculo->marca.' - '.$vehiculo->modelo}}</option>

                    @endforeach

                </select>
                <label>Selecccione un vehiculo:</label>
                @error('vehiculo_id')
                <small>*{{$message}}</small>
                <br><br>
                @enderror
                <br>
            </div>

          
            <br>


            <button class="btn btn-primary" type="submit">Añadir Reserva</button>
            <a class="btn btn-danger" href="{{route('reservas.index')}}">Volver</a>


        </form>

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop