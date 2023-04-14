<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>GDL</title>
        <!-- icon -->
        <link  rel="icon"   href="{{asset('images/logo_rifa.png')}}" type="image/png" />
        <!-- Bootstrap core CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alexandria:100,200,300,400,500,600,700,800,900&display=swap">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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

        <img class="btn-whatsapp" src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/523338228856?text=Hola!%20En%20que%20le%20puedo%20ayudar'">
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <header class="header2">
            <div class="container container_menu1">
                <div class="div_logo">
                    <img src="{{asset('images/logo_rifa.png')}}" class="logo1">
                    <img src="{{asset('images/txt_logo.jpg')}}" class="txt_logo">
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
                        <a href="" class="link1 link2">Preguntas Frecuentes</a>
                        <a href="" class="link1 link2">Nosotros</a>
                        <a href="" class="link1 link2">Contacto</a>
                        <a href="{{url('verification')}}" class="link1 link2">Verificar Boletas</a>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="info1">
            @if (session('mensaje'))
                        <div class="alert alert-success container">
                            {{ session('mensaje') }}
                        </div>
                             @elseif(session('mensaje1'))     
                             <div class="alert alert-danger container">
                               {{ session('mensaje1') }}
                             </div>                 
                    @endif 
            <h3 class="title3">{{$usuario->nombres}} {{$usuario->apellidos}}</h3>
            
            <h3 class="title3">Mis numeros</h3>
 
            <div class="row row_list">
                @foreach($boletes as $boleto)
                    <div class="col-2 col-md-auto col_list">

                        <label class="number1">{{$boleto->number}}</label>                         
                    </div>
                    @endforeach
                </div>
        </section>

        <div class="d-flex justify-content-center my-5">
            <h3 class="title5">Comunicate con nosotros para pagar tus boletos</h3>
        </div>
        <div class="d-flex justify-content-center my-5">
             
            <img  src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/523338228856?text=Hola!%20En%20que%20le%20puedo%20ayudar'">
        </div>
        

   

        

    </body>
</html>
