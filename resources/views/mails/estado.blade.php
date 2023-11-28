<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Orden de Trabajo</title>
</head>
<body>
    <div class="card text-center">
        <div class="card-header">
            <div>
                logo
            </div>
            <div>
                ubicacion
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Aviso de Servicios</h5>
            <div>
                {{$orden->fechai}}
            </div>
            <div>{{$orden->fechaf}}</div>
            <div>
                Estimado cliente {{$cliente->nombre}} el servicio solicitado ha finalizado, pase por nuestras oficina para recoger su vehiculo con placa {{$vehiculo->matricula}} o tambien puede solicitar una entrega de su vehiculo hasta el lugar de su agrado, para realizar dicha solicitud porfavor haga click en el boton siguiente.
            </div>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
</body>
</html>