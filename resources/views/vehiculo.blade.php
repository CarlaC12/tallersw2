<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Vehiculo en el sistema</h1>
    <table class="table table-striped table-bordered shadow-lg mt-4" id="vehiculos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Matricula</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Combustible</th>
                <th>Caja</th>
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
</body>
</html>