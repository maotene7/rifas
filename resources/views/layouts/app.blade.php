<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login - ADMIN</title>

        <link  rel="icon"   href="{{asset('img/perfil/'.Auth::user()->ico)}}" type="image/png" />
        <!-- Bootstrap core CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alexandria:100,200,300,400,500,600,700,800,900&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:100,100italic,300,300italic,400,400italic,500,500italic,700italic,700,800,800italic,900,900italic&display=swap">
        <link rel="stylesheet" href="blocks.css">
        <link href="{{asset('admin/style_register.css')}}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
   
</head> 
<body>
    <div id="app">
         <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <header class="header2">
            <div class="container container_menu1">
                <div class="div_logo">
                    <img src="{{asset('img/perfil/'.Auth::user()->logo)}}" class="logo1">
                    
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

