<?php

use App\Models\rifas;

$rifas = rifas::all();

?>
 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Administracion</title>
        <link  rel="icon"   href="{{asset('img/perfil/'.Auth::user()->ico)}}" type="image/png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <!-- Bootstrap core CSS -->
        <link href="{{asset('admin/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('admin/style.css')}}" rel="stylesheet">
        <link href="style_dashboard1" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,800,800italic,900,900italic&display=swap">
        <link href="{{asset('admin/style_panel.css')}}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
   
</head>
<body class="body-dash">
    <header class="header">
            <div class="row row-barra">
                <div class="col col-lg col-md col-sm color1"> 
</div>
                <div class="col col-lg col-md col-sm color2"> 
</div>
                <div class="col col-lg col-md col-sm color3"> 
</div>
                <div class="col col-lg col-md col-sm color4"> 
</div>
                <div class="col col-lg col-md col-sm color5"> 
</div>
            </div>
            <div class="header1 row">
                <div class="col-lg-2 col-md-2 logo1">
                    <div class="row row-menu">
                        <div class="col col-lg col-logo col-md col-menu col-sm col-xl">
                            <img src="{{asset('img/perfil/'.Auth::user()->logo)}}" class="img-logo1"> 
                        </div>
                        <!--
                        <div class="col-md col-menu">
                            <div class="div-img">
                                <img src="http://pinegrow.com/placeholders/img17.jpg" class="img-user">
                            </div>                             
                        </div>-->
                        <div class="col-md col-menu">
                            <div class="user">
                                <div class="name-user">
                                    <div class="name-univ">
                                        <label class="label-name-univ1 d-flex justify-content-center">LEMT</label>
                                        <p class="txt-user text-aligh-center">{{Auth::user()->name}}</p>
                                    </div>
                                </div>
                            </div>                             
                        </div>
                        <div class="col-md col-menu">
                            <div class="menu-responsive menu-sticky">
                                <div class="row row-menu">
                                    @if(Auth::user()->rol == 1)
                                    <a href="{{route('home')}}" class="active col col-lg col-link col-md col-sm col-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico-menu1">
                                            <g>
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path d="M19 21H5a1 1 0 0 1-1-1v-9H1l10.327-9.388a1 1 0 0 1 1.346 0L23 11h-3v9a1 1 0 0 1-1 1zM6 19h12V9.157l-6-5.454-6 5.454V19zm2.591-5.191a3.508 3.508 0 0 1 0-1.622l-.991-.572 1-1.732.991.573a3.495 3.495 0 0 1 1.404-.812V8.5h2v1.144c.532.159 1.01.44 1.404.812l.991-.573 1 1.731-.991.573a3.508 3.508 0 0 1 0 1.622l.991.572-1 1.731-.991-.572a3.495 3.495 0 0 1-1.404.811v1.145h-2V16.35a3.495 3.495 0 0 1-1.404-.811l-.991.572-1-1.73.991-.573zm3.404.688a1.5 1.5 0 1 0 0-2.998 1.5 1.5 0 0 0 0 2.998z"/>
                                            </g>
                                        </svg>
                                        <label class="txt-menu1">DASHBOARD</label>                                         
                                    </a>
                                    @endif
                                    <a href="{{route('perfils.index')}}" class="col col-lg col-link col-md col-sm col-xl">
                                        <i class="bi bi-person-bounding-box text-white mr-2 ml-1"></i>
                                        <label class="txt-menu1">Perfil</label>                                         
                                    </a>
                                    @if(Auth::user()->rol == 1)
                                    <a href="{{route('rifas.index')}}" class="col col-lg col-link col-md col-sm col-xl">
                                        <i class="bi bi-gift-fill text-white mr-2 ml-1"></i>
                                        <label class="txt-menu1">Rifas</label>                                         
                                    </a>
                                    <div class="col col-lg col-link col-md col-sm col-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico-menu1">
                                            <g>
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zm-.692-2H20V5H4v13.385L5.763 17zM11 10h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2z"/>
                                            </g>
                                        </svg>
                                        <div class="dropdown">
                                          <label class="txt-menu1 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Ganadores
                                          </label>
                                          <div class="dropdown-menu">
                                            @foreach($rifas as $rifa)
                                            <a class="dropdown-item" href="{{url('winners/create?rifa='. $rifa->id)}}">{{$rifa->premio}}</a>
                                            @endforeach
                                          </div>
                                        </div>
                                                                                 
                                    </div>
                                     @endif
                                    <a href="{{route('boletos.index')}}" class="col col-lg col-link col-md col-sm col-xl">
                                        <i class="bi bi-person-video2 text-white mr-2 ml-1"></i>
                                        <label class="txt-menu1">Boletos</label>                                         
                                    </a>
                                    @if(Auth::user()->rol == 1)
                                    <div class="col col-lg col-link col-md col-sm col-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico-menu1">
                                            <g>
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zm-.692-2H20V5H4v13.385L5.763 17zM11 10h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2z"/>
                                            </g>
                                        </svg>
                                        <div class="dropdown">
                                          <label class="txt-menu1 dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Verificación
                                          </label>
                                          <div class="dropdown-menu">
                                            @foreach($rifas as $rifa)
                                            <a class="dropdown-item" href="{{route('buscar.verif',['id' => $rifa->id])}}">{{$rifa->premio}}</a>
                                            @endforeach
                                          </div>
                                        </div>
                                                                                 
                                    </div>
                                    @endif
                                    <!--
                                    <div href="" class="col col-lg col-link col-md col-sm col-xl">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico-menu1">
                                            <g>
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-1-5h2v2h-2v-2zm2-1.645V14h-2v-1.5a1 1 0 0 1 1-1 1.5 1.5 0 1 0-1.471-1.794l-1.962-.393A3.501 3.501 0 1 1 13 13.355z"/>
                                            </g>
                                        </svg>
                                        <label class="txt-menu1">AYUDA TEÓRICA</label>                                         
                                    </div>-->
                                </div>
                            </div>                             
                        </div>
                    </div>                     
                </div>
                <div class="col col-header1 col-md">
                    <ul class="nav nav-main">
                        <li class="nav-item nav-item-menu">
                            <div class="div-label">
                                <label class="label-info">PANEL DE CONTROL</label>
                            </div>
                            <a class="link-main nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico-close">
                                    <g>
                                        <path fill="none" d="M0 0h24v24H0z"/>
                                        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/>
                                    </g>
                                </svg>Cerrar sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    

     <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/popper.js')}}"></script>
        <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>


