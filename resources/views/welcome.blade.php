<!DOCTYPE html>
<html lang="en">
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

        <style>
img.btn-whatsapp {
display: block !important; 
position: fixed;
z-index: 9999999;
bottom: 20px;
right: 20px;
cursor: pointer;
border-radius:100px !important;
}
img.btn-whatsapp:hover{
border-radius:100px !important;
-webkit-box-shadow: 0px 0px 15px 0px rgba(7,94,84,1); 
-moz-box-shadow: 0px 0px 15px 0px rgba(7,94,84,1);
box-shadow: 0px 0px 15px 0px rgba(7,94,84,1);
transition-duration: 1s;
} 

.btn-trans{
    background: transparent;
    border-color: none;

}
</style>

    </head>
    <body class="body">
        <img class="btn-whatsapp" src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/{{session('whatsapp')}}?text=Hola!%20En%20que%20le%20puedo%20ayudar'">
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
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
                              <a href="#preguntas" class="dropdown-item">Preguntas Frecuentes</a>
                              <a href="#nosotros" class="dropdown-item">Nosotros</a>
                              <a href="#contacto" class="dropdown-item">Contacto</a>
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
        <section class="home">
            <img src="{{asset('img/perfil/'.session('img'))}}" class="img_home">
            <div class="div_button">
                <a href="{{url('Compra_boleto')}}" class="btn btn-lg btn-primary btn_home">Comprar Boletos</a>
            </div>
        </section>
        <section class="txt1" id="preguntas">
            <div class="div_title1">
                <h1 class="txt_title">PREGUNTAS FRECUENTES</h1>
            </div>
            <div class="div_txt1">
                <div class="container container_txt">
                     <h3 class="title1">¿CÓMO SE ELIGE A LOS GANADORES?</h3>
                    <p class="txt2">Todos nuestros sorteos se realizan con base en la Elección de números Aleatorios.</p>
                    <p class="txt2">El ganador de Rifas LEMT será el participante cuyo número de boleto coincida con el número que allá salido en el sorteo (las fechas serán publicadas en nuestra página oficial).</p>
                    <h3 class="title1 title2">¿QUÉ SUCEDE CUANDO EL NÚMERO GANADOR ES UN BOLETO NO VENDIDO?</h3>
                    <p class="txt2">El valor del Premio será sumado a la siguiente rifa, realizando la misma dinámica en otra fecha (se anunciará la nueva fecha).</p>
                    <p class="txt2">Esto significa que, ¡Tendrías la oportunidad de ganar más en el próximo sorteo!</p>
                    <h3 class="title1 title2">¿DÓNDE SE PUBLICA A LOS GANADORES?</h3>
                    <p class="txt2">¡En Esta misma página se publicarán los ganadores en cada sorteo y puedes encontrar todos y cada uno de nuestros sorteos anteriores, así como las transmisiones en vivo y las entregas de premios a los ganadores!</p>
                    <hr class="hr1"/>
                    
                        <a href="https://wa.me/{{session('whatsapp')}}?text=Hola!%20En%20que%20le%20puedo%20ayudar" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico_what">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                    <path fill-rule="nonzero" d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z"/>
                                </g>
                            </svg></a>
                            <!--
                        <a href="https://www.facebook.com/rifasbien" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico_face">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
                                </g>
                            </svg></a>-->
                    </div>
                </div>
            </div>
            <div class="div_title1" id="nosotros">
                <h1 class="txt_title">ACERCA DE NOSOTROS</h1>
            </div>
            <div class="div_txt2">
                <img src="{{asset('images/rif.jpeg')}}" class="img_txt2">
                <h2 class="txt4 txt5 text-primary">SORTEOS ENTRE AMIGOS EN BASE A LOTERIA del Tachira</h2>
                <h2 class="txt4 text-primary">¡ARRIESGA POCO Y GANA MUCHO!</h2>
            </div>
            <div class="div_title1" id="contacto">
                <h1 class="txt_title">CONTÁCTANOS</h1>
            </div>
            <div class="div_txt1">
                <div class="container container_txt">
                    <a href="" class="link1"><h3 class="title1">WHATSAPP: +{{session('whatsapp')}}</h3></a>
                    <div class="ico_rrss">
                        <a href="https://wa.me/{{session('whatsapp')}}?text=Hola!%20En%20que%20le%20puedo%20ayudar" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico_what">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                    <path fill-rule="nonzero" d="M2.004 22l1.352-4.968A9.954 9.954 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.954 9.954 0 0 1-5.03-1.355L2.004 22zM8.391 7.308a.961.961 0 0 0-.371.1 1.293 1.293 0 0 0-.294.228c-.12.113-.188.211-.261.306A2.729 2.729 0 0 0 6.9 9.62c.002.49.13.967.33 1.413.409.902 1.082 1.857 1.971 2.742.214.213.423.427.648.626a9.448 9.448 0 0 0 3.84 2.046l.569.087c.185.01.37-.004.556-.013a1.99 1.99 0 0 0 .833-.231c.166-.088.244-.132.383-.22 0 0 .043-.028.125-.09.135-.1.218-.171.33-.288.083-.086.155-.187.21-.302.078-.163.156-.474.188-.733.024-.198.017-.306.014-.373-.004-.107-.093-.218-.19-.265l-.582-.261s-.87-.379-1.401-.621a.498.498 0 0 0-.177-.041.482.482 0 0 0-.378.127v-.002c-.005 0-.072.057-.795.933a.35.35 0 0 1-.368.13 1.416 1.416 0 0 1-.191-.066c-.124-.052-.167-.072-.252-.109l-.005-.002a6.01 6.01 0 0 1-1.57-1c-.126-.11-.243-.23-.363-.346a6.296 6.296 0 0 1-1.02-1.268l-.059-.095a.923.923 0 0 1-.102-.205c-.038-.147.061-.265.061-.265s.243-.266.356-.41a4.38 4.38 0 0 0 .263-.373c.118-.19.155-.385.093-.536-.28-.684-.57-1.365-.868-2.041-.059-.134-.234-.23-.393-.249-.054-.006-.108-.012-.162-.016a3.385 3.385 0 0 0-.403.004z"/>
                                </g>
                            </svg></a>
                            <!--
                        <a href="https://www.facebook.com/rifasbien" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em" class="ico_face">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
                                </g>
                            </svg></a>-->
                    </div>
                </div>
            </div>
            <div class="div_title1">
                <a href="" class="link1"><div class="div_link1">
                        <h3 class="txt_title1">PREGUNTAS AL WHATSAPP</h3>
                        <h3 class="txt_title1">+{{session('whatsapp')}}</h3>
                    </div></a>
            </div>
        </section>
        <footer class="footer">
            <a href="" class="link1"><h4 class="txt6">Sitio desarrollado por:  Sublime by Concept</h4></a>
            <a href="{{asset('pdf/AVISO PRIVACIDAD.pdf')}}" target="_blank" class="link1"><h4 class="txt6">Aviso de privacidad</h4></a>
        </footer>
    </body>
</html>
