<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    {{-- TABLA PARA VER LAS ORDENES DE REPUESTOS --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="ordenRepuestos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nro</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Orden</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($ordenesRepuestos as $ordenRepuesto)
                        <tr>
                            <td>{{$ordenRepuesto->id}}</td>
                            <td>
                                    @if ($ordenRepuesto->estado == 'entregado')
                                        <p>Entregado</p>
                                    @else
                                        <p>Pendiente</p>
                                    @endif
                            </td>
                            <td>{{$ordenRepuesto->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- FIN TABLA DE ORDENES DE REPUESTOS --}} 
    {{-- <input class="row" type="text" value="{{$orden->id}}"> --}}
        <div class="row">
            <div class="col-4">
                <p>Cliente:</p>
                <input type="text" name="descripcion" value="{{$cliente->nombre}}" >
            </div>
            <div class="col-4">
                <p>Matrícula vehículo: </p>
                <input type="text"  name="descripcion" value="{{$vehiculo->matricula}}" >
            </div>
            <div class="col-4">
                <p>Marca vehículo</p>
                <input type="text"  name="descripcion" value="{{$vehiculo->marca}}" >
            </div>
            <div class="col-4">
                <p>modelo</p>
                <input type="text"  name="descripcion" value="{{$vehiculo->modelo}}" >
            </div>
            <div class="col-4">
                <p>año: </p>
                <input type="text"  name="descripcion" value="{{$vehiculo->year}}" >
            </div>
            <div class="col-4">
                <p>Descripcion</p>
                <input type="text"  name="descripcion" value="{{$orden->descripcion}}" >
            </div>
            <div class="col-4">
                <p>Estado</p>
                <input type="text"  value="{{$orden->estado}}">
            </div>
        </div>
    
        <div class="row">
            <div class="col-4">
                <p>Fecha iniciada</p>
                <input type="date"  name="fechai" value="{{$orden->fechai}}" class="focus ">
            </div>
            <div class="col-4">
                <p>Fecha finalizada</p>
                <input type="date"  name="fechaf" value="{{$orden->fechaf}}" class="focus ">
            </div>
            <div class="col-4">
                <p>Ci del mecánico encargado</p>
                <input type="text"  name="ci" value="{{$orden->mecanico_id}}" class="focus">
            </div>
        </div>
    
    
</body>
</html>