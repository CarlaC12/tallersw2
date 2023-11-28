@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop
@section('content')
    <div class="card">
        {{-- <div class="card-header">
            <h2>Reserva</h2>
        </div> --}}
        <div class="card-body">
            <form method="post" action="{{ route('ordens.store') }}">
                @csrf
                {{-- <div class="row">
            <div class="col-6">
            <h5>Fecha:</h5>
            <input type="text"  name="fecha" value="{{$reserva->fecha}}" class="focus border-primary  form-control"readonly>
            <h5>Hora:</h5>
            <input type="text"  name="hora" value="{{$reserva->hora}}" class="focus border-primary  form-control"readonly>                    
            </div>
            <div class="col-6">
            <h5>Tipo:</h5>
            <input type="text"  name="tipo" value="{{$reserva->tipo}}" class="focus border-primary  form-control"readonly>        
            <h5>Estado:</h5>
            <input type="text"  name="estado" value="{{$reserva->estado}}" class="focus border-primary  form-control"readonly>        
            </div>
        </div> --}}

                <br>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h2>Registrar Orden De Trabajo</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('ordens.store') }}">
                @csrf

                <h5>Descripcion:</h5>
                <input type="text" name="descripcion" class="focus border-primary  form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <h5>Estado:</h5>
                    <select name="estado" class="focus border-primary  form-control">
                        <option value="En Proceso">En Proceso</option>
                        <option value="Finalizado">Finalizado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
                <h5>Fecha Iniciada:</h5>
                <input type="date" name="fechai" class="focus border-primary  form-control"
                    value="{{ old('fecha') ?? date('Y-m-d') }}">
                @error('fechai')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


                <h5>Fecha Finalizada:</h5>
                <input type="date" name="fechaf" class="focus border-primary  form-control"
                    value="{{ old('fecha') ?? date('Y-m-d') }}">
                @error('fechaf')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                {{-- <h5>CI del Mecanico Responsable:</h5>
                <input type="text" name="ci" class="focus border-primary  form-control">
                @error('ci')
                    <span class="text-danger">{{ $message }}</span>
                @enderror --}}
                <h5>Matrícula:</h5>
                <input type="text" name="matricula" class="focus border-primary form-control" value="926DT9">
                @error('matricula')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>
                <h5>Mecánico encargado</h5>
                <select name="mecanico" id="mecanico" class="form-control">
                    @foreach ($mecanicos as $mecanico)
                        <option value={{ $mecanico->id }}>{{ $mecanico->nombre }}</option>
                    @endforeach
                </select>

                <h3>Seleccionar Servicios:</h3>
                @error('servicios')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="container" style="height: 300px; overflow-y: scroll; border: 2px solid black;">
                    @foreach ($servicios as $servicio)
                        <div class="form-check">
                            <input class="form-check-input form-check-lg" type="checkbox" id="{{ $servicio->id }}"
                                value="{{ $servicio->id }}" name="servicios[]" onclick="agregarServicio()">
                            <label  class="form-check-label " for="{{ $servicio->id }}"><span class="checkmark"></span>{{ $servicio->nombre }}</label>                            
                            <hr>
                        </div>
                    @endforeach
                </div>
                
                <div id="servicios_select" style="display: none;">                    
                    <h2 >Sevicios seleccionados:</h2>
                    <div class="container" style="border: 2px solid black; padding-top: 5px; margin-bottom: 20px">
                        <div id="servicios-agregados"></div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Registrar</button>
                <a class="btn btn-danger" href="{{ route('ordens.index') }}">Volver</a>
            </form>
        </div>
    </div>
    <script>
        function agregarServicio() {
            let checkboxes = document.querySelectorAll('input[name="servicios[]"]');
            let serviciosAgregadosDiv = document.getElementById("servicios-agregados");
            serviciosAgregadosDiv.innerHTML = '';
            
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    let servicioNombre = checkbox.nextElementSibling.textContent;
                    let servicioDiv = document.createElement("div");
                    servicioDiv.classList.add("alert", "alert-dark");
                    servicioDiv.innerHTML = servicioNombre;
                    serviciosAgregadosDiv.appendChild(servicioDiv);
                }
            });
            
            let servicios_select = document.getElementById("servicios_select");
            const algunoSeleccionado = Array.prototype.some.call(checkboxes, checkbox => checkbox.checked);
            if (algunoSeleccionado ) {
                servicios_select.style.display = "block";
            } else {
                servicios_select.style.display = "none";
            }
        }
    </script>
@stop
