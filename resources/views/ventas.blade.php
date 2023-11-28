<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas de servicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    
    <h2>Ventas de Servicio</h2>
    <p>Año : </p>
    <p>{{$years}}</p>
    <p>Mes</p>
    <p>{{$month}}</p>
    <table>
        <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo de Servicio</th>
                    <th scope="col">Nombre de Servicio</th>
                    <th scope="col">Total en Bs</th>
                    <th scope="col">Cantidad Repetida</th>
        
            </tr>
        </thead>
        <tbody>
            @foreach($informes as $informe)
                <tr>
        
                    <td>{{$informe->id}}</td>
                    <td>{{$informe->nombre_tipo}}</td>
                    <td>{{$informe->nombre}}</td>
                    <td>{{$informe->subtotal}}</td>
                    <td>{{$informe->cantidad}}</td>
        
                </tr>
            @endforeach
         </tbody>
        
    </table>
</body>
</html>