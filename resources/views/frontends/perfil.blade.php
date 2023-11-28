@extends('layouts.layout')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 align="center">Datos Personales</h2>
        </div>
        <div class="card-body">
        <div class="row" >
                    <div class="col-6">
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="{{$cliente->ci}}" name="ci" id="ci"readonly>
                            <label for="ci">Carnet De Identidad</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="{{$cliente->nombre}}"name="nombre" id="nombre"readonly>
                            <label for="nombre">Nombre Completo</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="email" class="form-control" value="{{$cliente->email}}" name="email" id="email"readonly>
                            <label for="email">Correo Electronico</label>
                        </div>
                        
                        <br>
                        <div class="form-floating">
                        <input id="name" type="text" class="form-control" value="{{$user->name}}"readonly>
                            <label for="name">Nombre Usuario</label>
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="{{$cliente->celular}}"name="celular" id="celular"readonly>
                            <label for="celular">Celular</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="date" class="form-control"value="{{$cliente->fecha}}" name="fecha" id="fecha"readonly>
                            <label for="fecha">Fecha Nacimiento</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" value="{{$cliente->genero}}"name="genero" id="genero"readonly>
                            <label for="genero">Genero</label>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
<a class="btn btn-success" href="{{route('vehiculos.create')}}">Registrar vehiculo</a>
    <div class="card">
        <div class="card-header">    
            <h2 align="center">Vehiculos Registrados</h2>
        </div>
        <div class="card-body">
        <table class="table">
        <thead>
            <tr  class="table-success">
            <th scope="col">ID</th>
            <th scope="col">Matricula</th>
            <th scope="col">Marca</th>
            <th scope="col">Modelo</th>
            <th scope="col">Año</th>
            <th scope="col">Combustible</th>
            <th scope="col">Caja</th>
            <th scope="col">Color</th>
            <th scope="col">Tipo De Vehiculo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculo as $vehiculos)
                <tr>
                    <th scope="row">{{$vehiculos->id}}</th>
                    <td>{{$vehiculos->matricula}}</td>
                    <td>{{$vehiculos->marca}}</td>
                    <td>{{$vehiculos->modelo}}</td>
                    <td>{{$vehiculos->year}}</td>
                    <td>{{$vehiculos->combustible}}</td>
                    <td>{{$vehiculos->caja}}</td>
                    <td>{{$vehiculos->color}}</td>
                    <td>{{$vehiculos->tipo}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 align="center">Historial De Reservas</h2>
        </div>
        <div class="card-body">
        <table class="table">
        <thead>
            <tr  class="table-success">
            <th scope="col">ID</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Tipo</th>
            <th scope="col">Estado</th>
            <th scope="col">Matricula</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reserva as $reservas)
                <tr>
                    <th scope="row">{{$reservas->id}}</th>
                    <td>{{$reservas->fecha}}</td>
                    <td>{{$reservas->hora}}</td>
                    <td>{{$reservas->tipo}}</td>
                    <td>{{$reservas->estado}}</td>
                    @foreach($vehiculo as $vehiculos)
                        @if($reservas->vehiculo_id == $vehiculos->id)
                        <td>{{$vehiculos->matricula}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>
</div>
<br><br>
@endsection