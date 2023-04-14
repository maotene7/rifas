@extends('layouts.appadmin')

@section('content')
<div class="row row-main">
            <div class="col-lg-2 col-md-2 col-space col-xl-2"> 
</div>
            <div class="col-md main1">
                <div class="title4">
                    <h5 class="txt-title1">Verificación de Boletos</h5>
                </div>
                <div class="row row-panel1 row-panel4">

                     @if (session('mensaje'))
                        <div class="contaniner alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                             @elseif(session('mensaje1'))     
                             <div class="contaniner alert alert-danger">
                               {{ session('mensaje1') }}
                             </div>                 
                    @endif  
                    <!-- contenido de crear-->
                <div class="col-lg-12 col-md-12 col-panel2 col-xl-12">
                        
                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1"> PARA {{$rifa->premio}} 
                                       
                                    </h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <form action="{{route('buscar.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="sorteo" value="{{$rifa->id}}">
                                    <div class="input-group mb-3">
                                      <input type="number" name="number" class="form-control" placeholder="00" aria-label="Recipient's username" aria-describedby="button-addon2">
                                      <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Verificar</button>
                                      </div>
                                    </div>
                                </form> 
                                
                                
                            </div>
                        </div>                         
                    </div>

                    @if(isset($boletos))
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Numeros</th>
                          <th scope="col">Oportunidades</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Pagado</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <th scope="row">

                              @foreach($boletos as $bol)
                                {{$bol->number}}
                              @endforeach
                          </th>
                          <td>
                             @foreach($boletos_aleatorio as $bol_ale)
                                {{$bol_ale->number}}
                              @endforeach
                          </td>
                          <td>{{$usuario->nombres}}</td>
                          <td>{{$usuario->apellidos}}</td>
                          <td>{{$usuario->estado}}</td>

                          <td class="@if($bol->status == '1')bg-success @else bg-danger @endif">
                            @if($bol->status == '1')
                                SI
                                @else
                                NO
                            @endif
                          </td>
                        </tr>
    
                      </tbody>
                    </table>
                    @endif


                    
                </div>

                
                <!-- fin de contenido-->
                </div>

                
                                
            </div>
        </div>
@endsection