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


        
      

        <section class="info1">
            <h3 class="title3">Busqueda de Boletos </h3>
            
            
        </section>

        <div class="div_title1 container" id="miBoton" >
           <form action="{{route('boletos.store')}}" method="POST">
                    @csrf
                <div class="div_link1 d-flex justify-content-center ">
                    <button type="button"  class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" >
                      APARTAR
                    </button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                   
                   <div class="container " >
                    <div class="row row_list">
                    
                    
                    @for ($i=0; $i < $cant; $i++)  
                        <div class="col-2 col-md-auto col_list mx-2">
                            <label class="p-2 " style="background: white;border-radius: 20px;">
                            <input type="checkbox" checked class="number1" name="number[]" value="{{str_pad($sele_aleat[$i],5, '0', STR_PAD_LEFT)}}"
                            
                            > 
                                
                                
                                    {{str_pad($sele_aleat[$i],5, '0', STR_PAD_LEFT)}}

                            </label>                  
                        </div>
                    @endfor
 
                     <input type="hidden" name="sorteo" value="{{$rifa}}">

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
                            <input type="text" name="codigo_pro" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Codigo de Referencia" >
                            
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
            </div>
                
    
    


    
        </div>
    </form>
</div>
    
 @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                             @elseif(session('mensaje1'))     
                             <div class="alert alert-danger">
                               {{ session('mensaje1') }}
                             </div>                 
                    @endif  
<section class="search">
            <form action="{{route('buscar.create')}}" method="GET">
                @csrf
            <div class="div_search">

                @for ($i=0; $i < $cant; $i++)  
                        
                            <input type="hidden"  class="" name="sele_aleat[]" value="{{str_pad($sele_aleat[$i],5, '0', STR_PAD_LEFT)}}"
                            
                            > 
                               

                           
                    @endfor

                <input type="hidden" name="sorteo" value="{{$rifa}}">
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