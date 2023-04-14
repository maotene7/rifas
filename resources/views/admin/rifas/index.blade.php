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
                    @include('menu')

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
                                    <h5 class="txt-title1">Administrar Rifas</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                @php $i = 1; @endphp
                                @foreach($rifas as $rifa)
                                <div class="row row-admin1">
                                    <div class="col-panel4 col-span1">
                                        <span>{{$i}}</span> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-panel1 col-panel4 col-xl-3">
                                        <a href="{{route('Contadores.index', ['sorteo'=>$rifa->id])}}" class="txt-label txt-label2">{{$rifa->premio}}</a>                                         
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-panel1 col-panel4 col-xl-2">
                                        <label class="txt-label txt-label2">{{$rifa->del}} - {{$rifa->hasta}}</label>                                         
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-panel1 col-panel4 col-xl-2">
                                        <label class="txt-label txt-label2">
                                            Fecha: {{$rifa->fecha_sorteo}}
                                        </label>
                                                                                 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-xl-3">
                                        <a href="{{route('winners.create', ['rifa' =>$rifa->id])}}" class="badge badge-success">Ganadores</a>
                                        <a href="{{route('rifas.status', ['rifa'=>$rifa->id])}}">
                                            @if($rifa->status == '1')
                                            <i class="bi bi-check-square-fill text-primary" title="Desactiva"></i>
                                            @else
                                            <i class="bi bi-check-square-fill text-dark" title="Activa"></i>
                                            @endif
                                        </a>

                                        <a href="{{route('precios.index', ['id'=>$rifa->id])}}"><i title="Precios" class="bi bi-cash-coin text-success"></i></a>
                                        
                                        
                                        <a href="{{route('rifas.edit', $rifa->id)}}" >
                                        <i class="bi bi-pencil-square text-warning" title="Editar"></i>             
                                        </a>
                                        <a href="{{route('rifas.destroy', $rifa->id)}}" >
                                        <i class="bi bi-file-x-fill text-danger" title="Eliminar"></i>                                        
                                        </a>
                                                                                 
                                    </div>
                                </div>
                                @php $i++ @endphp
                                @endforeach
                            </div>
                        </div>                         
                    </div>
                </div>
                <!-- fin de contenido-->
                </div>

                
                                
            </div>
        </div>
@endsection