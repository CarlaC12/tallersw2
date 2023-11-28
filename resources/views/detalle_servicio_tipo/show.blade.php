@extends('adminlte::page')

@section('title', 'Taller')

@section('content_header')
{{-- <h1>Nuestros Servicios</h1> --}}
@stop

@section('content')
<div class="card">
</div>

<div class="card">
    
    <div class="card-body">
        <h3 class="text">Nuestros Servicios</h3>
        <a href="{{route('cotizacion.serticio.index')}}">Ver Cotizacion</a>

            @foreach ($tipos as $tipo)
            <h5 class="fs-5 mt-2">
                {{$tipo->nombre}}
            </h5>
            <div class="row row-cols-1 row-cols-md-4 g-3">

                    @foreach ($tipo->detallesServicioTipo as $detalle)
                        <div class="col">
                            
                            <div class="card h-100 mt-1">

                                <div class="card-body">
                                    
                                    <img src="{{asset('storage/utils/not_img.jpg')}}" class="card-img-top" alt="...">
                                    
                                    <p class="fs-5 pt-2 mb-0">{{$detalle->servicio->nombre}}
                                        
                                    </p>
                                    <p class="fs-6 mb-0">{{$detalle->precio.' Bs'}}</p>
                                    <div class="text-center mt-2">
                                    <form action="{{route('cotizacion.store',$detalle)}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info center btn-sm pr-4 pl-4">
                                            Añadir
                                        </button>
                                
                                    </form>    

                                    </div>
                                </div>

                            </div>
                        </div>
                        
                            
                    @endforeach
                </div>    
            @endforeach
          
    
        
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#materiales').DataTable();
        } );

@stop