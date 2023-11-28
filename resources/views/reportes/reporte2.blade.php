@extends('adminlte::page')

@section('title', 'BI-Reportes')

@section('content_header')
@stop
@section('css')
@endsection

@section('content')
    <div class="d-flex justify-content-around py-2">
        <div class="card py-3 px-3 w-50 mr-3">
            <h4 class="lead m-0">Ingreso</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="beneficioTotal"></p>
            <i class="fas fa-money-bill-alt fa-2x"></i>
        </div>
        <div class="card py-3 px-3 w-50 mr-3">
            <h4 class="lead m-0">Porcentaje Recurrente de Cliente</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="porClientRecurrentes"></p>
            <i class="fas fa-percent fa-2x"></i>

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
                                <h4 class="lead m-0">Ingreso por mes</h4>

                                <canvas id="chart-1"></canvas>
                            </div>
                        </div>


                    </div>
                    <div class="col">
                        {{-- chart 2 --}}
                        <div class="card py-3 px-3">
                            <div class="">
                                <h4 class="lead m-0">Repuestos más Solicitados</h4>
                                <span class="text-muted ">Por mecánico</span>
                                <canvas id="chart-2"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input type="text" hidden value={{ $apiURL }} id="apiURL">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const apiURL = document.getElementById('apiURL').value;
        console.log(apiURL);
        let porClientRecurrentes = document.getElementById('porClientRecurrentes');
        let beneficioTotal = document.getElementById('beneficioTotal');

        const getData = async () => {
            let data;
            try {
                const res = await fetch(apiURL + "/getReportes2");
                data = await res.json();
                console.log(data);

            } catch (error) {
                data = dataStatic;
            }

            porClientRecurrentes.textContent = data.porClientRecurrentes;
            beneficioTotal.textContent = data.beneficioTotal;


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
                type: 'bar',
                data: {
                    labels: data.repuestosMasSolicitados.map(repuestos => repuestos.nombre),
                    datasets: [{
                        label: 'cantidad',
                        data: data.repuestosMasSolicitados.map(repuestos => repuestos.cantidad),
                        borderWidth: 1,
                        backgroundColor: colors2,
                    }]
                },
                options: {}
            });


        }
        getData();

        const chart1 = document.getElementById('chart-1');
        const chart2 = document.getElementById('chart-2');

        const colors = [
            'rgb(255, 99, 132, 0.9)',
            'rgb(255, 159, 64, 0.9)',
            'rgb(255, 205, 86, 0.9)',
            'rgb(75, 192, 192, 0.9)',
            'rgb(54, 162, 235, 0.9)',
            'rgb(153, 102, 255, 0.9)',
            'rgb(255, 99, 132, 0.9)',
            'rgb(255, 159, 64, 0.9)',
            'rgb(255, 205, 86, 0.9)',
            'rgb(75, 192, 192, 0.9)',
        ]


        const colors2 = [
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
        ]



        const dataStatic = {
            porClientRecurrentes: '26%',
            beneficioTotal: "60342",
            repuestosMasSolicitados: [{
                    id: 1,
                    nombre: "bomba de agua",
                    cantidad: 10
                },
                {
                    id: 2,
                    nombre: "pastilla de fre",
                    cantidad: 10
                },
                {
                    id: 3,
                    nombre: "motor de arranque",
                    cantidad: 7
                },
                {
                    id: 4,
                    nombre: "bomba de agua",
                    cantidad: 10

                },
                {
                    id: 5,
                    nombre: "liquido",
                    cantidad: 6
                },
                {
                    id: 6,
                    nombre: "sensores de freno",
                    cantidad: 6
                },
                {
                    id: 7,
                    nombre: "Diesel",
                    cantidad: 6
                },
                {
                    id: 8,
                    nombre: "amortiguador",
                    cantidad: 5
                }


            ],
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
            ]

        }
    </script>
@stop

@section('js')

@endsection
