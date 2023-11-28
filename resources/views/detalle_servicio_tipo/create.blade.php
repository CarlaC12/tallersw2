@extends('layouts.app')
@section('content')
<div class="row">
    <form method="POST" action="{{route('detalle.tipo.servicios.store')}}">
        @csrf
              
        <div class="col s12 m10 offset-m1 l6 offset-l3 xl6 offset-xl3">

            <div class="row"></div>

            <div id="panel-left" class="card">
                
                <div class="card-content">
                    
                    <div class="card-panel teal  grey lighten-1 z-depth-3">
                        <span class="card-title primary-text-color primary-text-style">
                        Formulario de Creacion
                    </span>This is a card panel with a teal lighten-2 class</div>
                    
                    <div class="row">
                        <div class="col s12 divider"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col s3 secondary-text-color">
                            <h6>Nombre de Tipo de Servicio :</h6>
                        </div>
                        
                        <div class="input-field col s9">
                            <select name="tipo_servicio_id">
                                <option value="" disabled selected>Choose your option</option>
                                @foreach($tipoServicios as $tipoServicio)
                                    <option value="{{$tipoServicio->id}}">{{ $tipoServicio->nombre}}</option>
                                @endforeach

                            </select>
                            <label>Selecccione un Tipo de Servicio:</label>
                        </div>    
                        
                        <div class="col s3 secondary-text-color">
                            <h6>Nombre de Servicio:</h6>
                        </div>

                        <div class="input-field col s9">
                            <select name="servicio_id">
                                <option value="" disabled selected>Choose your option</option>
                                @foreach($servicios as $servicio)
                                    <option value="{{$servicio->id}}">{{ $servicio->nombre}}</option>
                                @endforeach

                            </select>
                            <label>Selecccione un Servicio:</label>
                        </div>
                        
                        <div class="col s3 secondary-text-color">
                            <h6>Precio:</h6>
                        </div>

                        <div class="input-field col s9">
                            <input id="precio" type="text" class="validate" name="precio" value="{{old('precio_base')}}">
                                @error('precio')
                                    <span class="help-block red-text">{{$message}}</span>
                                @enderror
                        </div>

                                         
                      
                    </div>
                    <div class="card-action right-align">
                        <button type="submit" class="waves-effect waves-brown btn-flat red-text bold" onclick="showProgress()">Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
