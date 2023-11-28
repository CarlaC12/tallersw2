@extends('adminlte::page')

@section('title', 'Taller')

<!-- Mensaje de éxito -->
@if (session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endif

@section('content_header')
    <h1>Cotizaciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary btb-sm">Crear Cotizacion</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                data-target="#crearCotizacionIAModal">Crear Cotizacion - IA</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="usuarios" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cotizaciones as $cotizacion)
                        <tr>
                            <td>{{ $cotizacion['id'] }}</td>
                            <td>
                                <img src="{{ $cotizacion['url'] }}" alt="..." width="150">
                            </td>
                            <td>{{ $cotizacion['precio'] }} Bs.</td>
                            <td>{{ $cotizacion['fecha'] }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $cotizacion['id']) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                        value="Borrar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Agregar al final de tu vista Blade -->
    <div class="modal fade" id="crearCotizacionIAModal" tabindex="-1" role="dialog"
        aria-labelledby="crearCotizacionIAModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearCotizacionIAModalLabel">Crear Cotizacion - IA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí colocarás tu formulario para subir la imagen -->
                    <form id="imagenForm" action="{{ route('cotizaciones.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="imagen">Seleccionar Imagen:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*"
                                required>
                            <input type="text" name="type" value="1" hidden>
                        </div>
                        <!-- Otros campos del formulario si es necesario -->
                        <button type="submit" class="btn btn-primary">Subir Imagen</button>
                    </form>
                </div>
            </div>
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
            $('#usuarios').DataTable();
        });
    </script>
@stop
