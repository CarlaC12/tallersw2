@extends('adminlte::page')

@section('title', 'Respuestos')

@section('content_header')
    <h1>Lista de Respuestos de el taller</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('consultas.index') }}" class="btn btn-secondary btb-sm">inicio</a>
            {{-- <a href="{{ route('consultas.create') }}" class="btn btn-primary btb-sm">Crear</a> --}}
        </div>
        <div class="card">
            <div class="card-body">
                <!--Modal para agregar archivos -->
                <div class="jumbtron jumbotron-fluid">
                    <h3 style="text-align: center">Consultar</h3>
                    <div style="margin-bottom: 10px">
                        <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarFecha">
                            {{-- <span class="fas fa-plus-circle"></span> --}}
                            <span class="fas fa-calendar"></span>
                            Consultar
                        </span>
                    </div>


                    <div class="modal fade" id="modalAgregarFecha" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Buscar</h5>
                                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>xd
                                    </button> --}}
                                </div>

                                <div class="modal-body">

                                    <form id="frmArchivos" action="{{ route('consultas.get') }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf

                                        <label for="file">Subir imágen (Buscar)</label>
                                        <br>
                                        <input type="file" class="form-control-file" name="file"
                                            onchange="mostrarFotosSeleccionadas(event)" enctype="multipart/form-data">
                                        <div id="contenedor-fotos-preview" class="row"></div>
                                        @error('file')
                                            <small>*{{ $message }}</small>
                                            <br><br>
                                        @enderror
                                        <br>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">buscar</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">cerrar</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="procesos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">nombre</th>
                        <th scope="col">precio</th>
                        <th scope="col">cantidad</th>
                        <th scope="col">estado</th>
                        <th scope="col">imagen</th>
                    </tr>
                </thead>

                <tbody>
                    @if (isset($items))
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['nombre'] }}</td>
                                <td>{{ $item['precio'] }}</td>
                                <td>{{ $item['cantidad'] }}</td>
                                <td>{{ $item['estado'] }}</td>
                                <td><img src="{{ $item['url'] }}" alt="" class="img-thumbnail" width="200"
                                        height="200"></td>
                                {{-- <td> --}}
                                {{-- <form action="{{route('consultas.destroy', $entrada)}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('consultas.show', $entrada)}}" class="btn btn-info btn-sm">Ver Detalles<a>    
                                
                            </form> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>



@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"> --}}
@stop

@section('js')
    <script>
        function mostrarFotosSeleccionadas(event) {
            var input = event.target;
            if (input.files && input.files.length > 0) {
                var contenedorFotosPreview = document.getElementById("contenedor-fotos-preview");
                contenedorFotosPreview.innerHTML = '';

                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var imagenPreview = document.createElement("div");
                        imagenPreview.classList.add("col-md-3", "mt-3");
                        imagenPreview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail">';
                        contenedorFotosPreview.appendChild(imagenPreview);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#procesos').DataTable();
        });
    </script>
@stop
