@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logCard.css') }}">
@endsection
@section('body')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container">
        <div class="card">
            <div class="card-header" >
                <h1 align="center">BIENVENIDO</h1>
            </div>
            <div class="card-body" align="center">
                <div class="row" >
                    <div class="col-6">
                        <h1 align="center">Iniciar Sesion</h1>
                        <br>
                        <div class="form-floating">
                        <input id="name "type="name" name="name" placeholder="Ingrese Su Nombre De Usuario" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name">Nombre De Usuario</label>
                        </div>
                        <br><br>
                        <div class="form-floating">
                        <input id="password" type="password" placeholder="Ingrese Su Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="name">Contraseña</label>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-success">Ingresar</button>
                        <br><br>
                        No Tienes Cuenta? <a href="{{route('frontends.create')}}">Registrate</a>
                    </div>

                    <div class="col-6">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner sm">
                                <div class="carousel-item active">
                                    <img src="https://desvarelas24horas.com/media/clients/william-mayorga-mecanico-fuel-injection-desvare-suzuki.jpg" class="rounded w-100" height="500" alt="">
                                </div>
                                {{-- <div class="carousel-item">
                                    <img src="https://autolab.com.co/wp-content/uploads/2021/09/sede_AUTOCOLORS.jpeg" class="rounded w-100" height="500"alt="">
                                </div>
                                <div class="carousel-item ">
                                    <img src="https://autolab.com.co/wp-content/uploads/2021/04/villacars-convertida.jpeg" class="rounded w-100" height="500"alt="">
                                </div> --}}
                            </div>
                            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </form>
@endsection
