@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Órdenes De Trabajo</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <br>
    <div class="card">
        <div class="card-header d-flex">
            <a class="btn btn-primary" href="{{ route('ordens.create') }}">Registrar orden</a>
            <a target="_blank" class="ml-3 btn btn-secondary" href="{{ route('ordens.pdf') }}">Generar PDF</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="ordens">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Fecha Iniciada</th>
                        <th>Fecha Finalizada</th>
                        <th>Mecanico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orden as $ordens)
                        <tr>
                            <td>{{ $ordens->id }}</td>
                            <td>{{ $ordens->descripcion }}</td>
                            <td>{{ $ordens->estado }}</td>
                            <td>{{ $ordens->fechai }}</td>
                            <td>{{ $ordens->fechaf }}</td>
                            @foreach ($mecanico as $mecanicos)
                                @if ($ordens->mecanico_id == $mecanicos->id)
                                    <td>{{ $mecanicos->nombre }}</td>
                                @endif
                            @endforeach
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('ordens.edit', $ordens) }}">Ver
                                    Detalles</a>
                                {{-- <a class="btn btn-success btn-sm" href="{{ route('ordens.show', $ordens) }}">Ver Detalle</a> --}}
                                {{-- <form action="{{ route('ordens.destroy', $ordens) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form> --}}

                                {{-- <a href="{{route('detalle.orden.index', [$ordens])}}" class="btn btn-info btn-sm">Agregar Materiales<a> --}}
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
        $('#ordens').DataTable({
            autoWidth: false
        });
    </script>
@endsection
