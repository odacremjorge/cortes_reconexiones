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

<center><h4>Ingresar Cortes por Operador</h4></center>
        <form action="{{ route('job.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
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
                        <input class="controls" type="number" name="Amount" id="Amount" placeholder="Cantidad">
                        <br>    
                </div>

                <div class="col-xl-2">
                <label>Cortados:</label>
                        <input class="controls" type="number" name="C" id="C" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>CNP:</label>
                        <input class="controls" type="number" name="Cnp" id="Cnp" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>C/C:</label>
                        <input class="controls" type="number" name="Cc" id="Cc" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>MD:</label>
                        <input class="controls" type="number" name="Md" id="Md" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>MBLL:</label>
                        <input class="controls" type="number" name="Mbll" id="Mbll" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>IMP:</label>
                        <input class="controls" type="number" name="Imp" id="Imp" >
                        <br>    
                </div>

                <div class="col-xl-1">
                <label>IE:</label>
                        <input class="controls" type="number" name="Ie" id="Ie" >
                        <br>    
                </div>
               <center><input class="botons" type="submit" value="Guardar Datos"></center>
        </div>      

        </form>
</section>

<br>
                    <div class="col-xl-12">
                    <center> <label style="font-size:32px; color:#000">Historial de Cortes</label> </center>
                    </div>
                    <div class="col-xl-12">
                    <div class="container">
                            <div class="row-fluid" style="margin-top: 0">
                                <div class="span12">
                                    <div class="widget-box">
                                        <div class="widget-content">
                                            <table id="myTable" class="display nowrap cell-border" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Operador</th>    
                                                        <th>Remesa</th>
                                                        <th>Mes</th>
                                                        <th>Fecha</th>
                                                        <th>Cantidad</th>
                                                        <th>C</th>
                                                        <th>CNP</th>
                                                        <th>C/C</th>
                                                        <th>MD</th>
                                                        <th>MBLL</th>
                                                        <th>IMP</th>
                                                        <th>IE</th>
                                                        <th>Estado</th>
                                                        <th>%</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                                   
                                              
                                             @foreach($cortes as $data)
                                                <tr>
                                                    @php
                                                        $total=0;
                                                        $eficiencia = 0;
                                                    @endphp
                                               
                                                        <td style="font-size:12px"><center>{{$data->name}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$data->name_remesa}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$data->month}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->date_job}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->amount_job}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->c}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->cnp}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$data->cc}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$data->md}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$data->mbll}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->imp}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->ie}}</center></td>
                                                        @php
                                                        $total = $total + $data->c + $data->cnp + $data->cc+ $data->md + $data->mbll + $data->imp + $data->ie;
                                                        if ($data->amount_job != 0)
                                                            $eficiencia = round((($data->c+$data->ie)*100)/$data->amount_job);
                                                            else
                                                            $eficiencia = 1;
                                                        @endphp
                                                        <td style="font-size:12px"><center>
                                                        @if($data->amount_job == $total)
                                                        
                                                            Correcto
                                                        @else
                                                            Error
                                                        @endif
                                                        
                                                        </center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia}} %</center></td> 
                                                        <td><center>
                                                        <form
                                                            action="{{ route('job.destroy', $data->id) }}"
                                                            method="POST">
                                                            <a href="/job/{{$data->id}}/edit" class="btn2" title="Editar"><i class="fa fa-edit" ></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                onclick="return confirm('¿Seguro que quiere eliminar el registro de cortes de {{$data->name}}?')"
                                                                    title="Clic para eliminar" data-toggle="tooltip"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>                                                     
                                                    </center></td>
                                                </tr>
                                                
                                                @endforeach 
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                    </div>  
            </div>
</section>
        
@endsection
@section('js')

@endsection
