@extends('layouts.layout')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('body')
<form method="post" action="{{route('domicilios.store')}}" >
@csrf
    <div class="container">
    <div class="card">
    <div class="card-header">
            <h1>Registrar Reserva</h1>
    </div>
    <div class="row" id="fila">
      <div class="col-6"> 
          <div id="map">
          </div>
      </div>
      <div class="col-6"> 
            <div class="card-body">
                <br>
                <div class="form-floating">
                <input type="date" class="form-control" min="2021-06-29" name="fecha" id="fecha" >
                <label for="fecha">Fecha Reserva</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="time" class="form-control" name="hora"id="hora" >
                    <label for="hora">Hora Reserva</label>
                    </div>
                <br>
                <div class="form-floating">
                    <input type="text" class="form-control" name="latitud"id="latitud" readonly>
                    <label for="latitud">Latitud</label>
                    </div>
                <br>
                <div class="form-floating">
                <input type="text" class="form-control" name="longitud"id="longitud" readonly>
                    <label for="longitud">Longitud</label>
                </div> 
                <br>          
                <div class="form-floating">
                    <select name="matricula"  class="focus border-primary  form-control">
                        @foreach($vehiculo as $vehiculos)
                            <option value="{{$vehiculos->id}}">{{$vehiculos->matricula}}</option>
                        @endforeach
                    </select>
                    <label for="matricula">Matricula</label>
                </div>
                <br>
                <!-- <div class="form-check">
                    <div class="form row">
                        @foreach ($servicio as $servicios)
                        <div class="form-group col-md-3">                        
                            <input type="checkbox" value="{{$servicios->id}}" name="servicio[]"       
                                    class="form-check-input"> {{$servicios->nombre}} <br>                                 
                        </div>
                        @endforeach
                    </div>
                </div> -->
                <button  class="btn btn-primary" type="submit">Registrar</button>
            </div>
        </div>
      </div>
      <br><br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($servicio as $servicios)
        <div class="col">
        <div class="card h-100">
        <img src="{{$servicios->url}}" class="card-img-top" width="200" height="300" alt="...">
        <div class="card-body">            
            <h5 class="card-title"> <input type="checkbox" value="{{$servicios->id}}" name="servicio[]"class="form-check-input">{{$servicios->nombre}}</h5>
            <p class="card-text">{{$servicios->descripcion}}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Precio: {{$servicios->precio}} Bs.</small>
        </div>
        </div>
        </div>
    @endforeach
    </div>
    <br>
</div>
</div>
</form> 
@endsection
@section('js')
  <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxph9T1koe4cRoEUGVAgFgvDFhqpgFYCU&callback=initMap">
  </script>
  <script src="{{asset('js/app2.js')}}"></script>
@endsection