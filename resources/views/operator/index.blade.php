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

<center><h4>Crear Nuevo Operador</h4></center>
        <form action="{{ route('operator.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        
                <div class="col-xl-6">
                <label>Nombre del Operador:</label>
                        <input class="controls" type="text" name="Name" id="Name" placeholder="Ingrese la Nombre *">
                        <br>    
                </div>

                <div class="col-xl-6">
                <label>Codigo del Operador:</label>
                        <input class="controls" type="number" name="Code" id="Code" placeholder="Ingrese el Codigo ">                 <br>    
                </div>

                <div class="col-xl-6">
                <label>Telefono del Operador:</label>
                
                        <input class="controls" type="number" name="Phone" id="Phone" placeholder="Telefono del Operador">
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

<br>
                    <div class="col-xl-12">
                    <center> <label style="font-size:32px; color:#000">Operadores de Cortes y Reconexiones</label> </center>
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
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Codigo</th>
                                                        <th>Telefono</th>
                                                        <th>Foto de Operador</th>
                                                        
                                                       
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                        
                                                <tbody>
                                              
                                              @foreach($operators as $data)
                                                <tr>
                                                        
                                                        <td style="font-size:12px"><center>{{$data->id}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->name}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$data->code}}</center></td>
                                                        <td style="font-size:12px"><center>{{$data->phone}}</center></td>  
                                                        <td><center>
                                                        <img src="{{asset('storage/profile_pic/'.$data->photography)  }}" alt="" width="80" height="80">
                                                        <center></td>
                                                        
                                                        <td><center>
                                                        <form
                                                            action="{{ route('operator.destroy', $data->id) }}"
                                                            method="POST">
                                                            <a href="/operator/{{$data->id}}/edit" class="btn2" title="Editar"><i class="fa fa-edit" ></i></a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn1"
                                                                onclick="return confirm('¿Seguro que quiere eliminar el registro del operador?')"
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
