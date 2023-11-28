@extends('adminlte::page')

@section('title', 'BI-Beneficios')

@section('content_header')
@stop
@section('css')
@endsection

@section('content')
    <div class="d-flex justify-content-around py-2">
        <div class="card py-3 px-3 w-50 mr-3">
            <h4 class="lead m-0">Beneficios último mes</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="beneficios">175</p>
        </div>
        <div class="card py-3 px-3 w-50 mr-3">
            <h4 class="lead m-0">Clientes recurrentes</h4>
            <span class="text-muted">%</span>
            <p class="display-4 text-center mt-3" id="porcentajeClientesRecurrentes">175</p>
        </div>
    </div>

    <div class=".container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col">
                        {{-- chart 1 --}}
                        <div class="card py-3 px-3 mh-30">
                            <div class="">
                                <h4 class="lead m-0">Ingresos</h4>
                                <span class="text-muted ">Últimos 3 meses</span>
                                <canvas id="chart-1"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        {{-- chart 2 --}}
                        <div class="card py-3 px-3">
                            <div class="">
                                <h4 class="lead m-0">promedio ARO (Dinero recibido por reparación)</h4>
                                <span class="text-muted ">Últimos 6 meses</span>
                                <canvas id="chart-2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- chart 3 --}}
                <div class="card py-3 px-3">
                    <div class="">
                        <h4 class="lead m-0">Rentabilidad</h4>
                        <span class="text-muted ">Tipo de reparación</span>
                        <canvas id="chart-3"></canvas>
                    </div>
                </div>
            </div>

        </div>
        <input type="text" hidden value={{ $apiURL }} id="apiURL">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const apiURL = document.getElementById('apiURL').value;

        let beneficios = document.getElementById('beneficios');
        let porcentajeClientesRecurrentes = document.getElementById('porcentajeClientesRecurrentes');

        const getData = async () => {
            let data;
            try {
                const res = await fetch(apiURL + "/getBeneficiosData");
                data = await res.json();
                console.log(data);
            } catch (error) {
                data = dataStatic;
            }

            beneficios.textContent = data.beneficios;
            porcentajeClientesRecurrentes.textContent = data.porcentajeClientesRecurrentes.toFixed(2);

            new Chart(chart1, {
                type: 'line',
                data: {
                    labels: data.ingresosPorMes.slice(0, 6).map(mes => mes.mes),
                    datasets: [{
                        label: 'Ingresos',
                        data: data.ingresosPorMes.slice(0, 6).map(mes => mes.ingreso_total),
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

            new Chart(chart2, {
                type: 'line',
                data: {
                    labels: data.promediosAro.slice(0, 6).map(mes => mes.mes),
                    datasets: [{
                        label: 'Ingresos',
                        data: data.promediosAro.slice(0, 6).map(mes => mes.aro_promedio),
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

            new Chart(chart3, {
                type: 'bar',
                data: {
                    labels: data.servicios.map(servicio => servicio.nombre.substring(0, 25) + "..."),
                    datasets: [{
                        label: 'Rentabilidad',
                        data: data.servicios.map(servicio => servicio.precio),
                        borderWidth: 1,
                        backgroundColor: colors,
                    }]
                },
                options: {
                    /* scales: {
                        y: {
                            beginAtZero: true
                        }
                    } */
                }
            });
        }
        getData();

        const chart1 = document.getElementById('chart-1');
        const chart2 = document.getElementById('chart-2');
        const chart3 = document.getElementById('chart-3');

        const colors = [
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
        ]

        const dataStatic = {
            beneficios: "60342",
            porcentajeClientesRecurrentes: 71.09,
            ingresosPorMes: [{
                    mes: "2023-01",
                    ingreso_total: "58558"
                },
                {
                    mes: "2023-02",
                    ingreso_total: "82121"
                },
                {
                    mes: "2023-03",
                    ingreso_total: "81944"
                },
                {
                    mes: "2023-04",
                    ingreso_total: "58443"
                },
                {
                    mes: "2023-05",
                    ingreso_total: "36775"
                },
                {
                    mes: "2023-06",
                    ingreso_total: "60342"
                }
            ],
            promediosAro: [{
                    mes: "2022-12",
                    aro_promedio: "2248.6"
                },
                {
                    mes: "2023-01",
                    aro_promedio: "2472.6153846153848"
                },
                {
                    mes: "2023-02",
                    aro_promedio: "2461.714285714286"
                },
                {
                    mes: "2023-03",
                    aro_promedio: "2772.3333333333335"
                },
                {
                    mes: "2023-04",
                    aro_promedio: "2289.1666666666665"
                },
                {
                    mes: "2023-05",
                    aro_promedio: "2724.75"
                },
                {
                    mes: "2023-06",
                    aro_promedio: "1937.75"
                }
            ],
            servicios: [{
                    id: 1,
                    nombre: "Reemplazo de pastillas de freno de disco delanteras y traseras",
                    precio: "11088"
                },
                {
                    id: 2,
                    nombre: "Reemplazo del cilindro de freno",
                    precio: "8141"
                },
                {
                    id: 3,
                    nombre: "Reemplazo o reacondicionamiento del cilindro maestro del freno",
                    precio: "13404"
                },
                {
                    id: 4,
                    nombre: "Revisión de la pinza de freno",
                    precio: "16381"
                },
                {
                    id: 5,
                    nombre: "Lavado del líquido de frenos, reemplazo",
                    precio: "5682"
                },
                {
                    id: 6,
                    nombre: "Ajuste de frenos",
                    precio: "13850"
                },
                {
                    id: 7,
                    nombre: "Reemplazo del tubo de freno",
                    precio: "12757"
                },
                {
                    id: 8,
                    nombre: "Reemplazo de zapata de freno",
                    precio: "6015"
                },
                {
                    id: 9,
                    nombre: "Reemplazo y diagnóstico del módulo ABS",
                    precio: "5440"
                },
                {
                    id: 10,
                    nombre: "Escaneo y diagnóstico de fallas de la computadora del automóvil",
                    precio: "13268"
                },
                {
                    id: 11,
                    nombre: "Reparaciones o reemplazo del motor de arranque del automóvil",
                    precio: "8526"
                },
                {
                    id: 12,
                    nombre: "Pruebas del sistema de carga del automóvil",
                    precio: "15284"
                },
                {
                    id: 13,
                    nombre: "Reemplazo del alternador",
                    precio: "11769"
                },
                {
                    id: 14,
                    nombre: "Reparaciones de cableado pequeño para automóviles",
                    precio: "9383"
                },
                {
                    id: 15,
                    nombre: "Reparaciones de ventanas eléctricas para automóviles",
                    precio: "1055"
                },
                {
                    id: 16,
                    nombre: "Reparaciones de luces delanteras y traseras de automóviles",
                    precio: "11928"
                },
                {
                    id: 17,
                    nombre: "Pruebas y reemplazo de baterías de automóviles",
                    precio: "12159"
                },
                {
                    id: 18,
                    nombre: "Prueba y reemplazo del módulo de encendido del automóvil",
                    precio: "7595"
                },
                {
                    id: 19,
                    nombre: "Reparaciones y reemplazo de inyectores de combustible con fugas",
                    precio: "19122"
                },
                {
                    id: 20,
                    nombre: "Reemplazo de la manguera de combustible",
                    precio: "14039"
                },
                {
                    id: 21,
                    nombre: "Pruebas y reemplazo de bombas de combustible",
                    precio: "4552"
                },
                {
                    id: 22,
                    nombre: "Pruebas de sensores",
                    precio: "751"
                },
                {
                    id: 23,
                    nombre: "Comprobaciones de suspensión",
                    precio: "19948"
                },
                {
                    id: 24,
                    nombre: "Reemplazo del amortiguador",
                    precio: "19186"
                },
                {
                    id: 25,
                    nombre: "Rótulas y reemplazo del extremo de la varilla de unión",
                    precio: "6236"
                },
                {
                    id: 26,
                    nombre: "Muelles de suspensión reemplazados o reiniciados",
                    precio: "7285"
                },
                {
                    id: 27,
                    nombre: "Alineación de ruedas",
                    precio: "13364"
                },
                {
                    id: 28,
                    nombre: "Reemplazo de rodamientos de rueda delantera",
                    precio: "19492"
                },
                {
                    id: 29,
                    nombre: "Reemplazo de cojinetes y sellos del eje trasero",
                    precio: "2190"
                },
                {
                    id: 30,
                    nombre: "Reemplazo de la correa de ventilación y transmisión",
                    precio: "1467"
                },
                {
                    id: 31,
                    nombre: "Pruebas y reemplazo de termoventiladores",
                    precio: "4138"
                },
                {
                    id: 32,
                    nombre: "Pruebas de fugas del sistema de enfriamiento",
                    precio: "2069"
                },
                {
                    id: 33,
                    nombre: "Pruebas y reemplazo de radiadores",
                    precio: "13143"
                },
                {
                    id: 34,
                    nombre: "Reemplazo de la bomba de agua",
                    precio: "7858"
                },
                {
                    id: 35,
                    nombre: "Manguera del radiador, reemplazo del termostato",
                    precio: "12913"
                },
                {
                    id: 36,
                    nombre: "Manguera del calentador y reemplazo del grifo del calentador",
                    precio: "13088"
                },
                {
                    id: 37,
                    nombre: "Lavado y reemplazo de refrigerante",
                    precio: "7753"
                },
                {
                    id: 38,
                    nombre: "Reacondicionamiento de la culata del coche",
                    precio: "5647"
                },
                {
                    id: 39,
                    nombre: "Pruebas de compresión",
                    precio: "18832"
                },
                {
                    id: 40,
                    nombre: "Pruebas de vacío",
                    precio: "9709"
                },
                {
                    id: 41,
                    nombre: "Comprobaciones del analizador de gases",
                    precio: "10562"
                },
                {
                    id: 42,
                    nombre: "Reparaciones de juntas y escapes del colector",
                    precio: "16975"
                },
                {
                    id: 43,
                    nombre: "Reemplazo de puntos de automóvil (autos viejos)",
                    precio: "12775"
                }
            ]
        }
    </script>
@stop

@section('js')

@endsection
