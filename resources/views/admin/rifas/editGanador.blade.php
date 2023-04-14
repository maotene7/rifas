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
                                <form action="{{route('winners.update', $winners->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="sorteo" value="{{$rifa->id}}">
                                    <div class="form-row">
                                        <div class="col-lg-5 col-md-5 col-xl-5 mb-3">
                                            <label for="validationDefault01">Lugar de Premio:</label>
                                            <input type="text" name="position" class="form-control" id="validationDefault01" value="{{$winners->position}}"  required=""/>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">Numero ganador:</label>
                                            <input type="number" name="number" class="form-control" id="validationDefault02" value="{{$winners->winning_number}}" er="1" required=""/>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">% de ganancia:</label>
                                            <input type="number" name="porciento" class="form-control" id="validationDefault02" value="{{$winners->porciento}}" required=""/>
                                        </div>
                                         <div class="col-lg-2 col-md-2 col-xl-2 mb-3" >
                                            <label for="validationDefault02">Premio:</label>
                                            <input type="text" name="premio" class="form-control" id="resultado" value="{{$winners->premio}}" />
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary btn-send mt-3" type="submit">Actualizar Ganador</button>
                                </form>                                 
                            </div>
                        </div>
                                                 
                    </div>
                </div>
                <!-- fin de contenido-->
                </div>

                
                                
            </div>
        </div>
@endsection