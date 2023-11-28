@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar nueva Salida</h1>
@stop

@section('content')
    <form action="{{ route('salidas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="hora">Ingrese la hora de salida</label>
        <input type="time" name="hora" class="form-control" placeholder="">
        @error('hora')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
        <br>

        <label for="fecha">Ingrese la fecha</label>
        <input type="date" name="fecha" class="form-control" placeholder="">
        @error('fecha')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
        <br>

        {{-- <label for="tipo">Seleccione el tip</label>
        <select name="tipo" id="" class="form-control">
            <option value=1>Entrada</option>
            <option value=2>Salida</option>
        </select> --}}

        <label for="descripcion">Ingrese una descripcion (Opcional)</label>
        <input type="text" name="descripcion" class="form-control">
        @error('descripcion')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
        <br>

        <label for="file">Subir imágenes (Opcional)</label>
        <br>
        <input type="file" class="form-control-file" name="file" multiple onchange="mostrarFotosSeleccionadas(event)">
        <div id="contenedor-fotos-preview" class="row"></div>
        @error('file')
            <small>*{{ $message }}</small>
            <br><br>
        @enderror
        <br>
        <br>

        <input type="number" value=2 name="tipo" hidden>

        <div class="card">
            <span>Imágenes:</span>

        </div>

        <button class="btn btn-danger btn-sm" type="submit">Registrar Salida</button>
    </form>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
