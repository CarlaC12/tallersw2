@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Salida</h1>
@stop

@section('content')
    <form action="{{route('salidas.store')}}" method="POST">
        @csrf

        <label for="hora">hora de Salida:</label>
        <input type="time" name="hora" class="form-control" placeholder="">
        @error('hora')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        <label for="fecha">fecha de Salida:</label>
        <input type="date" name="fecha" class="form-control" placeholder="">
        @error('fecha')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>

        {{-- <label for="tipo">Seleccione el tip</label>
        <select name="tipo" id="" class="form-control">
            <option value=1>Entrada</option>
            <option value=2>Salida</option>
        </select> --}}

        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" class="form-control" >
        @error('descripcion')
        <small>*{{$message}}</small>
        <br><br>
        @enderror
        <br>


        <input type="number" value=1 name="tipo" hidden>

        <div class="card">
            <span>Imágenes:</span>
            <div class="card-body">
                @foreach ($images as $image)
                    <img src="{{$image->url}}" alt="" class="img-thumbnail">
                @endforeach
            </div>
            
        </div>

        {{-- <button  class="btn btn-danger btn-sm" type="submit">Registrar Salida</button> --}}
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
