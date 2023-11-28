@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Editar tipo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('tipomateriales.update', $tipoMaterial)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Ingrese nueva nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{old('name', $tipoMaterial->descripción)}}" id="nombre">
                        @error('nombre')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                   
                </div>
        <br>

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar tipo</button>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop