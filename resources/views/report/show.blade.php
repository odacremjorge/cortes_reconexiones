@extends('layouts.layoutReport')

@section('content')
<a class= "buttonHome" href="{{ url('/home') }}">
<img src="{{asset('images/inicio6.png')}}" width="90" loading="lazy">
      
</a>

<!--<a class= "buttonA" href="{{ url('/report/showPDF') }}" target="_blank">
        PDF Informe
</a>-->

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="col-xl-12">
                    <center> <label style="font-size:32px; color:#fff">Historial de Cortes Mes de {{$mes}}</label> </center>
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
                                                        <th>Fecha</th>
                                                        <th>Cantidad</th>
                                                        <th>C</th>
                                                        <th>CNP</th>
                                                        <th>C/C</th>
                                                        <th>MD</th>
                                                        <th>MBLL</th>
                                                        <th>IMP</th>
                                                        <th>IE</th>
                                                        <th>Total</th>
                                                        <th>%</th>
                                                        
                                                    </tr>
                                                </thead>
                        
                                                <tbody>

                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC1=0;
                                                        $totalCNP1=0;
                                                        $totalCC1=0;
                                                        $totalMD1=0;
                                                        $totalMBLL1=0;
                                                        $totalIMP1=0;
                                                        $totalIE1=0;
                                                        $cant1=0;
                                                        $fecha1='';
                                                        $eficiencia1 = 0;
                                                        $total1 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 1'){
                                                                $totalC1 =$totalC1 + $record->c;
                                                                $cant1 = $cant1 + $record->amount_job;
                                                                $totalCNP1 = $totalCNP1 + $record->cnp;
                                                                $totalMD1 = $totalMD1 + $record->md;
                                                                $totalCC1 = $totalCC1 + $record->cc;
                                                                $totalMBLL1 = $totalMBLL1 + $record->mbll;
                                                                $totalIMP1 = $totalIMP1 + $record->imp;
                                                                $totalIE1 = $totalIE1 + $record->ie;
                                                                $fecha1=$record->date_job;
                                                                if ($cant1 != 0){
                                                                    $eficiencia1 = round((($totalC1+$totalIE1)*100)/$cant1);}
                                                                    else{
                                                                    $eficiencia1 = 0;}
                                                                    $total1 = $totalC1+$totalCNP1+$totalCC1+$totalMD1+$totalMBLL1+$totalIMP1+$totalIE1;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC1=0;
                                                    $totalCNP1 = 0;
                                                    $totalCC1 = 0;
                                                    $totalMD1 = 0;
                                                    $totalMBLL1 = 0;
                                                    $totalIMP1 = 0;
                                                    $totalIE1 = 0;
                                                    $cant1=0;
                                                    $fecha1='';
                                                  
                                                    $eficiencia1=0;
                                                    $total1 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC1=0;
                                                    $totalCNP1 = 0;
                                                    $totalCC1 = 0;
                                                    $totalMD1 = 0;
                                                    $totalMBLL1 = 0;
                                                    $totalIMP1 = 0;
                                                    $totalIE1 = 0;
                                                    $cant1=0;
                                                    $fecha1='';
                                                  
                                                    $eficiencia1=0;
                                                    $total1 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 1</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha1}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant1}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC1}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP1}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC1}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD1}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL1}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP1}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE1}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total1}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia1}} %</center></td> 
                                                      
                                                </tr>
                                                   
                                             
                                             @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                             @php
                                                        $total2=0;
                                                        $totalCNP=0;
                                                        $totalCC=0;
                                                        $totalMD=0;
                                                        $totalMBLL=0;
                                                        $totalIMP=0;
                                                        $totalIE=0;
                                                        $cant2=0;
                                                        $fecha2='';
                                                        $eficiencia = 0;
                                                        $total = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 2'){
                                                                $total2 =$total2 + $record->c;
                                                                $cant2 = $cant2 + $record->amount_job;
                                                                $totalCNP = $totalCNP + $record->cnp;
                                                                $totalMD = $totalMD + $record->md;
                                                                $totalCC = $totalCC + $record->cc;
                                                                $totalMBLL = $totalMBLL + $record->mbll;
                                                                $totalIMP = $totalIMP + $record->imp;
                                                                $totalIE = $totalIE + $record->ie;
                                                                $fecha2=$record->date_job;
                                                                if ($cant2 != 0){
                                                                    $eficiencia = round((($total2+$totalIE)*100)/$cant2);}
                                                                    else{
                                                                    $eficiencia = 0;}
                                                                    $total = $total2+$totalCNP+$totalCC+$totalMD+$totalMBLL+$totalIMP+$totalIE;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $total2=0;
                                                    $totalCNP = 0;
                                                    $totalCC = 0;
                                                    $totalMD = 0;
                                                    $totalMBLL = 0;
                                                    $totalIMP = 0;
                                                    $totalIE = 0;
                                                    $cant2=0;
                                                    $fecha2='';
                                                  
                                                    $eficiencia=0;
                                                    $total = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $total2=0;
                                                    $totalCNP = 0;
                                                    $totalCC = 0;
                                                    $totalMD = 0;
                                                    $totalMBLL = 0;
                                                    $totalIMP = 0;
                                                    $totalIE = 0;
                                                    $cant2=0;
                                                    $fecha2='';
                                                  
                                                    $eficiencia=0;
                                                    $total = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 2</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha2}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant2}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$total2}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia}} %</center></td> 
                                                      
                                                </tr>


                                            

                                            @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC3=0;
                                                        $totalCNP3=0;
                                                        $totalCC3=0;
                                                        $totalMD3=0;
                                                        $totalMBLL3=0;
                                                        $totalIMP3=0;
                                                        $totalIE3=0;
                                                        $cant3=0;
                                                        $fecha3='';
                                                        $eficiencia3 = 0;
                                                        $total3 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 3'){
                                                                $totalC3 =$totalC3 + $record->c;
                                                                $cant3 = $cant3 + $record->amount_job;
                                                                $totalCNP3 = $totalCNP3 + $record->cnp;
                                                                $totalMD3 = $totalMD3 + $record->md;
                                                                $totalCC3 = $totalCC3 + $record->cc;
                                                                $totalMBLL3 = $totalMBLL3 + $record->mbll;
                                                                $totalIMP3 = $totalIMP3 + $record->imp;
                                                                $totalIE3 = $totalIE3 + $record->ie;
                                                                $fecha3=$record->date_job;
                                                                if ($cant3 != 0){
                                                                    $eficiencia3 = round((($totalC3+$totalIE3)*100)/$cant3);}
                                                                    else{
                                                                    $eficiencia3 = 0;}
                                                                    $total3 = $totalC3+$totalCNP3+$totalCC3+$totalMD3+$totalMBLL3+$totalIMP3+$totalIE3;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC3=0;
                                                    $totalCNP3 = 0;
                                                    $totalCC3 = 0;
                                                    $totalMD3 = 0;
                                                    $totalMBLL3 = 0;
                                                    $totalIMP3 = 0;
                                                    $totalIE3 = 0;
                                                    $cant3=0;
                                                    $fecha3='';
                                                  
                                                    $eficiencia3=0;
                                                    $total3 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC3=0;
                                                    $totalCNP3 = 0;
                                                    $totalCC3 = 0;
                                                    $totalMD3 = 0;
                                                    $totalMBLL3 = 0;
                                                    $totalIMP3 = 0;
                                                    $totalIE3 = 0;
                                                    $cant3=0;
                                                    $fecha3='';
                                                  
                                                    $eficiencia3=0;
                                                    $total3 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 3</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha3}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant3}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC3}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP3}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC3}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD3}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL3}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP3}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE3}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total3}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia3}} %</center></td> 
                                                      
                                                </tr>
                                            
                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC4=0;
                                                        $totalCNP4=0;
                                                        $totalCC4=0;
                                                        $totalMD4=0;
                                                        $totalMBLL4=0;
                                                        $totalIMP4=0;
                                                        $totalIE4=0;
                                                        $cant4=0;
                                                        $fecha4='';
                                                        $eficiencia4 = 0;
                                                        $total4 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 4'){
                                                                $totalC4 =$totalC4 + $record->c;
                                                                $cant4 = $cant4 + $record->amount_job;
                                                                $totalCNP4 = $totalCNP4 + $record->cnp;
                                                                $totalMD4 = $totalMD4 + $record->md;
                                                                $totalCC4 = $totalCC4 + $record->cc;
                                                                $totalMBLL4 = $totalMBLL4 + $record->mbll;
                                                                $totalIMP4 = $totalIMP4 + $record->imp;
                                                                $totalIE4 = $totalIE4 + $record->ie;
                                                                $fecha4=$record->date_job;
                                                                if ($cant4 != 0){
                                                                    $eficiencia4 = round((($totalC4+$totalIE4)*100)/$cant4);}
                                                                    else{
                                                                    $eficiencia4 = 0;}
                                                                    $total4 = $totalC4+$totalCNP4+$totalCC4+$totalMD4+$totalMBLL4+$totalIMP4+$totalIE4;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC4=0;
                                                    $totalCNP4 = 0;
                                                    $totalCC4 = 0;
                                                    $totalMD4 = 0;
                                                    $totalMBLL4 = 0;
                                                    $totalIMP4 = 0;
                                                    $totalIE4 = 0;
                                                    $cant4=0;
                                                    $fecha4='';
                                                  
                                                    $eficiencia4=0;
                                                    $total4 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC4=0;
                                                    $totalCNP4 = 0;
                                                    $totalCC4 = 0;
                                                    $totalMD4 = 0;
                                                    $totalMBLL4 = 0;
                                                    $totalIMP4 = 0;
                                                    $totalIE4 = 0;
                                                    $cant4=0;
                                                    $fecha4='';
                                                  
                                                    $eficiencia4=0;
                                                    $total4 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 4</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha4}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant4}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC4}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP4}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC4}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD4}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL4}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP4}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE4}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total4}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia4}} %</center></td> 
                                                      
                                                </tr>

                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC5=0;
                                                        $totalCNP5=0;
                                                        $totalCC5=0;
                                                        $totalMD5=0;
                                                        $totalMBLL5=0;
                                                        $totalIMP5=0;
                                                        $totalIE5=0;
                                                        $cant5=0;
                                                        $fecha5='';
                                                        $eficiencia5 = 0;
                                                        $total5 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 5'){
                                                                $totalC5 =$totalC5 + $record->c;
                                                                $cant5 = $cant5 + $record->amount_job;
                                                                $totalCNP5 = $totalCNP5 + $record->cnp;
                                                                $totalMD5 = $totalMD5 + $record->md;
                                                                $totalCC5 = $totalCC5 + $record->cc;
                                                                $totalMBLL5 = $totalMBLL5 + $record->mbll;
                                                                $totalIMP5 = $totalIMP5 + $record->imp;
                                                                $totalIE5 = $totalIE5 + $record->ie;
                                                                $fecha5=$record->date_job;
                                                                if ($cant5 != 0){
                                                                    $eficiencia5 = round((($totalC5+$totalIE5)*100)/$cant5);}
                                                                    else{
                                                                    $eficiencia5 = 0;}
                                                                    $total5 = $totalC5+$totalCNP5+$totalCC5+$totalMD5+$totalMBLL5+$totalIMP5+$totalIE5;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC5=0;
                                                    $totalCNP5 = 0;
                                                    $totalCC5 = 0;
                                                    $totalMD5 = 0;
                                                    $totalMBLL5 = 0;
                                                    $totalIMP5 = 0;
                                                    $totalIE5 = 0;
                                                    $cant5=0;
                                                    $fecha5='';
                                                  
                                                    $eficiencia5=0;
                                                    $total5 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC5=0;
                                                    $totalCNP5 = 0;
                                                    $totalCC5 = 0;
                                                    $totalMD5 = 0;
                                                    $totalMBLL5 = 0;
                                                    $totalIMP5 = 0;
                                                    $totalIE5 = 0;
                                                    $cant5=0;
                                                    $fecha5='';
                                                  
                                                    $eficiencia5=0;
                                                    $total5 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 5</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha5}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant5}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC5}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP5}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC5}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD5}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL5}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP5}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE5}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total5}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia5}} %</center></td> 
                                                      
                                                </tr>

                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC6=0;
                                                        $totalCNP6=0;
                                                        $totalCC6=0;
                                                        $totalMD6=0;
                                                        $totalMBLL6=0;
                                                        $totalIMP6=0;
                                                        $totalIE6=0;
                                                        $cant6=0;
                                                        $fecha6='';
                                                        $eficiencia6 = 0;
                                                        $total6 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 6'){
                                                                $totalC6 =$totalC6 + $record->c;
                                                                $cant6 = $cant6 + $record->amount_job;
                                                                $totalCNP6 = $totalCNP6 + $record->cnp;
                                                                $totalMD6 = $totalMD6 + $record->md;
                                                                $totalCC6 = $totalCC6 + $record->cc;
                                                                $totalMBLL6 = $totalMBLL6 + $record->mbll;
                                                                $totalIMP6 = $totalIMP6 + $record->imp;
                                                                $totalIE6 = $totalIE6 + $record->ie;
                                                                $fecha6=$record->date_job;
                                                                if ($cant6 != 0){
                                                                    $eficiencia6 = round((($totalC6+$totalIE6)*100)/$cant6);}
                                                                    else{
                                                                    $eficiencia6 = 0;}
                                                                    $total6 = $totalC6+$totalCNP6+$totalCC6+$totalMD6+$totalMBLL6+$totalIMP6+$totalIE6;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC6=0;
                                                    $totalCNP6 = 0;
                                                    $totalCC6 = 0;
                                                    $totalMD6 = 0;
                                                    $totalMBLL6 = 0;
                                                    $totalIMP6 = 0;
                                                    $totalIE6 = 0;
                                                    $cant6=0;
                                                    $fecha6='';
                                                  
                                                    $eficiencia6=0;
                                                    $total6 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC6=0;
                                                    $totalCNP6 = 0;
                                                    $totalCC6 = 0;
                                                    $totalMD6 = 0;
                                                    $totalMBLL6 = 0;
                                                    $totalIMP6 = 0;
                                                    $totalIE6 = 0;
                                                    $cant6=0;
                                                    $fecha6='';
                                                  
                                                    $eficiencia6=0;
                                                    $total6 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 6</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha6}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant6}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC6}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP6}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC6}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD6}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL6}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP6}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE6}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total6}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia6}} %</center></td> 
                                                      
                                                </tr>

                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC7=0;
                                                        $totalCNP7=0;
                                                        $totalCC7=0;
                                                        $totalMD7=0;
                                                        $totalMBLL7=0;
                                                        $totalIMP7=0;
                                                        $totalIE7=0;
                                                        $cant7=0;
                                                        $fecha7='';
                                                        $eficiencia7 = 0;
                                                        $total7 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 7'){
                                                                $totalC7 =$totalC7 + $record->c;
                                                                $cant7 = $cant7 + $record->amount_job;
                                                                $totalCNP7 = $totalCNP7 + $record->cnp;
                                                                $totalMD7 = $totalMD7 + $record->md;
                                                                $totalCC7 = $totalCC7 + $record->cc;
                                                                $totalMBLL7 = $totalMBLL7 + $record->mbll;
                                                                $totalIMP7 = $totalIMP7 + $record->imp;
                                                                $totalIE7 = $totalIE7 + $record->ie;
                                                                $fecha7=$record->date_job;
                                                                if ($cant7 != 0){
                                                                    $eficiencia7 = round((($totalC7+$totalIE7)*100)/$cant7);}
                                                                    else{
                                                                    $eficiencia7 = 0;}
                                                                    $total7 = $totalC7+$totalCNP7+$totalCC7+$totalMD7+$totalMBLL7+$totalIMP7+$totalIE7;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC7=0;
                                                    $totalCNP7 = 0;
                                                    $totalCC7 = 0;
                                                    $totalMD7 = 0;
                                                    $totalMBLL7 = 0;
                                                    $totalIMP7 = 0;
                                                    $totalIE7 = 0;
                                                    $cant7=0;
                                                    $fecha7='';
                                                  
                                                    $eficiencia7=0;
                                                    $total7 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC7=0;
                                                    $totalCNP7 = 0;
                                                    $totalCC7 = 0;
                                                    $totalMD7 = 0;
                                                    $totalMBLL7 = 0;
                                                    $totalIMP7 = 0;
                                                    $totalIE7 = 0;
                                                    $cant7=0;
                                                    $fecha7='';
                                                  
                                                    $eficiencia7=0;
                                                    $total7 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 7</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha7}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant7}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC7}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP7}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC7}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD7}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL7}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP7}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE7}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total7}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia7}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC8=0;
                                                        $totalCNP8=0;
                                                        $totalCC8=0;
                                                        $totalMD8=0;
                                                        $totalMBLL8=0;
                                                        $totalIMP8=0;
                                                        $totalIE8=0;
                                                        $cant8=0;
                                                        $fecha8='';
                                                        $eficiencia8 = 0;
                                                        $total8 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 8'){
                                                                $totalC8 =$totalC8 + $record->c;
                                                                $cant8 = $cant8 + $record->amount_job;
                                                                $totalCNP8 = $totalCNP8 + $record->cnp;
                                                                $totalMD8 = $totalMD8 + $record->md;
                                                                $totalCC8 = $totalCC8 + $record->cc;
                                                                $totalMBLL8 = $totalMBLL8 + $record->mbll;
                                                                $totalIMP8 = $totalIMP8 + $record->imp;
                                                                $totalIE8 = $totalIE8 + $record->ie;
                                                                $fecha8=$record->date_job;
                                                                if ($cant8 != 0){
                                                                    $eficiencia8 = round((($totalC8+$totalIE8)*100)/$cant8);}
                                                                    else{
                                                                    $eficiencia8 = 0;}
                                                                    $total8 = $totalC8+$totalCNP8+$totalCC8+$totalMD8+$totalMBLL8+$totalIMP8+$totalIE8;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC8=0;
                                                    $totalCNP8 = 0;
                                                    $totalCC8 = 0;
                                                    $totalMD8 = 0;
                                                    $totalMBLL8 = 0;
                                                    $totalIMP8 = 0;
                                                    $totalIE8 = 0;
                                                    $cant8=0;
                                                    $fecha8='';
                                                  
                                                    $eficiencia8=0;
                                                    $total8 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC8=0;
                                                    $totalCNP8 = 0;
                                                    $totalCC8 = 0;
                                                    $totalMD8 = 0;
                                                    $totalMBLL8 = 0;
                                                    $totalIMP8 = 0;
                                                    $totalIE8 = 0;
                                                    $cant8=0;
                                                    $fecha8='';
                                                  
                                                    $eficiencia8=0;
                                                    $total8 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 8</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha8}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant8}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC8}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP8}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC8}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD8}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL8}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP8}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE8}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total8}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia8}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC9=0;
                                                        $totalCNP9=0;
                                                        $totalCC9=0;
                                                        $totalMD9=0;
                                                        $totalMBLL9=0;
                                                        $totalIMP9=0;
                                                        $totalIE9=0;
                                                        $cant9=0;
                                                        $fecha9='';
                                                        $eficiencia9 = 0;
                                                        $total9 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 9'){
                                                                $totalC9 =$totalC9 + $record->c;
                                                                $cant9 = $cant9 + $record->amount_job;
                                                                $totalCNP9 = $totalCNP9 + $record->cnp;
                                                                $totalMD9 = $totalMD9 + $record->md;
                                                                $totalCC9 = $totalCC9 + $record->cc;
                                                                $totalMBLL9 = $totalMBLL9 + $record->mbll;
                                                                $totalIMP9 = $totalIMP9 + $record->imp;
                                                                $totalIE9 = $totalIE9 + $record->ie;
                                                                $fecha9=$record->date_job;
                                                                if ($cant9 != 0){
                                                                    $eficiencia9 = round((($totalC9+$totalIE9)*100)/$cant9);}
                                                                    else{
                                                                    $eficiencia9 = 0;}
                                                                    $total9 = $totalC9+$totalCNP9+$totalCC9+$totalMD9+$totalMBLL9+$totalIMP9+$totalIE9;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC9=0;
                                                    $totalCNP9 = 0;
                                                    $totalCC9 = 0;
                                                    $totalMD9 = 0;
                                                    $totalMBLL9 = 0;
                                                    $totalIMP9 = 0;
                                                    $totalIE9 = 0;
                                                    $cant9=0;
                                                    $fecha9='';
                                                  
                                                    $eficiencia9=0;
                                                    $total9 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC9=0;
                                                    $totalCNP9 = 0;
                                                    $totalCC9 = 0;
                                                    $totalMD9 = 0;
                                                    $totalMBLL9 = 0;
                                                    $totalIMP9 = 0;
                                                    $totalIE9 = 0;
                                                    $cant9=0;
                                                    $fecha9='';
                                                  
                                                    $eficiencia9=0;
                                                    $total9 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 9</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha9}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant9}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC9}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP9}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC9}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD9}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL9}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP9}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE9}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total9}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia9}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC10=0;
                                                        $totalCNP10=0;
                                                        $totalCC10=0;
                                                        $totalMD10=0;
                                                        $totalMBLL10=0;
                                                        $totalIMP10=0;
                                                        $totalIE10=0;
                                                        $cant10=0;
                                                        $fecha10='';
                                                        $eficiencia10 = 0;
                                                        $total10 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 10'){
                                                                $totalC10 =$totalC10 + $record->c;
                                                                $cant10 = $cant10 + $record->amount_job;
                                                                $totalCNP10 = $totalCNP10 + $record->cnp;
                                                                $totalMD10 = $totalMD10 + $record->md;
                                                                $totalCC10 = $totalCC10 + $record->cc;
                                                                $totalMBLL10 = $totalMBLL10 + $record->mbll;
                                                                $totalIMP10 = $totalIMP10 + $record->imp;
                                                                $totalIE10 = $totalIE10 + $record->ie;
                                                                $fecha10=$record->date_job;
                                                                if ($cant10 != 0){
                                                                    $eficiencia10 = round((($totalC10+$totalIE10)*100)/$cant10);}
                                                                    else{
                                                                    $eficiencia10 = 0;}
                                                                    $total10 = $totalC10+$totalCNP10+$totalCC10+$totalMD10+$totalMBLL10+$totalIMP10+$totalIE10;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC10=0;
                                                    $totalCNP10 = 0;
                                                    $totalCC10 = 0;
                                                    $totalMD10 = 0;
                                                    $totalMBLL10 = 0;
                                                    $totalIMP10 = 0;
                                                    $totalIE10 = 0;
                                                    $cant10=0;
                                                    $fecha10='';
                                                  
                                                    $eficiencia10=0;
                                                    $total10 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC10=0;
                                                    $totalCNP10 = 0;
                                                    $totalCC10 = 0;
                                                    $totalMD10 = 0;
                                                    $totalMBLL10 = 0;
                                                    $totalIMP10 = 0;
                                                    $totalIE10 = 0;
                                                    $cant10=0;
                                                    $fecha10='';
                                                  
                                                    $eficiencia10=0;
                                                    $total10 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 10</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha10}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant10}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC10}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP10}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC10}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD10}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL10}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP10}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE10}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total10}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia10}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC11=0;
                                                        $totalCNP11=0;
                                                        $totalCC11=0;
                                                        $totalMD11=0;
                                                        $totalMBLL11=0;
                                                        $totalIMP11=0;
                                                        $totalIE11=0;
                                                        $cant11=0;
                                                        $fecha11='';
                                                        $eficiencia11 = 0;
                                                        $total11 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 11'){
                                                                $totalC11 =$totalC11 + $record->c;
                                                                $cant11 = $cant11 + $record->amount_job;
                                                                $totalCNP11 = $totalCNP11 + $record->cnp;
                                                                $totalMD11 = $totalMD11 + $record->md;
                                                                $totalCC11 = $totalCC11 + $record->cc;
                                                                $totalMBLL11 = $totalMBLL11 + $record->mbll;
                                                                $totalIMP11 = $totalIMP11 + $record->imp;
                                                                $totalIE11 = $totalIE11 + $record->ie;
                                                                $fecha11=$record->date_job;
                                                                if ($cant11 != 0){
                                                                    $eficiencia11 = round((($totalC11+$totalIE11)*100)/$cant11);}
                                                                    else{
                                                                    $eficiencia11 = 0;}
                                                                    $total11 = $totalC11+$totalCNP11+$totalCC11+$totalMD11+$totalMBLL11+$totalIMP11+$totalIE11;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC11=0;
                                                    $totalCNP11 = 0;
                                                    $totalCC11 = 0;
                                                    $totalMD11 = 0;
                                                    $totalMBLL11 = 0;
                                                    $totalIMP11 = 0;
                                                    $totalIE11 = 0;
                                                    $cant11=0;
                                                    $fecha11='';
                                                  
                                                    $eficiencia11=0;
                                                    $total11 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC11=0;
                                                    $totalCNP11 = 0;
                                                    $totalCC11 = 0;
                                                    $totalMD11 = 0;
                                                    $totalMBLL11 = 0;
                                                    $totalIMP11 = 0;
                                                    $totalIE11 = 0;
                                                    $cant11=0;
                                                    $fecha11='';
                                                  
                                                    $eficiencia11=0;
                                                    $total11 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 11</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha11}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant11}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC11}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP11}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC11}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD11}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL11}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP11}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE11}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total11}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia11}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC12=0;
                                                        $totalCNP12=0;
                                                        $totalCC12=0;
                                                        $totalMD12=0;
                                                        $totalMBLL12=0;
                                                        $totalIMP12=0;
                                                        $totalIE12=0;
                                                        $cant12=0;
                                                        $fecha12='';
                                                        $eficiencia12 = 0;
                                                        $total12 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 12'){
                                                                $totalC12 =$totalC12 + $record->c;
                                                                $cant12 = $cant12 + $record->amount_job;
                                                                $totalCNP12 = $totalCNP12 + $record->cnp;
                                                                $totalMD12 = $totalMD12 + $record->md;
                                                                $totalCC12 = $totalCC12 + $record->cc;
                                                                $totalMBLL12 = $totalMBLL12 + $record->mbll;
                                                                $totalIMP12 = $totalIMP12 + $record->imp;
                                                                $totalIE12 = $totalIE12 + $record->ie;
                                                                $fecha12=$record->date_job;
                                                                if ($cant12 != 0){
                                                                    $eficiencia12 = round((($totalC12+$totalIE12)*100)/$cant12);}
                                                                    else{
                                                                    $eficiencia12 = 0;}
                                                                    $total12 = $totalC12+$totalCNP12+$totalCC12+$totalMD12+$totalMBLL12+$totalIMP12+$totalIE12;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC12=0;
                                                    $totalCNP12 = 0;
                                                    $totalCC12 = 0;
                                                    $totalMD12 = 0;
                                                    $totalMBLL12 = 0;
                                                    $totalIMP12 = 0;
                                                    $totalIE12 = 0;
                                                    $cant12=0;
                                                    $fecha12='';
                                                  
                                                    $eficiencia12=0;
                                                    $total12 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC12=0;
                                                    $totalCNP12 = 0;
                                                    $totalCC12 = 0;
                                                    $totalMD12 = 0;
                                                    $totalMBLL12 = 0;
                                                    $totalIMP12 = 0;
                                                    $totalIE12 = 0;
                                                    $cant12=0;
                                                    $fecha12='';
                                                  
                                                    $eficiencia12=0;
                                                    $total12 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 12</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha12}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant12}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC12}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP12}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC12}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD12}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL12}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP12}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE12}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total12}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia12}} %</center></td> 
                                                      
                                                </tr>

                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC13=0;
                                                        $totalCNP13=0;
                                                        $totalCC13=0;
                                                        $totalMD13=0;
                                                        $totalMBLL13=0;
                                                        $totalIMP13=0;
                                                        $totalIE13=0;
                                                        $cant13=0;
                                                        $fecha13='';
                                                        $eficiencia13 = 0;
                                                        $total13 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 13'){
                                                                $totalC13 =$totalC13 + $record->c;
                                                                $cant13 = $cant13 + $record->amount_job;
                                                                $totalCNP13 = $totalCNP13 + $record->cnp;
                                                                $totalMD13 = $totalMD13 + $record->md;
                                                                $totalCC13 = $totalCC13 + $record->cc;
                                                                $totalMBLL13 = $totalMBLL13 + $record->mbll;
                                                                $totalIMP13 = $totalIMP13 + $record->imp;
                                                                $totalIE13 = $totalIE13 + $record->ie;
                                                                $fecha13=$record->date_job;
                                                                if ($cant13 != 0){
                                                                    $eficiencia13 = round((($totalC13+$totalIE13)*100)/$cant13);}
                                                                    else{
                                                                    $eficiencia13 = 0;}
                                                                    $total13 = $totalC13+$totalCNP13+$totalCC13+$totalMD13+$totalMBLL13+$totalIMP13+$totalIE13;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC13=0;
                                                    $totalCNP13 = 0;
                                                    $totalCC13 = 0;
                                                    $totalMD13 = 0;
                                                    $totalMBLL13 = 0;
                                                    $totalIMP13 = 0;
                                                    $totalIE13 = 0;
                                                    $cant13=0;
                                                    $fecha13='';
                                                  
                                                    $eficiencia13=0;
                                                    $total13 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC13=0;
                                                    $totalCNP13 = 0;
                                                    $totalCC13 = 0;
                                                    $totalMD13 = 0;
                                                    $totalMBLL13 = 0;
                                                    $totalIMP13 = 0;
                                                    $totalIE13 = 0;
                                                    $cant13=0;
                                                    $fecha13='';
                                                  
                                                    $eficiencia13=0;
                                                    $total13 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 13</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha13}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant13}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC13}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP13}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC13}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD13}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL13}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP13}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE13}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total13}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia13}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC14=0;
                                                        $totalCNP14=0;
                                                        $totalCC14=0;
                                                        $totalMD14=0;
                                                        $totalMBLL14=0;
                                                        $totalIMP14=0;
                                                        $totalIE14=0;
                                                        $cant14=0;
                                                        $fecha14='';
                                                        $eficiencia14 = 0;
                                                        $total14 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 14'){
                                                                $totalC14 =$totalC14 + $record->c;
                                                                $cant14 = $cant14 + $record->amount_job;
                                                                $totalCNP14 = $totalCNP14 + $record->cnp;
                                                                $totalMD14 = $totalMD14 + $record->md;
                                                                $totalCC14 = $totalCC14 + $record->cc;
                                                                $totalMBLL14 = $totalMBLL14 + $record->mbll;
                                                                $totalIMP14 = $totalIMP14 + $record->imp;
                                                                $totalIE14 = $totalIE14 + $record->ie;
                                                                $fecha14=$record->date_job;
                                                                if ($cant14 != 0){
                                                                    $eficiencia14 = round((($totalC14+$totalIE14)*100)/$cant14);}
                                                                    else{
                                                                    $eficiencia14 = 0;}
                                                                    $total14 = $totalC14+$totalCNP14+$totalCC14+$totalMD14+$totalMBLL14+$totalIMP14+$totalIE14;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC14=0;
                                                    $totalCNP14 = 0;
                                                    $totalCC14 = 0;
                                                    $totalMD14 = 0;
                                                    $totalMBLL14 = 0;
                                                    $totalIMP14 = 0;
                                                    $totalIE14 = 0;
                                                    $cant14=0;
                                                    $fecha14='';
                                                  
                                                    $eficiencia14=0;
                                                    $total14 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC14=0;
                                                    $totalCNP14 = 0;
                                                    $totalCC14 = 0;
                                                    $totalMD14 = 0;
                                                    $totalMBLL14 = 0;
                                                    $totalIMP14 = 0;
                                                    $totalIE14 = 0;
                                                    $cant14=0;
                                                    $fecha14='';
                                                  
                                                    $eficiencia14=0;
                                                    $total14 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 14</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha14}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant14}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC14}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP14}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC14}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD14}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL14}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP14}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE14}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total14}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia14}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC15=0;
                                                        $totalCNP15=0;
                                                        $totalCC15=0;
                                                        $totalMD15=0;
                                                        $totalMBLL15=0;
                                                        $totalIMP15=0;
                                                        $totalIE15=0;
                                                        $cant15=0;
                                                        $fecha15='';
                                                        $eficiencia15 = 0;
                                                        $total15 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 15'){
                                                                $totalC15 =$totalC15 + $record->c;
                                                                $cant15 = $cant15 + $record->amount_job;
                                                                $totalCNP15 = $totalCNP15 + $record->cnp;
                                                                $totalMD15 = $totalMD15 + $record->md;
                                                                $totalCC15 = $totalCC15 + $record->cc;
                                                                $totalMBLL15 = $totalMBLL15 + $record->mbll;
                                                                $totalIMP15 = $totalIMP15 + $record->imp;
                                                                $totalIE15 = $totalIE15 + $record->ie;
                                                                $fecha15=$record->date_job;
                                                                if ($cant15 != 0){
                                                                    $eficiencia15 = round((($totalC15+$totalIE15)*100)/$cant15);}
                                                                    else{
                                                                    $eficiencia15 = 0;}
                                                                    $total15 = $totalC15+$totalCNP15+$totalCC15+$totalMD15+$totalMBLL15+$totalIMP15+$totalIE15;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC15=0;
                                                    $totalCNP15 = 0;
                                                    $totalCC15 = 0;
                                                    $totalMD15 = 0;
                                                    $totalMBLL15 = 0;
                                                    $totalIMP15 = 0;
                                                    $totalIE15 = 0;
                                                    $cant15=0;
                                                    $fecha15='';
                                                  
                                                    $eficiencia15=0;
                                                    $total15 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC15=0;
                                                    $totalCNP15 = 0;
                                                    $totalCC15 = 0;
                                                    $totalMD15 = 0;
                                                    $totalMBLL15 = 0;
                                                    $totalIMP15 = 0;
                                                    $totalIE15 = 0;
                                                    $cant15=0;
                                                    $fecha15='';
                                                  
                                                    $eficiencia15=0;
                                                    $total15 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 15</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha15}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant15}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC15}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP15}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC15}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD15}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL15}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP15}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE15}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total15}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia15}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC16=0;
                                                        $totalCNP16=0;
                                                        $totalCC16=0;
                                                        $totalMD16=0;
                                                        $totalMBLL16=0;
                                                        $totalIMP16=0;
                                                        $totalIE16=0;
                                                        $cant16=0;
                                                        $fecha16='';
                                                        $eficiencia16 = 0;
                                                        $total16 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 16'){
                                                                $totalC16 =$totalC16 + $record->c;
                                                                $cant16 = $cant16 + $record->amount_job;
                                                                $totalCNP16 = $totalCNP16 + $record->cnp;
                                                                $totalMD16 = $totalMD16 + $record->md;
                                                                $totalCC16 = $totalCC16 + $record->cc;
                                                                $totalMBLL16 = $totalMBLL16 + $record->mbll;
                                                                $totalIMP16 = $totalIMP16 + $record->imp;
                                                                $totalIE16 = $totalIE16 + $record->ie;
                                                                $fecha16=$record->date_job;
                                                                if ($cant16 != 0){
                                                                    $eficiencia16 = round((($totalC16+$totalIE16)*100)/$cant16);}
                                                                    else{
                                                                    $eficiencia16 = 0;}
                                                                    $total16 = $totalC16+$totalCNP16+$totalCC16+$totalMD16+$totalMBLL16+$totalIMP16+$totalIE16;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC16=0;
                                                    $totalCNP16 = 0;
                                                    $totalCC16 = 0;
                                                    $totalMD16 = 0;
                                                    $totalMBLL16 = 0;
                                                    $totalIMP16 = 0;
                                                    $totalIE16 = 0;
                                                    $cant16=0;
                                                    $fecha16='';
                                                  
                                                    $eficiencia16=0;
                                                    $total16 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC16=0;
                                                    $totalCNP16 = 0;
                                                    $totalCC16 = 0;
                                                    $totalMD16 = 0;
                                                    $totalMBLL16 = 0;
                                                    $totalIMP16 = 0;
                                                    $totalIE16 = 0;
                                                    $cant16=0;
                                                    $fecha16='';
                                                  
                                                    $eficiencia16=0;
                                                    $total16 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 16</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha16}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant16}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC16}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP16}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC16}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD16}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL16}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP16}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE16}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total16}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia16}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC17=0;
                                                        $totalCNP17=0;
                                                        $totalCC17=0;
                                                        $totalMD17=0;
                                                        $totalMBLL17=0;
                                                        $totalIMP17=0;
                                                        $totalIE17=0;
                                                        $cant17=0;
                                                        $fecha17='';
                                                        $eficiencia17 = 0;
                                                        $total17 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 17'){
                                                                $totalC17 =$totalC17 + $record->c;
                                                                $cant17 = $cant17 + $record->amount_job;
                                                                $totalCNP17 = $totalCNP17 + $record->cnp;
                                                                $totalMD17 = $totalMD17 + $record->md;
                                                                $totalCC17 = $totalCC17 + $record->cc;
                                                                $totalMBLL17 = $totalMBLL17 + $record->mbll;
                                                                $totalIMP17 = $totalIMP17 + $record->imp;
                                                                $totalIE17 = $totalIE17 + $record->ie;
                                                                $fecha17=$record->date_job;
                                                                if ($cant17 != 0){
                                                                    $eficiencia17 = round((($totalC17+$totalIE17)*100)/$cant17);}
                                                                    else{
                                                                    $eficiencia17 = 0;}
                                                                    $total17 = $totalC17+$totalCNP17+$totalCC17+$totalMD17+$totalMBLL17+$totalIMP17+$totalIE17;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC17=0;
                                                    $totalCNP17 = 0;
                                                    $totalCC17 = 0;
                                                    $totalMD17 = 0;
                                                    $totalMBLL17 = 0;
                                                    $totalIMP17 = 0;
                                                    $totalIE17 = 0;
                                                    $cant17=0;
                                                    $fecha17='';
                                                  
                                                    $eficiencia17=0;
                                                    $total17 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC17=0;
                                                    $totalCNP17 = 0;
                                                    $totalCC17 = 0;
                                                    $totalMD17 = 0;
                                                    $totalMBLL17 = 0;
                                                    $totalIMP17 = 0;
                                                    $totalIE17 = 0;
                                                    $cant17=0;
                                                    $fecha17='';
                                                  
                                                    $eficiencia17=0;
                                                    $total17 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 17</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha17}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant17}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC17}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP17}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC17}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD17}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL17}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP17}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE17}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total17}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia17}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC18=0;
                                                        $totalCNP18=0;
                                                        $totalCC18=0;
                                                        $totalMD18=0;
                                                        $totalMBLL18=0;
                                                        $totalIMP18=0;
                                                        $totalIE18=0;
                                                        $cant18=0;
                                                        $fecha18='';
                                                        $eficiencia18 = 0;
                                                        $total18 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 18'){
                                                                $totalC18 =$totalC18 + $record->c;
                                                                $cant18 = $cant18 + $record->amount_job;
                                                                $totalCNP18 = $totalCNP18 + $record->cnp;
                                                                $totalMD18 = $totalMD18 + $record->md;
                                                                $totalCC18 = $totalCC18 + $record->cc;
                                                                $totalMBLL18 = $totalMBLL18 + $record->mbll;
                                                                $totalIMP18 = $totalIMP18 + $record->imp;
                                                                $totalIE18 = $totalIE18 + $record->ie;
                                                                $fecha18=$record->date_job;
                                                                if ($cant18 != 0){
                                                                    $eficiencia18 = round((($totalC18+$totalIE18)*100)/$cant18);}
                                                                    else{
                                                                    $eficiencia18 = 0;}
                                                                    $total18 = $totalC18+$totalCNP18+$totalCC18+$totalMD18+$totalMBLL18+$totalIMP18+$totalIE18;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC18=0;
                                                    $totalCNP18 = 0;
                                                    $totalCC18 = 0;
                                                    $totalMD18 = 0;
                                                    $totalMBLL18 = 0;
                                                    $totalIMP18 = 0;
                                                    $totalIE18 = 0;
                                                    $cant18=0;
                                                    $fecha18='';
                                                  
                                                    $eficiencia18=0;
                                                    $total18 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC18=0;
                                                    $totalCNP18 = 0;
                                                    $totalCC18 = 0;
                                                    $totalMD18 = 0;
                                                    $totalMBLL18 = 0;
                                                    $totalIMP18 = 0;
                                                    $totalIE18 = 0;
                                                    $cant18=0;
                                                    $fecha18='';
                                                  
                                                    $eficiencia18=0;
                                                    $total18 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 18</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha18}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant18}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC18}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP18}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC18}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD18}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL18}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP18}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE18}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total18}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia18}} %</center></td> 
                                                      
                                                </tr>


                                                @foreach($cortes as $data)
                                             @if ($data->month == $mes)
                                             @if ($data->annio == $year)
                                                    @php
                                                        $totalC19=0;
                                                        $totalCNP19=0;
                                                        $totalCC19=0;
                                                        $totalMD19=0;
                                                        $totalMBLL19=0;
                                                        $totalIMP19=0;
                                                        $totalIE19=0;
                                                        $cant19=0;
                                                        $fecha19='';
                                                        $eficiencia19 = 0;
                                                        $total19 = 0;
                                                    @endphp
                                                    @foreach($cortes as $record)
                                                        @php
                                                            if ($record->month = $mes){
                                                            if ($record->annio = $year){
                                                            if ($record->name_remesa == 'Remesa 19'){
                                                                $totalC19 =$totalC19 + $record->c;
                                                                $cant19 = $cant19 + $record->amount_job;
                                                                $totalCNP19 = $totalCNP19 + $record->cnp;
                                                                $totalMD19 = $totalMD19 + $record->md;
                                                                $totalCC19 = $totalCC19 + $record->cc;
                                                                $totalMBLL19 = $totalMBLL19 + $record->mbll;
                                                                $totalIMP19 = $totalIMP19 + $record->imp;
                                                                $totalIE19 = $totalIE19 + $record->ie;
                                                                $fecha19=$record->date_job;
                                                                if ($cant19 != 0){
                                                                    $eficiencia19 = round((($totalC19+$totalIE19)*100)/$cant19);}
                                                                    else{
                                                                    $eficiencia19 = 0;}
                                                                    $total19 = $totalC19+$totalCNP19+$totalCC19+$totalMD19+$totalMBLL19+$totalIMP19+$totalIE19;
                                                            }
                                                            }
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @else
                                                @php
                                                    $totalC19=0;
                                                    $totalCNP19 = 0;
                                                    $totalCC19 = 0;
                                                    $totalMD19 = 0;
                                                    $totalMBLL19 = 0;
                                                    $totalIMP19 = 0;
                                                    $totalIE19 = 0;
                                                    $cant19=0;
                                                    $fecha19='';
                                                  
                                                    $eficiencia19=0;
                                                    $total19 = 0;
                                                @endphp
                                                @endif
                                                @else
                                                @php
                                                    $totalC19=0;
                                                    $totalCNP19 = 0;
                                                    $totalCC19 = 0;
                                                    $totalMD19 = 0;
                                                    $totalMBLL19 = 0;
                                                    $totalIMP19 = 0;
                                                    $totalIE19 = 0;
                                                    $cant19=0;
                                                    $fecha19='';
                                                  
                                                    $eficiencia19=0;
                                                    $total19 = 0;
                                                @endphp
                                                @endif
                                                @endforeach 
                                                    <tr>
                                                        <td style="font-size:12px"><center>Remesa 19</center></td>  
                                                        <td style="font-size:12px"><center>{{$mes}}</center></td>
                                                        <td style="font-size:12px"><center>{{$fecha19}}</center></td>
                                                        <td style="font-size:12px"><center>{{$cant19}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalC19}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalCNP19}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalCC19}}</center></td> 
                                                        <td style="font-size:12px"><center>{{$totalMD19}}</center></td>  
                                                        <td style="font-size:12px"><center>{{$totalMBLL19}}</center></td>
                                                        <td style="font-size:12px"><center>{{$totalIMP19}}</center></td>   
                                                        <td style="font-size:12px"><center>{{$totalIE19}}</center></td>
                                                        <td style="font-size:12px"><center>{{$total19}}</center></td>  
                                                        <td style="font-size:12px;color:red"><center>{{$eficiencia19}} %</center></td> 
                                                      
                                                </tr>
                                                
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

