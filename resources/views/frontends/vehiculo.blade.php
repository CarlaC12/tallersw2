@extends('layouts.layout')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Registro De Vehiculos</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('vehiculos.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="matricula" id="matricula">
                                <label for="matricula">Matricula</label>
                            </div>
                            <br>

                            <div class="form-floating">
                                <input type="text" class="form-control" name="marca" id="marca">
                                <label for="marca">Marca</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="modelo" id="modelo">
                                <label for="modelo">Modelo</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="year" id="year">
                                <label for="year">Año</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="ci" id="ci">
                                <label for="year">Ci del cliente</label>
                            </div>
                            <br>
                            <button class="btn btn-success" type="submit">Registrar</button>
                            <a class="btn btn-danger" href="{{ route('domicilios.index') }}">Volver</a>
                        </div>
                        <div class="col-6">
                            <br>
                            <div class="form-floating">
                                <select name="combustible" class="form-control">
                                    <option value="Gasolina">Gasolina</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Gas">Gas</option>
                                </select>
                                <label for="combustible">Combustible</label>
                            </div>
                            <br>

                            <div class="form-floating">
                                <select name="caja" class="form-control">
                                    <option value="Mecanica">Mecanica</option>
                                    <option value="Automatica">Automatica</option>
                                </select>
                                <label for="caja">Caja</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="color" id="color">
                                <label for="color">Color</label>
                            </div>
                            <br>
                            <div class="form-floating">
                                <select name="tipo" class="form-control">
                                    <option value="Automovil">Automovil</option>
                                    <option value="Motocicleta">Motocicleta</option>
                                    <option value="Autobus">Autobus</option>
                                    <option value="Camion">Camion</option>
                                    <option value="Micro">Micro</option>
                                </select>
                                <label for="tipo">Tipo</label>
                            </div>

                            <br>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
