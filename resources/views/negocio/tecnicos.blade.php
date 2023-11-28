@extends('adminlte::page')

@section('title', 'BI-Tecnicos')

@section('content_header')
@stop
@section('css')
@endsection

@section('content')
    <div class="d-flex justify-content-around py-2">
        <div class="card py-3 px-3 w-50 mr-3">
            <h4 class="lead m-0">Promedio de ingreso por técnico</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="mediaIngresosPromedio"></p>
        </div>
        <div class="card py-3 px-3 w-50 mr-3">
            <h4 class="lead m-0">Tasa de eficiencia</h4>
            <span class="text-muted">Último mes</span>
            <p class="display-4 text-center mt-3" id="promedioTasaEficiencia"> %</p>
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
                                <h4 class="lead m-0">Tiempo promedio de reparación por cada técnico</h4>
                                <span class="text-muted ">Últimos 6 meses</span>
                                <canvas id="chart-1"></canvas>
                            </div>
                        </div>
                        {{-- chart 3 --}}
                        <div class="card py-3 px-3 mh-30">
                            <div class="">
                                <h4 class="lead m-0">Cantidad de reparaciones realizadas por cada técnico</h4>
                                <span class="text-muted ">Último mes</span>
                                <canvas id="chart-3"></canvas>
                            </div>
                        </div>


                    </div>
                    <div class="col">
                        {{-- chart 2 --}}
                        <div class="card py-3 px-3">
                            <div class="">
                                <h4 class="lead m-0">Tasa de utilización por mecánico</h4>
                                <span class="text-muted ">Por mecánico</span>
                                <canvas id="chart-2"></canvas>
                            </div>
                        </div>
                        {{-- chart 4 --}}
                        <div class="card py-3 px-3">
                            <div class="">
                                <h4 class="lead m-0">Promedio de duración por reparación</h4>
                                <span class="text-muted ">Últimos 6 meses</span>
                                <canvas id="chart-4"></canvas>
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

        let mediaIngresosPromedio = document.getElementById('mediaIngresosPromedio');
        let promedioTasaEficiencia = document.getElementById('promedioTasaEficiencia');

        const getData = async () => {
            let data;
            try {
                const res = await fetch(apiURL + "/getTecnicosData");
                data = await res.json();
                console.log(data);

            } catch (error) {
                data = dataStatic;
            }

            mediaIngresosPromedio.textContent = data.mediaIngresosPromedio.toFixed(1);
            promedioTasaEficiencia.textContent = data.promedioTasaEficiencia.toFixed(1);

            new Chart(chart1, {
                type: 'line',
                data: {
                    labels: ['2023-01', '2023-02', '2023-03', '2023-04', '2023-05', '2023-06'],
                    datasets: data.tiempoPromedioReparacion.map((mecanico, i) => {
                        return {
                            label: mecanico.nombre,
                            indexAxis: "x",
                            data: tiempoPromedioReparación[i],
                            borderWidth: 2,
                            borderColor: colors[i],
                        }
                    })

                }
            });

            new Chart(chart2, {
                type: 'bar',
                data: {
                    labels: data.tasaUtilizacion.map(mecanico => mecanico.nombre),
                    datasets: [{
                        label: 'cantidad de horas',
                        data: tasasUtilizacion,
                        borderWidth: 1,
                        backgroundColor: colors,
                    }]
                },
                options: {}
            });

            new Chart(chart3, {
                type: 'bar',
                data: {
                    labels: data.cantidadReparaciones.map(mecanico => mecanico.nombre),
                    datasets: [{
                        label: '# of Votes',
                        data: cantidadesReparaciones,
                        borderWidth: 1,
                        backgroundColor: colors,
                    }]
                },
                options: {}
            });

            new Chart(chart4, {
                type: 'line',
                data: {
                    labels: ['2023-01', '2023-02', '2023-03', '2023-04', '2023-05', '2023-06'],
                    datasets: data.ingresoPorTecnico.map((mecanico, i) => {
                        return {
                            label: mecanico.nombre,
                            indexAxis: "x",
                            data: ingresosPorTecnico[i],
                            borderWidth: 2,
                            borderColor: colors[i],
                        }
                    })
                }
            });
        }
        getData();

        const chart1 = document.getElementById('chart-1');
        const chart2 = document.getElementById('chart-2');
        const chart3 = document.getElementById('chart-3');
        const chart4 = document.getElementById('chart-4');

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

        const tiempoPromedioReparación = [
            [15, 12, 16, 10, 14, 20],
            [10, 18, 16, 11, 15, 19],
            [9, 14, 18, 11, 16, 10],
            [12, 15, 8, 14, 16, 10],
            [10, 8, 15, 10, 14, 10],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],

            /* [11, 9, 15, 15, 10, 15],
            [14, 15, 16, 12, 14, 13],
            [16, 16, 15, 14, 12, 11] */
        ]
        const tasasUtilizacion = [90, 85, 80, 88, 79, 0, 0, 0];
        const cantidadesReparaciones = [20, 15, 10, 18, 19, 0, 0, 0];
        const ingresosPorTecnico = [
            [15748, 13572, 14987, 17284, 15369, 10548, 11432],
            [12478, 14789, 11478, 15265, 17156, 13456, 15478],
            [14812, 17423, 15489, 12556, 15489, 14156, 17589],
            [11314, 12459, 13459, 14156, 13265, 12456, 11456],
            [13471, 15123, 12456, 11415, 15123, 12878, 13456],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            /* [15479, 13145, 15489, 12456, 10458, 11456, 13456],
            [16235, 11572, 13987, 16284, 15369, 13548, 10432],
            [11698, 9572, 14987, 11284, 16369, 10548, 13432],
            [10258, 10572, 12987, 16284, 11369, 11548, 16432] */
        ]

        const dataStatic = {
            mediaIngresosPromedio: 2540.070138928559,
            promedioTasaEficiencia: 268.5204525012151,
            tiempoPromedioReparacion: [{
                    id: 1,
                    ci: "5957082",
                    nombre: "Marcos Alonso",
                    email: "marcos0@narod.ru",
                    fecha: "2022-07-15",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "76541773",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 2,
                    ci: "8540149",
                    nombre: "Julian Alvarez",
                    email: "julian@list-manage.com",
                    fecha: "2023-03-21",
                    especialidad: "mecanico",
                    genero: "M",
                    celular: "79697319",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 3,
                    ci: "555139",
                    nombre: "Rodrigo Fernandez",
                    email: "rodrigo@aboutads.info",
                    fecha: "2023-05-14",
                    especialidad: "hidraulico",
                    genero: "F",
                    celular: "73797793",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 4,
                    ci: "6004975",
                    nombre: "Henrry Vaca",
                    email: "henrry@indiegogo.com",
                    fecha: "2022-08-28",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "74425419",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 5,
                    ci: "3460304",
                    nombre: "Felix Alvarez",
                    email: "felix@cnn.com",
                    fecha: "2023-06-17",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "73499239",
                    created_at: null,
                    updated_at: null
                }
            ],
            tasaUtilizacion: [{
                    id: 1,
                    ci: "5957082",
                    nombre: "Marcos Alonso",
                    email: "marcos0@narod.ru",
                    fecha: "2022-07-15",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "76541773",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 2,
                    ci: "8540149",
                    nombre: "Julian Alvarez",
                    email: "julian@list-manage.com",
                    fecha: "2023-03-21",
                    especialidad: "mecanico",
                    genero: "M",
                    celular: "79697319",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 3,
                    ci: "555139",
                    nombre: "Rodrigo Fernandez",
                    email: "rodrigo@aboutads.info",
                    fecha: "2023-05-14",
                    especialidad: "hidraulico",
                    genero: "F",
                    celular: "73797793",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 4,
                    ci: "6004975",
                    nombre: "Henrry Vaca",
                    email: "henrry@indiegogo.com",
                    fecha: "2022-08-28",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "74425419",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 5,
                    ci: "3460304",
                    nombre: "Felix Alvarez",
                    email: "felix@cnn.com",
                    fecha: "2023-06-17",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "73499239",
                    created_at: null,
                    updated_at: null
                }
            ],
            cantidadReparaciones: [{
                    id: 1,
                    ci: "5957082",
                    nombre: "Marcos Alonso",
                    email: "marcos0@narod.ru",
                    fecha: "2022-07-15",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "76541773",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 2,
                    ci: "8540149",
                    nombre: "Julian Alvarez",
                    email: "julian@list-manage.com",
                    fecha: "2023-03-21",
                    especialidad: "mecanico",
                    genero: "M",
                    celular: "79697319",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 3,
                    ci: "555139",
                    nombre: "Rodrigo Fernandez",
                    email: "rodrigo@aboutads.info",
                    fecha: "2023-05-14",
                    especialidad: "hidraulico",
                    genero: "F",
                    celular: "73797793",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 4,
                    ci: "6004975",
                    nombre: "Henrry Vaca",
                    email: "henrry@indiegogo.com",
                    fecha: "2022-08-28",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "74425419",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 5,
                    ci: "3460304",
                    nombre: "Felix Alvarez",
                    email: "felix@cnn.com",
                    fecha: "2023-06-17",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "73499239",
                    created_at: null,
                    updated_at: null
                }
            ],
            ingresoPorTecnico: [{
                    id: 1,
                    ci: "5957082",
                    nombre: "Marcos Alonso",
                    email: "marcos0@narod.ru",
                    fecha: "2022-07-15",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "76541773",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 2,
                    ci: "8540149",
                    nombre: "Julian Alvarez",
                    email: "julian@list-manage.com",
                    fecha: "2023-03-21",
                    especialidad: "mecanico",
                    genero: "M",
                    celular: "79697319",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 3,
                    ci: "555139",
                    nombre: "Rodrigo Fernandez",
                    email: "rodrigo@aboutads.info",
                    fecha: "2023-05-14",
                    especialidad: "hidraulico",
                    genero: "F",
                    celular: "73797793",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 4,
                    ci: "6004975",
                    nombre: "Henrry Vaca",
                    email: "henrry@indiegogo.com",
                    fecha: "2022-08-28",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "74425419",
                    created_at: null,
                    updated_at: null
                },
                {
                    id: 5,
                    ci: "3460304",
                    nombre: "Felix Alvarez",
                    email: "felix@cnn.com",
                    fecha: "2023-06-17",
                    especialidad: "hidraulico",
                    genero: "M",
                    celular: "73499239",
                    created_at: null,
                    updated_at: null
                }
            ]
        }
    </script>
@stop

@section('js')

@endsection
