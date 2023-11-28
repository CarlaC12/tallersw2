@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Datos De Orden De Trabajo</h1>
@stop

@section('content')
    <div class="card">
        <a href="{{ route('orden.pdf', $orden->id) }}" class="btn btn-info btn-sm">Generar PDF<a>
    </div>
    <form method="post" action="{{ route('ordens.update', $orden) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-4">
                <h5>Cliente:</h5>
                <input type="text" name="descripcion" value="{{ $cliente->nombre }}" class="focus form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>Matrícula vehículo:</h5>
                <input type="text" name="descripcion" value="{{ $vehiculo->matricula }}" class="focus form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>Marca vehículo:</h5>
                <input type="text" name="descripcion" value="{{ $vehiculo->marca }}" class="focus form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>modelo:</h5>
                <input type="text" name="descripcion" value="{{ $vehiculo->modelo }}" class="focus form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>año:</h5>
                <input type="text" name="descripcion" value="{{ $vehiculo->year }}" class="focus form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>Descripcion:</h5>
                <input type="text" name="descripcion" value="{{ $orden->descripcion }}" class="focus form-control">
                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <div class="form-group">
                    <h5>Estado:</h5>
                    <select name="estado" class="focus form-control">
                        <option value="{{ $orden->estado }}">{{ $orden->estado }}</option>
                        <option value="En Curso">En Curso</option>
                        <option value="Finalizado">Finalizado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <h5>Fecha Iniciada:</h5>
                <input type="date" name="fechai" value="{{ $orden->fechai }}" class="focus form-control">
                @error('fechai')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>Fecha Finalizada:</h5>
                <input type="date" name="fechaf" value="{{ $orden->fechaf }}" class="focus form-control">
                @error('fechaf')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <h5>Mecanico Encargado:</h5>
                <input type="text" name="ci" value="{{ $orden->mecanico_id }}" class="focus form-control">
                @error('ci')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-info">Guardar</button>
        <a class="btn btn-danger" href="{{ route('ordens.index') }}">Volver</a>

    </form>
    <br>


    {{-- TABLA PARA VER LOS SERVICIOS DE ESA ORDEN --}}
    <h2>Servicios a realizar</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="ordenRepuestos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nro</th>
                        <th scope="col">Servicio</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td>{{ $servicio->id }}</td>
                            {{-- <td>{{$ordenRepuesto->estado}}</td> --}}
                            <td>{{ $servicio->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- FIN TABLA SERVICIOS --}}

@stop

@section('js')
    <script>
        console.log('hola');
        var modal_body = document.getElementById('modal-body');
        var buttonAgregar = document.getElementById('agregarRepuesto');
        var buttonAgregarEdit = document.getElementById('agregarRepuestoEdit');
        // console.log(buttonAgregarEdit);



        const agregarItemRepuesto = () => {
            var div = document.createElement('div');
            div.className = 'row';
            console.log(div);
            var divNombre = document.createElement('div');
            var divPrecio = document.createElement('div');
            divNombre.className = 'col-8 mt-2';
            divPrecio.className = 'col-4 mt-2';

            console.log(divNombre);
            console.log(divPrecio);

            var inputNombre = document.createElement('input');
            inputNombre.className = 'form-control';
            inputNombre.name = 'repuestos[]';
            inputNombre.placeholder = 'Nombre Repuesto';

            var inputPrecio = document.createElement('input');
            inputPrecio.className = 'form-control';
            inputPrecio.name = 'cantidades[]';
            inputPrecio.placeholder = 'Cantidad'

            divNombre.appendChild(inputNombre);
            divPrecio.appendChild(inputPrecio);

            div.appendChild(divNombre);
            div.appendChild(divPrecio);

            modal_body.insertBefore(div, buttonAgregar);
        }

        const cargarItems = (id) => {
            var buttonAgregarEdit = document.getElementById('agregarRepuestoEdit');
            console.log(id);
            var modal_bodyEdit = document.getElementById('itemsEditId');
            modal_bodyEdit.innerHTML = '';
            fetch(`http://localhost/TallerSi2/public/api/itemsOrdenRepuesto/${id}`)
                .then(response => response.json())
                .then(data => {
                    //console.log(data);
                    data.forEach(element => {
                        console.log(element);
                        //crear los html elements mientras se itera
                        var div = document.createElement('div');
                        div.className = 'row';

                        var divNombre = document.createElement('div');
                        var divPrecio = document.createElement('div');
                        divNombre.className = 'col-8 mt-2';
                        divPrecio.className = 'col-4 mt-2';

                        var inputNombre = document.createElement('input');
                        inputNombre.className = 'form-control';
                        inputNombre.name = 'repuestos[]';
                        inputNombre.value = element['nombre'];
                        inputNombre.placeholder = 'Nombre Repuesto';

                        var inputPrecio = document.createElement('input');
                        inputPrecio.className = 'form-control';
                        inputPrecio.name = 'cantidades[]';
                        inputPrecio.placeholder = 'Cantidad'
                        inputPrecio.value = element['cantidad'];


                        divNombre.appendChild(inputNombre);
                        divPrecio.appendChild(inputPrecio);

                        div.appendChild(divNombre);
                        div.appendChild(divPrecio);

                        //modal_bodyEdit.insertBefore(div, buttonAgregarEdit);
                        modal_bodyEdit.appendChild(div);
                    });
                });


        }

        const changeEstadoOrden = (id) => {
            var url = 'http://localhost/TallerSi2/public/api/changeEstadoOrdenRepuesto';
            console.log('changeEstadoOrden');
            const valor = document.getElementById('selectEstadoOrden').value
            var data = {
                id: id,
                estado: valor
            };
            fetch(url, {
                    method: 'POST', // or 'PUT'
                    body: JSON.stringify(data), // data can be `string` or {object}!
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(res => res.json())
                .catch(error => console.error('Error:', error))
                .then(response => console.log('Success:', response));
        }
    </script>
@stop
