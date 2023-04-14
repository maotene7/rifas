@extends('layouts.appadmin')

@section('content')
<div class="row row-main">
            <div class="col-lg-2 col-md-2 col-space col-xl-2"> 
</div>
            <div class="col-md main1">
                <div class="title4">
                    <h5 class="txt-title1">Administrar Dashboard</h5>
                </div>
                <div class="row row-panel1 row-panel4">
                    @if(Auth::user()->rol == 1)
                            @include('menu')
                        @else
                            @include('menu_cliente')
                    @endif


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
                                    <h5 class="txt-title1">Rifa {{$rifa->premio}}</h5>
                                </div>                                 
                            </div>
                            @if(Auth::user()->rol == 1)
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                               <a href="{{route('usuarios.edit', ['usuario' => $usuario->id, 'sorteo'=> $rifa->id])}}"><i class="bi bi-check-square-fill text-primary" style="font-size: 7rem;" title="aprobar Todo"></i></a> 
                               <a href="{{route('usuarios.destroy', ['usuario' => $usuario->id, 'sorteo'=> $rifa->id])}}" >
                                        <i class="bi bi-file-x-fill text-danger" style="font-size: 7rem;" title="ELIMINAR TODO"></i></a>

                                 
                            </div>
                            @endif
                        </div>   

                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Boletos de {{$usuario->nombres}} {{$usuario->apellidos}}</h5>
                                    <p>Whatsapp: {{$usuario->whatsapp}}</p>
                                    <p>Estado: {{$usuario->estado}}</p>
                                    <p>Codigo promocional:{{$usuario->codigo_pro}}</p>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                @php $i = 1; @endphp
                                
                                <div class="card">
                                  <div class="card-body">
                                    @foreach($boletos as $bolete)
                                    {{$bolete->number}} - 
                                    @endforeach
                                  </div>
                                </div>
                                
                            </div>
                        </div>   


                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Boletos aleatorios</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                @php $i = 1; @endphp
                                
                                <div class="card">
                                  <div class="card-body">
                                    @foreach($boletos_aleatorio as $bol_ale)
                                    {{$bol_ale->number}} - 
                                    @endforeach
                                  </div>
                                </div>
                                
                            </div>
                        </div>                       
                    </div>
                    
                <div class="d-flex justify-content-center"></div>
                <!-- fin de contenido-->
                </div>
                </div>


                
                                
            </div>
        </div>
@endsection