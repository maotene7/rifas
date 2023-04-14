@extends('layouts.appprin')

@section('contentenido')

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
            <h3 class="title3">SORTEOS ACTIVOS</h3>
            
            <h3 class="title3"></h3>
        </section>

    @foreach($rifas as $rifa)
    <section class="img_premio">
         <img src="{{asset('img/level/'.$rifa->img)}}" class="img_premio1 img-fluid">

        @foreach($bonos as $bono)
           @if($rifa->id == $bono->sorteo)
            <img src="{{('img/bonos/'.$bono->img)}}" class=" img-fluid d-flex justify-content-center">
            @endif
        @endforeach
    </section>
    

         <section class="mb-5 d-flex justify-content-center">
            <a href="{{route('comprarboletos.show', ['id'=> $rifa->id])}}" class="btn btn-primary">Participar</a>
        </section>
     

    
    @endforeach
        

   
        @endsection
