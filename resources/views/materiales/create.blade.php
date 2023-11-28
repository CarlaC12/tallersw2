@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Registro de Herramientas</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('materiales.store')}}" method="post" novalidate >
                @csrf
                <label for="name">Ingrese el nombre de Herramienta</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>

                <label for="cantidad">Ingrese la cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="{{old('cantidad')}}">
                @error('cantidad')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                <br>


                <div>
                    <select name="tipo_material" id="input_tipo_material">
                        <option value="" disabled selected>Elija una opción</option>
                        @foreach($tipos as $tipo)
                            <option value="{{$tipo->descripción}}">{{ $tipo->descripción}}</option>
                   
                        @endforeach

                    </select>
                    <label>Selecccione un tipo de herramienta:</label>
                    @error('tipos')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                    <br>
                </div>

                {{-- <div>
                    <label for="mecanicos">Seleccione un mecánico</label>
                    <select name="mecanicos" class="form-control" id="select-mecanico" disabled="" onchange="elegirE()">
                        <option value=0 >Seleccione un trabajador</option>
                            @foreach ($mecanicos as $mecanico)
                                <option value="{{ $mecanico->id }}">{{ $mecanico->nombre}}</option>
                            @endforeach
                    </select>
                    @error('mecanicos')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror
                </div> --}}
                <br>


                <button  class="btn btn-primary" type="submit">Añadir Herramienta</button>
                    <a class="btn btn-danger" href="{{route('materiales.index')}}">Volver</a>
           
                
            </form>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop