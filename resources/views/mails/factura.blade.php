<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Facturacion</title>
</head>
<body>
    <h1>Facturacion</h1>
    <div class="row">
        <div class="col-6">
            logo
        </div>
        <div class="col-6">
            ubicacion
        </div>
    </div>
    
    <div class="row">
    
        <dt class="col-sm-3">Nro Factura : </dt>
        <dd class="col-sm-9">{{$factura->id}}</dd>
    
        <dt class="col-sm-3">Nit : </dt>
        <dd class="col-sm-9">{{$factura->nit}}
        </dd>
    
        <dt class="col-sm-3">Fecha y Hora de emision : </dt>
        <dd class="col-sm-9">{{$factura->fecha.' '. $factura->hora}}</dd>
    
        <dt class="col-sm-3">Nro Reserva : </dt>
        <dd class="col-sm-9">{{$factura->reserva_id}}
        </dd>
    
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2>Detalle de la Facturacion</h2>
        </div>
        <div class="card-body">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del servicio</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle as $detail)
                    <tr>
                        <td>{{$detail->detalleServicio->id}}</td>
                        <td>{{$detail->detalleServicio->servicio->nombre}}</td>
    
                        <td>{{$detail->precio}}</td>
                    </tr>
                    @endforeach
                    <div class="row">
                        <div class="col-9">
                            <p class="font-weight-bold">Total a pagar</p>
                        </div>
                        <div class="col-3">
                            <p class="font-weight-bold">{{$factura->total.' Bs'}}</p>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    
    
    <p>Nota: Los precio de los servicios incluyen la mano de obra</p>
</body>
</html>