@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista vehiculos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">

        <form method="post" action="{{route('reportes.vehiculo.filtro')}}">
            @csrf

        <button class="btn btn-primary" type="submit">Filtrar</button>


        <select name="marca" id="marca">
            <option value="" disabled selected>Seleccione un Marca</option>
            @for ($i = 0; $i < count($marca); $i++)
                
            <option value="{{$marca[$i]}}">{{ $marca[$i]}}</option>

            @endfor
        </select>

        <select name="caja" id="caja">
            <option value="" disabled selected>Seleccione El tipo de caja</option>
            @for ($i = 0; $i < count($caja); $i++) <option value="{{$caja[$i]}}">{{ $caja[$i]}}</option>
        
                @endfor
        </select>

        <select name="combustible" id="combustible">
            <option value="" disabled selected>Seleccione el uso de combustible</option>
            @for ($i = 0; $i < count($combustible); $i++) <option value="{{$combustible[$i]}}">{{ $combustible[$i]}}</option>
        
                @endfor
        </select>
        </form>


    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="vehiculos">
            <thead>
                <tr>
                    <th >Id</th>
                    <th >Matricula</th>
                    <th >Marca</th>
                    <th >Modelo</th>
                    <th >Año</th>
                    <th >Combustible</th>
                    <th >Caja</th>
                    <th>Color</th>
                    <th>Tipo</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach ($vehiculo as $vehiculos)
                <tr>
                    <td>{{$vehiculos->id}}</td>
                    <td>{{$vehiculos->matricula}}</td>
                    <td>{{$vehiculos->marca}}</td>
                    <td>{{$vehiculos->modelo}}</td>
                    <td>{{$vehiculos->year}}</td>
                    <td>{{$vehiculos->combustible}}</td>
                    <td>{{$vehiculos->caja}}</td>
                    <td>{{$vehiculos->color}}</td>
                    <td>{{$vehiculos->tipo}}</td>
                   
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if ($flag==false)
       <a class="btn btn-primary" href="{{route('reportes.vehiculo.dowload',[$mar,$combust,$caj])}}">Descargar PDF</a> 
    @endif
    
</div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#vehiculos').DataTable({
            autoWidth:false
        });
    </script>
@endsection