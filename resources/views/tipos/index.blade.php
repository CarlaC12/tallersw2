@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista tipos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-primary" href="{{route('tipos.create')}}">Registrar tipo</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="tipos">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Nombres</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipo as $tipos)
                <tr>
                    <td>{{$tipos->id}}</td>
                    <td>{{$tipos->nombre}}</td>
                    
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('tipos.edit',$tipos)}}">Editar</a>
                        <form action="{{route('tipos.destroy',$tipos)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
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
        $('#tipos').DataTable({
            autoWidth:false
        });
    </script>
@endsection