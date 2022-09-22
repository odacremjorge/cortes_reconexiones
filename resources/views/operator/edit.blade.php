@extends('layouts.layoutOperator')

@section('content')
<a class= "buttonHome" href="{{ url('/home') }}">
<img src="{{asset('images/inicio6.png')}}" width="90" loading="lazy">
      
</a>
<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<center><h4>Actualizar Datos del Operador</h4></center>
        <form action="{{ route('operator.update', $operator->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        
                <div class="col-xl-6">
                <label>Nombre del Operador:</label>
                        <input class="controls" type="text" value= "{{$operator->name}}" name="Name" id="Name" placeholder="Ingrese la Nombre *">
                        <br>    
                </div>

                <div class="col-xl-6">
                <label>Codigo del Operador:</label>
                        <input class="controls" type="number" value= "{{$operator->code}}" name="Code" id="Code" placeholder="Ingrese el Codigo ">                 <br>    
                </div>

                <div class="col-xl-6">
                <label>Telefono del Operador:</label>
                
                        <input class="controls" type="number" value= "{{$operator->phone}}" name="Phone" id="Phone" placeholder="Telefono del Operador">
                        <br>    
                </div>

                <div class="col-xl-6">
                <label>Fotografia del Operador:</label>
                        <input class="controls" type="file" name="Photography" id="Photography" placeholder="Ingrese Fotografia">
                        <br>    
                </div>
               <center><input class="botons" type="submit" value="Guardar Datos"></center>
        </div>      

        </form>
</section>
@endsection
@section('js')

@endsection