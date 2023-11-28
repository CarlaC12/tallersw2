@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista De Notas de ventas</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

    <br>
    <div class="card">
        <div class="card-header d-flex">
            {{-- <a class="btn btn-primary" href="{{ route('ordens.create') }}">Registrar Nota</a> --}}

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="facturas">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nit</th>
                        <th>total</th>
                        <th>Fecha</th>
                        <th>orden</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturas as $factura)
                        <tr>
                            <td>{{ $factura->id }}</td>
                            <td>{{ $factura->nit }}</td>
                            <td>{{ $factura->total }}</td>
                            <td>{{ $factura->fecha }}</td>
                            <td>{{ $factura->orden_id }}</td>
                            {{-- @foreach ($mecanico as $mecanicos)
                                @if ($ordfacturaens->mecanico_id == $mecanicos->id)
                                    <td>{{ $mecanicos->nombre }}</td>
                                @endif
                            @endforeach --}}
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('notaShow2', $factura->id) }}">Ver
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
        $('#facturas').DataTable({
            autoWidth: false
        });
    </script>
@endsection
