@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista reservas</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('reservas.create')}}">Registrar reserva</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="reservas">
            <thead>
                <tr>
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
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#reservas').DataTable({
            autoWidth:false
        });
    </script>
@endsection
