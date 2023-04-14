<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
         <title>RIFA LEMT</title>
        <!-- icon -->
        <link  rel="icon"   href="{{asset('img/perfil/'.session('ico'))}}" type="image/png" />
        <!-- Bootstrap core CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alexandria:100,200,300,400,500,600,700,800,900&display=swap">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <style>


/*funciones para el boton de checkbox*/
  input[type="checkbox"]:checked + p {
  background: #1b84d4;
  color: white;
}
input[type="checkbox"] {
    display: none;
}

/*boton seleccionado*/
.numb2{
    background: white;
    padding: 5px;
    margin-right: 10px;
    border-radius: 30px;
}


</style>

    </head>
    <body class="body">


          <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/assets/js/popper.js')}}"></script>
        <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
        <header class="header2">
            <div class="container container_menu1">
                <div class="div_logo">
                    <a href="{{url('/')}}"> 
                        <img src="{{asset('img/perfil/'.session('logo'))}}" class="logo1">
                    
                    </a>
                </div>
                <input type="checkbox" id="btn-menu" class="check">
                <div class="div_menu div_none">
                    <a href="" class="link1" style="padding: 10px 12 10px 12px; margin-right: 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-credit-card card" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                        </svg></a>
                    <label for="btn-menu" class="label_menu">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico_menu">
                            <g>
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path d="M16 18v2H5v-2h11zm5-7v2H3v-2h18zm-2-7v2H8V4h11z"/>
                            </g>
                        </svg>                         
                    </label>
                </div>
                <nav class="menu"> 
                    <ul class="list_ul">
                        <a href="{{url('/')}}" class="link1 link2">Inicio</a>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-trans dropdown-toggle text-white" data-toggle="dropdown" aria-expanded="false">
                              Quienes somos
                            </button>
                            <div class="dropdown-menu">
                              <a href="{{url('/#preguntas')}}" class="link1 link2">Preguntas Frecuentes</a>
                        <a href="{{url('/#nosotros')}}" class="link1 link2">Nosotros</a>
                        <a href="{{url('/#contacto')}}" class="link1 link2">Contacto</a>
                            </div>
                          </div>
                    
                        <a href="{{url('verification')}}" class="link1 link2">Verificar Boletas</a>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-trans dropdown-toggle text-white" data-toggle="dropdown" aria-expanded="false">
                                @if (Auth::guest())
                                    Identificate
                                @else
                                    {{Auth::user()->name}}
                                
                                @endif
                            </button>
                            <div class="dropdown-menu">
                                @if (Auth::guest())
                                  <a class="dropdown-item" href="{{route('login')}}">Entrar</a>
                                  <a class="dropdown-item" href="{{route('register')}}">Registrate</a>
                                @else
                                  <a class="dropdown-item" href="{{route('perfils.index')}}">Mi Perfil</a>
                                  <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Cerrar</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                @endif
                            </div>
                          </div>
                    </ul>
                </nav>
            </div>
        </header>

        @yield('contentenido')

         <div class="div_title1">
            <a href="" class="link1"><div class="div_link1">
                    <h3 class="txt_title1">PREGUNTAS AL WHATSAPP</h3>
                    <h3 class="txt_title1">+{{session('whatsapp')}}</h3>
                </div></a>
        </div>
        <footer class="footer">
            <a href="" class="link1"><h4 class="txt6">Sitio desarrollado por:  Sublime by Concept</h4></a>
            <a href="{{asset('pdf/AVISO PRIVACIDAD.pdf')}}" target="_blank" class="link1"><h4 class="txt6">Aviso de privacidad</h4></a>
        </footer>

        
        
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>