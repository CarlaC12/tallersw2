@extends('layouts.layout')

@section('body')
        <div class="content">
            <h1>Taller Mecanico & Automotriz<br><span>AutoLab</span></h1>
            <p class="par">
            La red de talleres más grande, con personal capacitado de fábrica y tecnología de punta. <br>
            Cuidamos tu vehículo porque es parte de tu familia, y también de la nuestra. <br>
            Localice Su Sucursal. <br> 
            Financiación Disponible. <br>
            Reserva Online.
            </p>
            <button class="cn"><a href="#">INGRESAR</a></button>
            
            <div class="form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Login Here</h2>
                    @error('name')
                        <!-- <span class="invalid-feedback" role="alert">
                            <h5>Nombre De Usuario o Contraseña Incorrecto</h5>
                        </span> -->
                        <h4>Usuario o Contraseña Incorrecto</h4>
                    @enderror
                    <div class="form-group row">
                    
                        <div class="col-md-6">
                        <input id="name "type="name" name="name" placeholder="Ingrese Su Nombre De Usuario" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                        </div>
                    </div>
                    
                    <div class="form-group row">
                
                        <div class="col-md-6">
                            <input id="password" type="password" placeholder="Ingrese Su Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <!-- @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <h5>Nombre De Usuario o Contraseña Incorrecto</h5>
                                </span>
                                <h5>Nombre De Usuario o Contraseña Incorrecto</h5>
                            @enderror -->
                        </div>
                    </div>
                    <button class="btnn" type="submit"><a href="{{route('frontends.index')}}">Login</a></button>
                    <p class="link">¿No tiene una cuenta?<br>
                    <a href="{{route('frontends.create')}}">Regristese Aqui!</a> </p>
                    <p class="liw">log in with</p>
                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>
                </form>
            </div>
        </div>
@endsection