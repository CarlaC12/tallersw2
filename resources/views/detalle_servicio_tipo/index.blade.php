@extends('layouts.app')

@section('content')
    
<div class="col s12 m12 l12 xl12">
    <div class="row"></div>
    <div class="card">
        <table class="striped" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <div class="card-panel teal  grey lighten-1 z-depth-3">This is a card panel with a teal lighten-2 class</div>
                </tr>
                <tr>
                    <div class="col s12 right-align">
                        <a href="{{route('detalle.tipo.servicios.create')}}" class="waves-effect waves-light btn-small dark-primary-color ">Registrar</a>
                                
                    </div>
                </tr>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Tipo Servicio</th>
                        <th>Nombre Servicio</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($detallesservicioTipos as $detallesservicioTipo)
                            <tr>
                                <td>{{$detallesservicioTipo->id}}</td>
                                <td>{{$detallesservicioTipo->tipoServicio->nombre}}</td>
                                <td>{{$detallesservicioTipo->servicio->nombre}}</td>
                                <td>{{'Bs. '.$detallesservicioTipo->precio}}</td>
                                
                                
                                <td>
                                    <a href="{{route('tipo.servicios.edit',[$detallesservicioTipo->id])}}">
                                        <span class="material-icons green-text">
                                            mode_edit
                                        </span>
                                    </a>
                                    <a href="{{route('tipo.servicios.destroy',[$detallesservicioTipo->id])}}">
                                        <span class="material-icons red-text">
                                            delete_outline
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection