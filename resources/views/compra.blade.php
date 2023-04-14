@extends('layouts.appprin')

@section('contentenido')

        <script type="text/javascript">
            function tengoQueMostrarBoton() {
              var elementos = $('input.miOpcion');
              var algunoMarcado = elementos.toArray().find(function(elemento) {
                 return $(elemento).prop('checked');
              });
              
              if(algunoMarcado) {
                $('#miBoton').show();
              } else {
                $('#miBoton').hide();
              }
            }
        </script>

        <script type="text/javascript">
            $(document).ready(function() {

              $('[name="number[]"]').click(function() {
                  
                var arr = $('[name="number[]"]:checked').map(function(){
                  return this.value;
                }).get();
                    

                var str = arr.join('  ');
                
                $('#arr').text(JSON.stringify(arr));
                
                $('#str').text(str);
              
              });

            });

            

            
        </script>

        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


       <?php 
                                use App\Models\usuario;
                                ?>
    @foreach($rifas as $rifa)
        <section class="info1">
            <h3 class="title3">{{$rifa->premio}}</h3>
            
            <h3 class="title3">{{ Carbon\Carbon::parse($rifa->fecha_sorteo)->format('d M Y') }}</h3>
        </section>
        <section class="info2">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-down-fill ico_down" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <h3 class="title4">LISTA DE BOLETOS  ABAJO</h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-down-fill ico_down" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </section>
        <section class="img_premio">
            <img src="{{asset('img/level/'.$rifa->img)}}" class="img_premio1 img-fluid">
        </section>
        @if($ganadores != '[]')
        <section class="d-flex justify-content-center alert alert-success">
            <div>
                 <h1>Ganadores del Sorteo</h1>
                <hr>
            @foreach($ganadores as $winner)
                <div class="row my-2">
                    <div class="col">{{$winner->position}}</div>
                    <div class="col">
                        {{str_pad($winner->winning_number,5, '0', STR_PAD_LEFT)}}
                    </div>

                    <div class="col">
                         @if($winner->id_user == 'No Hubo Ganador')
                                                 {{$winner->id_user}}
                                                 @else
                                                     <?php
                                                        $us = usuario::where('id', $winner->id_user)->first();
                                                     ?>
                                                     {{$us->nombres}} {{$us->apellidos}}
                                            @endif
                    </div>
                    
                    <div class="col">
                        {{$winner->premio}}
                    </div>
                    
                </div>
                <hr>
            
            @endforeach
            </div>
        </section>
        @endif
        <section class="info1">
            @foreach($precios as $precio)
            <h3 class="title5">{{$precio->description}} por {{$precio->precio}} USDT</h3>
            @endforeach
        </section>
        <section class="info3 d-flex justify-content-center">
            @if($bono != '')
            <img src="{{asset('img/bonos/'.$bono->img)}}" class=" img_premio1 img-fluid">
            @endif
        </section>
        <section class="info1 info1_flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-down-fill ico_down ico_down2" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
            <div>
                <h3 class="title3">HAZ CLICK ABAJO EN TU</h3>
                <h3 class="title3">NÚMERO DE LA SUERTE</h3>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-down-fill ico_down ico_down2" viewBox="0 0 16 16">
                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
        </section>
        @php 
            $res = $rifa->bole_adi;

        @endphp
        <div class="div_title1 fixed-top container" id="miBoton" style="display:none;">
           
                <div class="div_link1 d-flex justify-content-center ">
                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                      APARTAR
                    </button>
                </div>
                <div class="d-flex justify-content-center mt-4"><apan id="str" class="numb2"></span></div>
                
    <p class="p d-flex justify-content-center mt-3 text-white"></p>
    <p class=" d-flex justify-content-center mt-3 text-white"> Por cada numero seleccionado, tendras {{$res}} boletos aleatorios adicionales</p>


    
        </div>

        
        
        <section class="search">
            <form action="{{route('buscar.create')}}" method="GET">
                @csrf
            <div class="div_search">

                <input type="hidden" name="sorteo" value="{{$rifa->id}}">
                  <input type="number" name="number" class="form-control input1" placeholder="buscar" aria-label="Buscar" aria-describedby="basic-addon2" required>
                  <div class="input-group-append">
                    <button type="submit" style="margin-left: -2.5rem;" class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></button>
                  </div>
                 
            </div> 
        </form>
            <div class="div_search">
                <button type="button" data-toggle="modal" data-target="#exampleModalmaquina" class="btn btn-mqn btn-outline-primary">Maquinita de la suerte</button>
            </div>
        </section>
        @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                             @elseif(session('mensaje1'))     
                             <div class="alert alert-danger">
                               {{ session('mensaje1') }}
                             </div>                 
                    @endif  
        <section class="lista_number">
            <div class="container container_list" >
                

                <form action="{{route('boletos.store')}}" method="POST">
                    @csrf
                <div class="row row_list">
                    
                    
                    @for ($i=$rifa->del; $i <= $rifa->hasta; $i++)  
                        <div class="col-2 col-md-auto col_list">
                            <label class="">
                            <input type="checkbox" class="miOpcion CheckedAK" name="number[]" value="{{str_pad($i,5, '0', STR_PAD_LEFT)}}" onclick="tengoQueMostrarBoton()"
                            @foreach($boletos as $boleto)
                                @if($boleto->number == $i)
                                    disabled
                                @endif
                            @endforeach
                            >
                                <p class="
                                number1 
                                @foreach($boletos as $bol)
                                    @if($bol->number == $i)
                                    
                                    bg-dark
                                    @endif
                                @endforeach
                                    ">{{str_pad($i,5, '0', STR_PAD_LEFT)}}</p>

                            </label>                 
                        </div>
                    @endfor
                    
                    <input type="hidden" name="sorteo" value="{{$rifa->id}}">

        <div class="modal pg-show-modal fade" id="exampleModal">
            <div class="modal-dialog modal2" role="document">
                <div class="modal-content modal2">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="x">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body modal1">
                        <h2 class="txt_modal1 txt_modal3 my-4">LLENA TUS DATOS Y DA CLICK EN APARTAR</h2>
                        
                        <div class="form-group">
                            <input type="text" name="whatsapp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Numero de whatsapp" required>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombres" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre(s)" required>
                            
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellidos" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="apellidos" required>
                            
                        </div>
                        <div class="form-group">
                            
                            <select name="estado" class="form-control" id="exampleFormControlSelect1" required>
                              <option>SELECCIONA ESTADO</option>
                              <option value="Aguascalientes">Aguascalientes</option>
                              <option value="Baja California">Baja California</option>
                              <option value="Baja California Sur">Baja California Sur</option>
                              <option value="Campeche">Campeche</option>
                              <option value="Chiapas">Chiapas</option>
                              <option value="Chihuahua">Chihuahua</option>
                              <option value="Coahuila">Coahuila</option>
                              <option value="Colima">Colima</option>
                              <option value="Ciudad de México / CDMX">Ciudad de México / CDMX</option>
                              <option value="Estado de México">Estado de México</option>
                              <option value="Guanajuato">Guanajuato</option>
                              <option value="Guerrero">Guerrero</option>
                              <option value="Hidalgo">Hidalgo</option>
                              <option value="Jalisco">Jalisco</option>
                              <option value="Michoacán">Michoacán</option>
                              <option value="Morelos">Morelos</option>
                              <option value="Nayarit">Nayarit</option>
                              <option value="Nuevo León">Nuevo León</option>
                              <option value="Oaxaca">Oaxaca</option>
                              <option value="Puebla">Puebla</option>
                              <option value="Querétaro">Querétaro</option>
                              <option value="Quintana Roo">Quintana Roo</option>
                              <option value="San Luis Potosí">San Luis Potosí</option>
                              <option value="Sinaloa">Sinaloa</option>
                              <option value="Sonora">Sonora</option>
                              <option value="Tabasco">Tabasco</option>
                              <option value="Tamaulipas">Tamaulipas</option>
                              <option value="Tlaxcala">Tlaxcala</option>
                              <option value="Veracruz">Veracruz</option>
                              <option value="Yucatán">Yucatán</option>
                              <option value="Zacatecas">Zacatecas</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="codigo_pro" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Codigo de Referencia (En caso de tenerlo)" >
                            
                        </div>

                        <div class="number2 txt_modal2">
                            <span class="txt_modal1">¡Al finalizar serás redirigido a whatsapp para enviar la información de tu boleto!</span>
                        </div>
                        
                        <div class="number2 txt_modal4">
                            <p class="txt_modal1 txt_modal3">Tu boleto sólo dura 24 horas apartado</p>
                        </div>
                        
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="submit" class="btn btn-primary">
                      APARTAR
                    </button>
</div>
                </div>
            </div>
        </div>
                    
                </div>
                </form>
            </div>
        </section>

        @php
            $v = $rifa->hasta +($rifa->hasta*$rifa->bole_adi)
        @endphp
        <input type="hidden" id="hasta" value="{{$rifa->hasta}}">
        <input type="hidden" id="valor" value="{{$v}}">

    @endforeach

 <!-- Modal -->
<div class="modal fade" id="exampleModalmaquina" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title " id="exampleModalLabel">Maquina de la Suerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('Maquina.store')}}" method="POST">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="rifa" value="{{$rifa->id}}">
        <div class="form-group row bolet">
            <label for="inputPassword" class="col-sm-3 col-form-label">BOLETOS A GENERAR:</label>
            <div class="col-sm-9">
              <select name="cant_boleto" class="form-control form-control-lg">
                  <option value="1">1 Boleto</option>
                  <option value="2">2 Boleto</option>
                  <option value="3">3 Boleto</option>
                  <option value="4">4 Boleto</option>
                  <option value="5">5 Boleto</option>
                  <option value="6">6 Boleto</option>
                  <option value="7">7 Boleto</option>
                  <option value="8">8 Boleto</option>
                  <option value="9">9 Boleto</option>
                  <option value="10">10 Boleto</option>
                  <option value="20">20 Boleto</option>
                  <option value="30">30 Boleto</option>
                  <option value="50">50 Boleto</option>
                  <option value="100">100 Boleto</option>
                  
                </select>
            </div>
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Generar Boletos</button>
      </div>
      </form>
    </div>
  </div>
</div>
   


<script>
    
    $(document).click(function() { //Creamos la Funcion del Click

        input = document.getElementById('resultado');

                var checked = $(".CheckedAK:checked").length; //Creamos una Variable y Obtenemos el Numero de Checkbox que esten Seleccionados
                $(".p").text( checked + " BOLETO SELECCIONADO " ); //Asignamos a la Etiqueta <p> el texto de cuantos Checkbox ahi Seleccionados(Combinando la Variable)
                $(".inp").text( checked + " BOLETO SELECCIONADO " );

                //document.getElementById("resultado").value = checked;
               
            })
            .trigger("click"); //Simulamos el Evento Click(Desde el Principio, para que muestre cuantos ahi Seleccionados)

 
</script>



        @endsection
