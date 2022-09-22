@extends('layouts.layoutRemesa')

@section('content')
<a class= "buttonHome" href="{{ url('/home') }}">
<img src="{{asset('images/inicio6.png')}}" width="90" loading="lazy">
      
</a>
<section class="form-register">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<center><h4>Ingresar Nueva Remesa</h4></center>
        <form action="{{ route('remesa.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        
                <div class="col-xl-6">
                <label>Nombre de la Remesa:</label>
                <select class="controls"  name="Name" id="Name" placeholder="Seleccione">
                                
                                <option value="Remesa 1">Remesa 1</option>
                                <option value="Remesa 2">Remesa 2</option>
                                <option value="Remesa 3">Remesa 3</option>
                                <option value="Remesa 4">Remesa 4</option>
                                <option value="Remesa 5">Remesa 5</option>
                                <option value="Remesa 6">Remesa 6</option>
                                <option value="Remesa 7">Remesa 7</option>
                                <option value="Remesa 8">Remesa 8</option>
                                <option value="Remesa 9">Remesa 9</option>
                                <option value="Remesa 10">Remesa 10</option>
                                <option value="Remesa 11">Remesa 11</option>
                                <option value="Remesa 12">Remesa 12</option>
                                <option value="Remesa 13">Remesa 13</option>
                                <option value="Remesa 14">Remesa 14</option>
                                <option value="Remesa 15">Remesa 15</option>
                                <option value="Remesa 16">Remesa 16</option>
                                <option value="Remesa 17">Remesa 17</option>
                                <option value="Remesa 18">Remesa 18</option>
                                <option value="Remesa 19">Remesa 19</option>
                                
                                
                        </select>                          
                </div>

                <div class="col-xl-6">
                <label>Elija el Mes:</label>
                <select class="controls"  name="Mounth" id="Mounth" placeholder="Seleccione">
                                
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

                <div class="col-xl-6">
                <label>Elija el Año:</label>
                
                <select class="controls"  name="Annio" id="Annio" placeholder="Seleccione">
                                
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
                <label>Ingrese la Cantidad Generada:</label>
                        <input class="controls" type="number" name="Amount" id="Amount" placeholder="Ingrese la Cantidad Generada">
                        <br>    
                </div>
               <center><input class="botons" type="submit" value="Guardar Datos"></center>
        </div>      

        </form>
</section>

<br>
                    <div class="col-xl-12">
                    <center> <label style="font-size:32px; color:#000">Historial de Remesas</label> </center>
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
                                                        
                                                        <th>Remesa</th>
                                                        <th>Mes</th>
                                                        <th>Año</th>
                                                        <th>Cantidad</th>
                                                        
                                                       
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                              @foreach($remesas as $data)
                                             
                                                <tr>
                                               
                                                        <td style="font-size:12px"><center>{{$data->name_remesa}}</center></td>  
 
                                                        <td style="font-size:12px"><center>{{$data->month}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->annio}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->amount}}</center></td>  
                                                        
                                                        
                                                        <td><center>
                                                        <form
                                                            action="{{ route('remesa.destroy', $data->id) }}"
                                                            method="POST">
                                                            <a href="/remesa/{{$data->id}}/edit" class="btn2" title="Editar"><i class="fa fa-edit" ></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                onclick="return confirm('¿Seguro que quiere eliminar el registro de la remesa?')"
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
