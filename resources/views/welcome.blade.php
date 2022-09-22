<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cortes y Reconexiones</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/cortes.png')}}">
         <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Bootstrap -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>

       <!-- <img src="{{asset('images/balon4.gif')}}" class="img-fluid" width="400" loading="lazy">
        <a style="font-size: 26px"> Asociación Departamental de Voleibol Oruro</a>-->
        
        <div class="contanier">
        <center>  
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else


                    

                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <!--
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif -->
                    @endauth
                    <br>
                    
                        
                    <img src="{{asset('images/liniero.png')}}" width="300" alt="Cortes y Reconexiones" />   </center>
 
                        </div>
            @endif
            
        </div>
   
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
