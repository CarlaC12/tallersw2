@extends('layouts.layout')
@section('css')
@endsection

@section('body')

<form method="POST" action="{{ route('frontends.store') }}">
@csrf
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 align="center">Ingrese sus Datos</h1>
            </div>
            <div class="card-body">
                <div class="row" >
                    <div class="col-6">
                        <br>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="email">
                            <label for="email">Correo Electronico</label>
                        </div>
                        <br>
                        <div class="form-floating">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">Nombre Usuario</label>
                        </div>
                        <br>
                        <div class="form-floating">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="password">Contraseña</label>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-success">Registrarse</button>
                        <br><br>
                        Ya Tienes Una Cuenta? <a href="{{route('login')}}">Inicia Sesion</a>
                    </div>
                    <div class="col-6">
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="ci" id="ci">
                            <label for="ci">Carnet De Identidad</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="nombre" id="nombre">
                            <label for="nombre">Nombre Completo</label>
                        </div>
                        
                        <br>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="celular" id="celular">
                            <label for="celular">Celular</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="date" class="form-control" name="fecha" id="fecha">
                            <label for="fecha">Fecha Nacimiento</label>
                        </div>
                        <br>
                        <div class="form-floating">
                        <select name="genero" id="genero" class="form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                            <label for="genero">Genero</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
@endsection