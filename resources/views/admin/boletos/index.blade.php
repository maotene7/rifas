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
                                    <h5 class="txt-title1">Administrar Boletos 
                                        @if(Auth::user()->rol == 1)
                                        <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                            Imprimir Participantes
                                          </button>
                                          <div class="dropdown-menu">
                                            @foreach($rifas as $rifa)
                                            <a class="dropdown-item" href="{{route('imprimir', $rifa->id)}}">{{$rifa->premio}}</a>
                                            
                                            @endforeach
                                          </div>
                                        </div>
                                        @endif
                                    </h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                @php $i = 1; @endphp
                                @foreach($boletes as $bolete)
                                <div class="row row-admin1">
                                    <div class="col-panel4 col-span1">
                                        <span>{{$i}}</span> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-panel1 col-panel4 col-xl-3">
                                        <label class="txt-label txt-label2">{{$bolete->premio}}</label>                                         
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-panel1 col-panel4 col-xl-2">
                                        <label class="txt-label txt-label2">{{$bolete->number}}</label>                                         
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-panel1 col-panel4 col-xl-2">
                                        <label class="txt-label txt-label2">
                                            
                                           <a href="{{route('usuarios.index', ['id_us'=>$bolete->id_us, 'sorteo'=>$bolete->sorteo])}}">
                                            @if(Auth::user()->rol == 1)
                                                {{$bolete->nombres}} {{$bolete->apellidos}}
                                                @else
                                                Todo los boletos
                                            @endif
                                            </a> 
                                           
                                        </label>
                                                                                 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xl-3">
                                        @if(Auth::user()->rol == 1)
                                        <a class="text-primary" href="{{route('boletos.edit', ['boleto'=>$bolete->id])}}" >
                                            @if($bolete->status == '1')
                                            <i class="bi bi-check-square-fill text-primary" title="Desaprobar"></i>
                                            @else
                                            <i class="bi bi-check-square-fill text-dark" title="aprobar"></i>
                                            @endif
                                        </a>
                                        <!--
                                        <a href="{{route('boletos.edit', $bolete->id)}}" >
                                        <i class="bi bi-pencil-square text-warning"></i>             
                                        </a>-->
                                        <a href="{{route('boletos.destroy', $bolete->id)}}" >
                                        <i class="bi bi-file-x-fill text-danger" title="ELIMINAR"></i>                                        
                                        </a>
                                        @endif                                    
                                    </div>
                                </div>
                                @php $i++; @endphp
                                @endforeach
                            </div>
                        </div>                         
                    </div>
                    <div class="d-flex justify-content-center">{{$boletes}}</div>
                </div>

                
                <!-- fin de contenido-->
                </div>

                
                                
            </div>
        </div>
@endsection