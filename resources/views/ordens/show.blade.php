@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle De Orden De Trabajo</h1>
@stop

@section('content')
    <form method="post" action="{{ route('ordens.update', $orden) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-6">
                <h5>Descripcion:</h5>
                <input type="text" name="descripcion" value="{{ $orden->descripcion }}"
                    class="focus border-primary  form-control" readonly>
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                <h5>Estado:</h5>
                <input type="text" name="estado" value="{{ $orden->estado }}" class="focus border-primary  form-control"
                    readonly>
                @error('estado')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h5>Fecha Iniciada:</h5>
                <input type="text" name="fechai" value="{{ $orden->fechai }}" class="focus border-primary  form-control"
                    readonly>
                @error('fechai')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-6">
                <h5>Fecha Finalizada:</h5>
                <input type="text" name="fechaf" value="{{ $orden->fechaf }}" class="focus border-primary  form-control"
                    readonly>
                @error('fechaf')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h5>Mecanico Encargado:</h5>
                <input type="text" name="ci" value="{{ $orden->mecanico_id }}"
                    class="focus border-primary  form-control" readonly>
                @error('ci')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <br>

        {{-- <div class="card">
            <div class="card-header">
                <h2>Lista De Tareas</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $servicio)
                            <tr>
                                @foreach ($servicioos as $servicioo)
                                    @if ($servicio->id == $servicioo->servicio_id)
                                        <td>{{ $servicio->id }}</td>
                                        <td>{{ $servicio->nombre }}</td>
                                        <td>{{ $servicio->descripcion }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
        <br>

        {{-- <div class="card">
        <div class="card-header">
            <h2>Mecanicos Ayudantes:</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($mecanicos as $mecanico)
                    <tr>
                        @foreach ($mecanicoos as $mecanicoo)
                            @if ($mecanico->id == $mecanicoo->mecanico_id)
                                <td>{{$mecanico->id}}</td>
                                <td>{{$mecanico->nombre}}</td>
                                <td>{{$mecanico->especialidad}}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

        <br>
        <!-- <button type="submit"  class="btn btn-info">Guardar</button> -->
        <a class="btn btn-primary btn" href="{{ route('facturas.create', ['orden' => $orden]) }}">Generar Factura</a>
        <a class="btn btn-danger" href="{{ route('ordens.index') }}">Volver</a>

    </form>
@stop
