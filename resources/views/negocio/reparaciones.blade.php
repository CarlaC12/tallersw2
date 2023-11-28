@extends('adminlte::page')

@section('title', 'BI-Reparaciones')

@section('content_header')
@stop
@section('css')
@endsection

@section('content')
    <div class="d-flex justify-content-around py-2">
        <div class="card py-3 px-3 w-25 mr-3">
            <h4 class="lead m-0">Cantidad de reparaciones</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="cantidadOrdenes"></p>
        </div>
        <div class="card py-3 px-3 w-25 mr-3">
            <h4 class="lead m-0">Nuevos clientes</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="cantidadNuevosClientes"></p>
        </div>
        <div class="card py-3 px-3 w-25 mr-3">
            <h4 class="lead m-0">Reparaciones en curso</h4>
            <span class="text-muted"></span>
            <p class="display-4 text-center mt-3" id="cantidadOrdenEnCurso"></p>
        </div>
        <div class="card py-3 px-3 w-25">
            <h4 class="lead m-0">Media de duración por reparación</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="promedioDuracion"></p>
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
                        {{-- chart 4 --}}
                        <div class="card py-3 px-3 mh-30">
                            <div class="">
                                <h4 class="lead m-0">Tasa de reparaciones exitosas en el primer intento</h4>
                                <span class="text-muted ">últimos 3 meses</span>
                                <canvas id="chart-4"></canvas>
                            </div>
                        </div>


                    </div>
                    <div class="col">
                        {{-- chart 2 --}}
                        <div class="card py-3 px-3">
                            <div class="">
                                <h4 class="lead m-0">Promedio de duración de reparación</h4>
                                <span class="text-muted ">Por tipo de reparación</span>
                                <canvas id="chart-2"></canvas>
                            </div>
                        </div>
                        {{-- chart 5 --}}
                        <div class="card py-3 px-3">
                            <div class="">
                                <h4 class="lead m-0">Promedio de duración por reparación</h4>
                                <span class="text-muted ">Últimos 6 meses</span>
                                <canvas id="chart-5"></canvas>
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

                {{-- chart 3 --}}
                <div class="card py-3 px-3">
                    <h4 class="lead m-0">Porcentaje de Retrabajos</h4>
                    <span class="text-muted">Últimos 3 meses</span>
                    <p class="display-4 text-center mt-3">17 %</p>
                </div>
            </div>
        </div>
        <input type="text" hidden value={{ $apiURL }} id="apiURL">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const apiURL = document.getElementById('apiURL').value;

        let cantidadOrdenes = document.getElementById('cantidadOrdenes');
        let cantidadNuevosClientes = document.getElementById('cantidadNuevosClientes');
        let cantidadOrdenEnCurso = document.getElementById('cantidadOrdenEnCurso');
        let promedioDuracion = document.getElementById('promedioDuracion');

        let dataGraficos;

        const getData = async () => {
            let data;
            try {
                const res = await fetch(apiURL + "/getReparacionesData");
                data = await res.json();
                console.log(data);

            } catch (error) {
                data = dataStatic;
            }
            cantidadOrdenes.textContent = data.cantidadOrdenes;
            cantidadNuevosClientes.textContent = data.cantidadNuevosClientes;
            cantidadOrdenEnCurso.textContent = data.cantidadOrdenEnCurso;
            promedioDuracion.textContent = data.promedioDuracion.substring(0, 4);

            new Chart(chart1, {
                type: 'bar',
                data: {
                    labels: data.reparacionesMasSolicitadas.slice(0, 6).map(service => service.nombre),
                    datasets: [{
                        label: 'pedidos',
                        indexAxis: "y",
                        data: data.reparacionesMasSolicitadas.slice(0, 6).map(service => service
                            .cantidad),
                        borderWidth: 1,
                        backgroundColor: colors,
                    }]
                },
            });

            new Chart(chart2, {
                type: 'bar',
                data: {
                    labels: data.promedioDuracionServicios.slice(0, 6).map(service => service.nombre),
                    datasets: [{
                        label: 'cantidad de horas',
                        data: data.promedioDuracionServicios.slice(0, 6).map(service => service
                            .promedio_horas),
                        borderWidth: 1,
                        backgroundColor: colors,
                    }]
                },
                options: {}
            });

            new Chart(chart3, {
                type: 'doughnut',
                data: {
                    labels: data.cantidadAutosByMarca.slice(0, 6).map(auto => auto.marca),
                    datasets: [{
                        label: '# of Votes',
                        data: data.cantidadAutosByMarca.slice(0, 6).map(auto => auto
                            .cantidad),
                        borderWidth: 1,
                        backgroundColor: colors,
                    }]
                },
                options: {}
            });

            new Chart(chart4, {
                type: 'bar',
                data: {
                    labels: data.reparacionesExitosas.slice(0, 6).map(mes => mes.mes),
                    datasets: [{
                        label: '% NO rework',
                        data: data.reparacionesExitosas.slice(0, 6).map(mes => mes.no_rework * 100 /
                            mes.total),
                        borderWidth: 1,
                        backgroundColor: colors,

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(chart5, {
                type: 'line',
                data: {
                    labels: data.promedioDuracion6Meses.slice(0, 6).map(mes => mes.mes),
                    datasets: [{
                        label: '# of Votes',
                        data: data.promedioDuracion6Meses.slice(0, 6).map(mes => mes
                            .promedio_duracion.substring(0.4)),
                        borderWidth: 3,
                        borderColor: 'rgb(75, 192, 192)',

                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        console.log(apiURL);
        getData();

        const chart1 = document.getElementById('chart-1');
        const chart2 = document.getElementById('chart-2');
        const chart3 = document.getElementById('chart-3');
        const chart4 = document.getElementById('chart-4');
        const chart5 = document.getElementById('chart-5');

        const colors = [
            // 'rgb(50, 224, 196, 0.9)',
            // 'rgb(13, 115, 119, 0.9)',
            // 'rgb(5, 191, 219, 0.9)',
            // 'rgb(82, 222, 151, 0.9)',
            // 'rgb(33, 33, 33, 0.9)',
            // 'rgb(0, 255, 198, 0.9)',
            // 'rgb(57, 74, 109, 0.9)',
            // 'rgb(57, 62, 70, 0.9)',
            // 'rgb(10, 77, 104, 0.9)',
            // 'rgb(36, 120, 129, 0.9)',

            'rgb(255, 165, 0, 0.9)',
            'rgb(255, 140, 0, 0.9)',
            'rgb(255, 127, 80, 0.9)',
            'rgb(255, 69, 0, 0.9)',
            'rgb(255, 99, 71, 0.9)',
            'rgb(255, 215, 0, 0.9)',
            'rgb(255, 193, 37, 0.9)',
            'rgb(255, 179, 71, 0.9)',
            'rgb(255, 204, 51, 0.9)',
            'rgb(255, 152, 31, 0.9)'



        ]

        //por si falla la respuesta de la api
        const dataStatic = {
            cantidadOrdenes: 18,
            cantidadNuevosClientes: 1,
            cantidadOrdenEnCurso: 4,
            promedioDuracion: "21.84",
            porcentajeRework: 19.56,
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
            promedioDuracionServicios: [{
                    id: 22,
                    nombre: "Pruebas de sensores",
                    promedio_horas: "38.0000000000000000"
                },
                {
                    id: 5,
                    nombre: "Lavado del líquido de frenos, reemplazo",
                    promedio_horas: "33.6666666666666667"
                },
                {
                    id: 28,
                    nombre: "Reemplazo de rodamientos de rueda delantera",
                    promedio_horas: "32.2500000000000000"
                },
                {
                    id: 4,
                    nombre: "Revisión de la pinza de freno",
                    promedio_horas: "31.7500000000000000"
                },
                {
                    id: 23,
                    nombre: "Comprobaciones de suspensión",
                    promedio_horas: "30.7142857142857143"
                },
                {
                    id: 43,
                    nombre: "Reemplazo de puntos de automóvil (autos viejos)",
                    promedio_horas: "29.2000000000000000"
                },
            ],
            cantidadAutosByMarca: [{
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
            reparacionesExitosas: [{
                    mes: "2023-01",
                    no_rework: 12,
                    total: 13
                },
                {
                    mes: "2023-02",
                    no_rework: 12,
                    total: 14
                },
                {
                    mes: "2023-03",
                    no_rework: 6,
                    total: 9
                },
                {
                    mes: "2023-04",
                    no_rework: 10,
                    total: 12
                },
                {
                    mes: "2023-05",
                    no_rework: 11,
                    total: 16
                },
                {
                    mes: "2023-06",
                    no_rework: 11,
                    total: 17
                }
            ],
            promedioDuracion6Meses: [{
                    mes: "2022-12",
                    promedio_duracion: "25.80"
                },
                {
                    mes: "2023-01",
                    promedio_duracion: "24.38"
                },
                {
                    mes: "2023-02",
                    promedio_duracion: "25.07"
                },
                {
                    mes: "2023-03",
                    promedio_duracion: "27.11"
                },
                {
                    mes: "2023-04",
                    promedio_duracion: "16.66"
                },
                {
                    mes: "2023-05",
                    promedio_duracion: "21.50"
                },
                {
                    mes: "2023-06",
                    promedio_duracion: "20.16"
                }
            ]
        }
    </script>
@stop

@section('js')

@endsection
