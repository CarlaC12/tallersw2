@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Detalle de Orden de Trabajo</h1>
@stop
@section('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

@endsection

@section('content')

<div class="card">
    <h5 class="card-header">Orden de Trabajo {{$ordenTrabajo->id}}</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Fecha Inicio</h6>
                    </li>
                    <li class="list-inline-item">
                        {{$ordenTrabajo->fechai}}
                    </li>
                </ul>

            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <h6>Fecha Final</h6>
                    </li>
                    <li class="list-inline-item">
                        {{$ordenTrabajo->fechaf}}
                    </li>
                </ul>
                
            </div>
        </div>
        
    </div>
</div>

<div class="card">
<div class="card-header">
    <h5>Materiales</h5>
        
        <button type="button" class="btn btn-primary"     data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Agregar Material
        </button>
        
    </div>
    <div class="card-body">
        
        

        @include('detalle_orden.create_modal')

        <table class="table table-striped table-bordered shadow-lg mt-4" id="clientes">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre Material</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalles as $detalle)
                <tr>
                    <td>{{$detalle->id}}</td>
                    <td>{{$detalle->materiales->nombre}}</td>
                    <td>{{$detalle->cantidad. ' Unidades'}}</td>
                    <td>
                        <div class="row">
                            <div class="col-2">

                                <button href="#" type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modal{{$detalle->id}}">
                                    <i class="bi-pencil" style="font-size: 1.2rem; color: cornflowerblue;"></i>
                                </button>
                                
                                @include('detalle_orden.edit_modal')
                            </div>

                            <div class="col-2">

                                <form action="{{route('detalle.orden.destroy',[$ordenTrabajo,$detalle->id])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link">
                                        <i class="bi-trash" style="font-size: 1.2rem; color: rgb(237, 100, 100);"></i>
                                    </button>
                                </form>
                                
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
</div>
@stop

@section('js')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

@endsection