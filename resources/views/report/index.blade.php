@extends('layouts.layoutReport')

@section('content')
<a class= "buttonHome" href="{{ url('/home') }}">
<img src="{{asset('images/inicio6.png')}}" width="90" loading="lazy">
      
</a>
<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<center><h4>Escoja la Remesa y la Gestión</h4></center>
        <form action="{{ url('/show')}}" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="row">
        
               
        <div class="col-xl-6">
                <label>Elija el Año:</label>
                <select class="controls"  name="Name" id="Name" placeholder="Seleccione">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>                               
                                
                        </select>                          
                </div>

                <div class="col-xl-6">
                <label>Elija el Mes:</label>
                <select class="controls"  name="Month" id="Month" placeholder="Seleccione">
                                
                                <option value="Enero">Enero</option>
                                <option value="Febero">Febero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                              
                                
                        </select>     
                                    </div>


                
               <center><input class="botons" type="submit" value="Seleccionar"></center>
        </div>      

        </form>
</section>


        
@endsection
@section('js')

@endsection
