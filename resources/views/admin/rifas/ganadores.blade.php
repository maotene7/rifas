@extends('layouts.appadmin')

@section('content')



<div class="row row-main">
            <div class="col-lg-2 col-md-2 col-space col-xl-2"> 
</div>
            <div class="col-md main1">
                <div class="title4">
                    <h5 class="txt-title1">Administrar Ganadores</h5>
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
                                    <h5 class="txt-title1">Registrar Ganadores en {{$rifa->premio}}</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <form action="{{route('winners.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="sorteo" value="{{$rifa->id}}">
                                    <div class="form-row">
                                        <div class="col-lg-5 col-md-5 col-xl-5 mb-3">
                                            <label for="validationDefault01">Lugar de Premio:</label>
                                            <input type="text" name="position" class="form-control" id="validationDefault01" placeholder="1 lugar"  required=""/>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">Numero ganador:</label>
                                            <input type="number" name="number" class="form-control" id="validationDefault02" placeholder="1" />
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">% de ganancia:</label>
                                            <input type="number" name="porciento" class="form-control" id="validationDefault02 val1" value="0" required=""/>
                                        </div>

                                        <div class="col-lg-2 col-md-2 col-xl-2 mb-3" >
                                            <label for="validationDefault02">Premio:</label>
                                            <input type="text" name="premio" class="form-control" id="resultado" value="0" />
                                        </div>
                                         
                                    </div>
                                    
                                    <button class="btn btn-primary btn-send mt-3" type="submit">Agregar Ganador</button>
                                </form>                                 
                            </div>
                        </div>
                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Administrar ganadores de {{$rifa->premio}}</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <?php 
                                use App\Models\usuario;
                                ?>
                                @php $i = 1; @endphp
                                @foreach($winners as $winner)
                                <div class="row row-admin1">
                                    <div class="col-panel4 col-span1">
                                        <span>{{$i}}</span> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-panel1 col-panel4 col-xl-3">
                                        <label class="txt-label txt-label2">{{$winner->position}}</label>                                         
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-panel1 col-panel4 col-xl-2">
                                        <label class="txt-label txt-label2">{{$winner->winning_number}}</label>                                         
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-panel1 col-panel4 col-xl-2">
                                        <label class="txt-label txt-label2">
                                        
                                           

                                            @if($winner->id_user == 'No Hubo Ganador')
                                                 {{$winner->id_user}}
                                                 @else
                                                     <?php
                                                        $us = usuario::where('id', $winner->id_user)->first();
                                                     ?>
                                                     {{$us->nombres}} {{$us->apellidos}}
                                            @endif
                                       
                                        </label>                                         
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-xl-3">
                                        
                                        <a href="{{route('winners.edit', $winner->id)}}">
                                        <i class="bi bi-pencil-square text-warning"></i>             
                                        </a>
                                        <a href="{{route('winners.destroy', $winner->id)}}">
                                        <i class="bi bi-file-x-fill text-danger"></i>                                        
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