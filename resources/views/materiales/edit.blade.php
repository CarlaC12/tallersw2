@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
    <h1>Editar Herramienta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{route('materiales.update', $materiales)}}" method="post" novalidate >
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cantidad">Ingrese nueva cantidad</label>
                        <input type="number" name="cantidad" class="form-control" value="{{old('name', $materiales->cantidad)}}" id="cantidad">
                        @error('cantidad')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                   
                </div>


               
                <div>
                    {{-- <label for="empleados">Seleccione un empleado</label>
                    <select name="empleados" class="form-control" id="select-empleados" disabled="" onchange="elegirE()" >
                        @if ($e > 0)
                            <option value="{{old('empleados' ,$empleado->id)}}">{{$empleado->nombre}}</option>                            
                        @else
                            <option value=0>Seleccione al empleado</option>                            
                        @endif
                            @foreach ($empleados as $empleado)
                                <option value="{{ $empleado->id }}">{{ $empleado->nombre}}</option>
                            @endforeach
                    </select>
                    @error('empleados')
                        <small>*{{$message}}</small>
                        <br><br>
                    @enderror --}}
                </div>
                <br>

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar Herramienta</button>
            </form>

    </div>
</div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop