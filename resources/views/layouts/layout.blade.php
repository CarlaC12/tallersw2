<!DOCTYPE html>
<html lang="en">

<head>
    <title>AutoSuzuki</title>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img
                    {{-- src="https://autolab.com.co/wp-content/themes/autolab_theme/graphics/autolab_logo_horizontal.png" --}}
                    src="https://mecanicoadomicilio.site/wp-content/uploads/2022/09/mecanicos-a-domicilio-para-autos-marca-suzuki.jpg"
                    alt="" width="150" height="35"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('frontends.index') }}">Home</a>
                    </li>
                    {{-- @can('gestionar cotizacion')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('cotizacion.servicio.shop') }}">Servicios</a>
                        </li>
                    @endcan --}}

                    @hasanyrole('mecanico|admin')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('ordens.index') }}">Orden Trabajo</a>
                        </li>
                    @else
                    @endhasanyrole



                    @can('Reserva')
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Reservar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('domicilios.create') }}">Domicilio</a></li>
                                <li><a class="dropdown-item" href="#">Taller</a></li>
                                <!-- <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                    @endcan
                    @can('Perfil')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('domicilios.index') }}">Perfil</a>
                        </li>
                    @endcan
                    @can('Dashboard')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('clientes.index') }}">Dashboard</a>
                        </li>
                    @endcan
                    @can('Sesion')
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endcan
                    <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
                </ul>
                <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
            </div>
        </div>
    </nav>
    @yield('body')
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    </script>
    @yield('js')
</body>

</html>
