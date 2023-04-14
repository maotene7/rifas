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
            <h3 class="title3">Boletos aleatorios</h3>
            
            
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
                   
                    <div class="row row_list">
                    
                    
                    @for ($i=0; $i < $cant; $i++) 
                        @if (isset($sele_aleat[$i]))  
                        <div class="col-2 col-md-auto col_list mx-2">
                            
                            <input type="checkbox" checked class="" name="number[]" value="{{$sele_aleat[$i]}}"
                            
                            > 
                                <p class="number1 mx-2 px-2
                                
                                    ">{{$sele_aleat[$i]}}</p>

                                            
                        </div>
                        @endif
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
                            <input type="text" name="codigo_pro" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Codigo de referencia" >
                            
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
    </form>
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