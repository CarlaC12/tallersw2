@extends('adminlte::page')

@section('title', 'BI-Reportes')

@section('content_header')
@stop
@section('css')
@endsection

@section('content')
    <div class="d-flex justify-content-around py-2">
         {{-- cantidad total de ordenes --}}
        <div class="card py-3 px-3 w-25 mr-3 ">
            <h4 class="lead m-0 font-weight-bold  ">Cantidad Total Ordenes</h4>
            <p class="display-4 text-center mt-3" id="cantOrdenTotal"></p>
            <i class="fas fa-tools fa-2x "></i>
        </div>
         {{-- cantidad nuevos cliente --}}
        <div class="card py-3 px-3 w-25 mr-3">
            <h4 class="lead m-0 font-weight-bold">Clientes Registrado último Mes</h4>
            <p class="display-4 text-center mt-3" id="cantNewClientes"></p>
            <i class="fas fa-user-plus fa-2x"></i>
        </div>
        {{-- cantidad total de usuarios --}}
        <div class="card py-3 px-3 w-25 mr-3">
            <h4 class="lead m-0 font-weight-bold">Usuario Registrado</h4>
            <span class="text-muted"></span>
            <p class="display-4 text-center mt-3" id="canTotalUsers"></p>
            <i class="fas fa-wrench fa-2x "></i>
        </div>
            {{-- cantidad total de vwhiculo --}}
         <div class="card py-3 px-3 w-25">
            <h4 class="lead m-0 font-weight-bold" >Vehiculos Registrados Ultimo Mes</h4>
            <p class="display-4 text-center mt-3" id="canTotalVehiculos"></p>
            <i class="fas fa-tools fa-2x "></i>
        </div> 
    </div>

    <div class=".container-fluid ">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col">
                        {{-- chart 1 --}}
                         <div class="card py-3 px-3 mh-30">
                            <div class="">
                                <h4 class="lead m-0">Reparaciones mas solicitadas</h4>
                                <span class="text-muted ">Por servicio</span>
                                <canvas id="chart-1"></canvas>
                            </div>
                        </div> 
                       
                    </div>
                    
                </div>
            </div>

            <div class="col-3">
                {{-- chart 3 --}}

                <div class="card py-3 px-3">
                    <div>
                        <h4 class="lead m-0">Autos que llegan al taller</h4>
                        <span class="text-muted ">Por marca de auto</span>
                        <div class="d-flex justify-content-center">
                            <canvas id="chart-3"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card py-3 px-3 w-100">
                    <h4 class="lead m-0 font-weight-bold" >Ordenes Mensual</h4>
                    <p class="display-4 text-center mt-3" id="cantOrdenMes"></p>
                    <i class="fas fa-tools fa-2x "></i>
                </div> 
                
            </div>
            
        </div>
        <input type="text" hidden value={{ $apiURL }} id="apiURL">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const apiURL = document.getElementById('apiURL').value;
        console.log(apiURL);

        let cantOrdenTotal = document.getElementById('cantOrdenTotal');
        let cantNewClientes = document.getElementById('cantNewClientes');
        let cantOrdenMes = document.getElementById('cantOrdenMes');
        let canTotalUsers = document.getElementById('canTotalUsers');
        let canTotalVehiculos = document.getElementById('canTotalVehiculos');
       
      

        let dataGraficos;

        const getData = async () => {
            let data;
            try {
                const res = await fetch(apiURL + "/getReportes");
                data = await res.json();
                console.log(data);

            } catch (error) {
                data = dataStatic;
            }
        
            cantOrdenTotal.textContent = data.cantOrdenTotal;
            cantOrdenMes.textContent = data.cantOrdenMes;
            cantNewClientes.textContent = data.cantNewClientes;
            canTotalVehiculos.textContent = data.canTotalVehiculos;
            canTotalUsers.textContent = data.canTotalUsers;
            

             new Chart(chart1, {
                 type: 'bar',
              data: {
                 labels: data.reparacionesMasSolicitadas.slice(0, 10).map(service => service.nombre),
                 datasets: [{
                     label: 'pedidos',
                     indexAxis: "y",
                        data: data.reparacionesMasSolicitadas.slice(0, 10).map(service => service
                         .cantidad),
                   borderWidth: 1,
                    backgroundColor: colors,
                     }]
              },
          });

    
            new Chart(chart3, {
                type: 'doughnut',
                data: {
                    labels: data.cantAutosByMarca.slice(0, 12).map(auto => auto.marca),
                    datasets: [{
                        label: 'cantidad',
                        data: data.cantAutosByMarca.slice(0, 12).map(auto => auto
                            .cantidad),
                        borderWidth: 1,
                        backgroundColor: colors1,
                    }]
                },
                options: {}
            });

           
        }
        console.log(apiURL);
        getData();

        const chart1 = document.getElementById('chart-1');
        const chart3 = document.getElementById('chart-3');

        const colors = [
          
            'rgb(0, 128, 255, 0.9)', // Azul
            'rgb(0, 166, 153, 0.9)', // Verde azulado
            'rgb(128, 128, 128, 0.9)', // Gris
            'rgb(51, 51, 153, 0.9)', // Azul oscuro
            'rgb(77, 77, 77, 0.9)', // Gris oscuro
            'rgb(0, 102, 102, 0.9)', // Verde oscuro
            'rgb(153, 51, 51, 0.9)', // Rojo oscuro
            'rgb(0, 102, 204, 0.9)', // Azul claro
            'rgb(51, 102, 0, 0.9)', // Verde oliva
            'rgb(204, 102, 0, 0.9)',

        ];
          const colors1=[
              'rgb(50, 224, 196, 0.9)',
             'rgb(13, 115, 119, 0.9)',
            'rgb(5, 191, 219, 0.9)',
              'rgb(82, 222, 151, 0.9)',
             'rgb(33, 33, 33, 0.9)',
             'rgb(0, 255, 198, 0.9)',
             'rgb(57, 74, 109, 0.9)',
             'rgb(57, 62, 70, 0.9)',
             'rgb(10, 77, 104, 0.9)',
             'rgb(36, 120, 129, 0.9)',   
          ];
        //por si falla la respuesta de la api
        const dataStatic = {
            cantOrdenTotal: 150,
            cantOrdenMes: 4,
            cantNewClientes: 3,
            canTotalVehiculos: 200,
            canTotalUsers:5,
            reparacionesMasSolicitadas: [{
                    id: 24,
                    nombre: "Reemplazo del amortiguador",
                    cantidad: 9
                },
                {
                    id: 6,
                    nombre: "Ajuste de frenos",
                    cantidad: 9
                },
                {
                    id: 10,
                    nombre: "Escaneo y diagnóstico de fallas de la computadora del automóvil",
                    cantidad: 8
                },
                {
                    id: 30,
                    nombre: "Reemplazo de la correa de ventilación y transmisión",
                    cantidad: 8
                },
                {
                    id: 17,
                    nombre: "Pruebas y reemplazo de baterías de automóviles",
                    cantidad: 7
                },
                {
                    id: 23,
                    nombre: "Comprobaciones de suspensión",
                    cantidad: 7
                },
            ],
            
            cantAutosByMarca: [{
                    marca: "Ford",
                    cantidad: 13
                },
                {
                    marca: "Toyota",
                    cantidad: 11
                },
                {
                    marca: "Chevrolet",
                    cantidad: 10
                },
                {
                    marca: "Dodge",
                    cantidad: 10
                },
                {
                    marca: "BMW",
                    cantidad: 9
                },
                {
                    marca: "Mitsubishi",
                    cantidad: 7
                },
            ],
         
           
        }
    </script>
@stop

@section('js')

@endsection
