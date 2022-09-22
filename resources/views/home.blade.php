@extends('layouts.appHome')

@section('content')
<div style="margin-left:100px;" class="container">
    <div class="row">

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-blue order-card">
          <div class="card-block">
            <a href="{{ url('/operator') }}">
            <img src="{{asset('images/operador.png')}}" width="100" loading="lazy">
              Crear Operador
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green order-card">
          <div class="card-block">
            <a href="{{ url('/remesa') }}">
            <img src="{{asset('images/agregar.png')}}" width="100" loading="lazy">
              Agregar Remesa
              
            
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-yellow order-card">
          <div class="card-block">
            <a href="{{ url('/job') }}">
            <img src="{{asset('images/trabajo.png')}}" width="100" loading="lazy">
              Agregar Cortes
            
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-pink order-card">
          <div class="card-block">
            <a href="#">
            <img src="{{asset('images/reco.png')}}" width="100" loading="lazy">
              Agregar Reconexiones
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-blue2 order-card">
          <div class="card-block">
            <a href="{{ url('/report') }}">
            <img src="{{asset('images/informe.png')}}" width="100" loading="lazy">
              Generar Informes
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xl-4">
        <div class="card bg-c-green2 order-card">
          <div class="card-block">
            <a href="#">
            <img src="{{asset('images/obrero.png')}}" width="100" loading="lazy">
              % Eficiencia
            </a>
            <br>
            <h2 class="text-right"><i class="fas fa-eye f-left"></i></h2>
            <br>
          </div>
        </div>
      </div>

    </div>
</div>
@endsection