<div class="board">
        <div class="titulo_grafica">
            <h3 class="t_grafica">Estadisticas de los Cortes del mes de {{$mes}}</h3>
            
        </div>
        <div class="sub_board">
            <div class="sep_board"></div>
            <div class="cont_board">
                <div class="graf_board">
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia1}}%">
                            <div class="tag_g">{{$eficiencia1}}%</div>
                            <div class="tag_leyenda">R1</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia}}%">
                            <div class="tag_g">{{$eficiencia}}%</div>
                            <div class="tag_leyenda">R2</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia3}}%">
                            <div class="tag_g">{{$eficiencia3}}%</div>
                            <div class="tag_leyenda">R3</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia4}}%">
                            <div class="tag_g">{{$eficiencia4}}%</div>
                            <div class="tag_leyenda">R4</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia5}}%">
                            <div class="tag_g">{{$eficiencia5}}%</div>
                            <div class="tag_leyenda">R5</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia6}}%">
                            <div class="tag_g">{{$eficiencia6}}%</div>
                            <div class="tag_leyenda">R6</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia7}}%">
                            <div class="tag_g">{{$eficiencia7}}%</div>
                            <div class="tag_leyenda">R7</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia8}}%">
                            <div class="tag_g">{{$eficiencia8}}%</div>
                            <div class="tag_leyenda">R8</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia9}}%">
                            <div class="tag_g">{{$eficiencia9}}%</div>
                            <div class="tag_leyenda">R9</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia10}}%">
                            <div class="tag_g">{{$eficiencia10}}%</div>
                            <div class="tag_leyenda">R10</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia11}}%">
                            <div class="tag_g">{{$eficiencia11}}%</div>
                            <div class="tag_leyenda">R11</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia12}}%">
                            <div class="tag_g">{{$eficiencia12}}%</div>
                            <div class="tag_leyenda">R12</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia13}}%">
                            <div class="tag_g">{{$eficiencia13}}%</div>
                            <div class="tag_leyenda">R13</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia14}}%">
                            <div class="tag_g">{{$eficiencia14}}%</div>
                            <div class="tag_leyenda">R14</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia15}}%">
                            <div class="tag_g">{{$eficiencia15}}%</div>
                            <div class="tag_leyenda">R15</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia16}}%">
                            <div class="tag_g">{{$eficiencia16}}%</div>
                            <div class="tag_leyenda">R16</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia17}}%">
                            <div class="tag_g">{{$eficiencia17}}%</div>
                            <div class="tag_leyenda">R17</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia18}}%">
                            <div class="tag_g">{{$eficiencia18}}%</div>
                            <div class="tag_leyenda">R18</div>
                        </div>
                    </div>
                    <div class="barra">
                        <div class="sub_barra" style="height: {{$eficiencia19}}%">
                            <div class="tag_g">{{$eficiencia19}}%</div>
                            <div class="tag_leyenda">R19</div>
                        </div>
                    </div>
                    
                </div>
                <div class="tag_board">
                    <div class="sub_tag_board">
                        <div>100</div>
                        <div>90</div>
                        <div>80</div>
                        <div>70</div>
                        <div>60</div>
                        <div>50</div>
                        <div>40</div>
                        <div>30</div>
                        <div>20</div>
                        <div>10</div>
                    </div>
                </div>
           </div> 
            <div class="sep_board"></div>
       </div>    
    </div>


        
@endsection
@section('js')

@endsection
