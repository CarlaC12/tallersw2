<!DOCTYPE html>
<html lang="en">
<head>
    <title>AutoSuzuki</title>
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <div class="main">
        <div class="navbar">            
            <div class="icon">
                <!-- <h2 class="logo">Imcruz</h2> -->
                <a class="logo" href="#">
                    <!-- <img src="https://autolab.com.co/wp-content/themes/autolab_theme/graphics/autolab_logo_horizontal.png" alt="" width="200" height="50"> -->
                    <img src="https://mecanicoadomicilio.site/wp-content/uploads/2022/09/mecanicos-a-domicilio-para-autos-marca-suzuki.jpg" alt="" width="200" height="50">
                </a>
            </div>  
            <div class="menu">                
                <ul>
                    <li><a href="{{route('frontends.index')}}">INICIO</a></li>
                    <li><a href="#">SERVICIOS</a></li>
                    <li><a href="#">NUESTRAS SEDES</a></li>
                    <li><a href="#">COMO FUNCIONA?</a></li>
                    <li><a href="#">BLOG</a></li>
                </ul>
            </div>
        </div>             
        @yield('body')
    </div> 
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    
    @yield('js')
</body>
</html>