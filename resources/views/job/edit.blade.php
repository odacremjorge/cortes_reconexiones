@extends('layouts.layoutJob')

@section('content')
<a class= "buttonHome" href="{{ url('/home') }}">
<img src="{{asset('images/inicio6.png')}}" width="90" loading="lazy">
      
</a>
<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<center><h4>Actualizar Cortes por Operador</h4></center>
        <form action="{{ route('job.update', $job->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        
                <div class="col-xl-4">
                <label>Elija al Operador:</label>
                <select class="controls"  name="Operator" id="Operator" placeholder="Seleccione">
                                @foreach($operators as $record)
                                <option value="{{$record->id}}">{{$record->name}} | {{$record->code}}</option>  
                                @endforeach                           
                                
                        </select>                          
                </div>

                <div class="col-xl-4">
                <label>Elija el Remesa:</label>
                <select class="controls"  name="Remesa" id="Remesa" placeholder="Seleccione">
                                @foreach($remesas as $data)
                                <option value="{{$data->id}}">{{$data->name_remesa}} | {{$data->month}} | {{$data->annio}}</option>  
                                @endforeach          
                                
                                
                        </select>     
                                    </div>

                <div class="col-xl-4">
                <label>Fecha:</label>
                
                <input class="controls" type="date" name="Date" id="Date" placeholder="Ingrese la Fecha">
                        <br>  
                </div>

                <div class="col-xl-4">
                <label>Cantidad Entregada:</label>
                        <input class="controls" type="number" value= "{{$job->amount_job}}" name="Amount" id="Amount" placeholder="Cantidad">
                        <br>    
                </div>

                <div class="col-xl-2">
                <label>Cortados:</label>
                        <input class="controls" type="number" value= "{{$job->c}}" name="C" id="C" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>CNP:</label>
                        <input class="controls" type="number" value= "{{$job->cnp}}" name="Cnp" id="Cnp" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>C/C:</label>
                        <input class="controls" type="number" value= "{{$job->cc}}" name="Cc" id="Cc" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>MD:</label>
                        <input class="controls" type="number" value= "{{$job->md}}" name="Md" id="Md" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>MBLL:</label>
                        <input class="controls" type="number" value= "{{$job->mbll}}" name="Mbll" id="Mbll" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>IMP:</label>
                        <input class="controls" type="number" value= "{{$job->imp}}" name="Imp" id="Imp" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>IE:</label>
                        <input class="controls" type="number" value= "{{$job->ie}}" name="Ie" id="Ie" >
                        <br>    
                </div>
               <center><input class="botons" type="submit" value="Guardar Datos"></center>
        </div>      

        </form>
</section>
@endsection
@section('js')

@endsection