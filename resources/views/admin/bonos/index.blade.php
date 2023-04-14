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
                                    <h5 class="txt-title1">Registrar Bonos</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <form action="{{route('bonos.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                   
                                    <div class="form-row">
                                        <div class="col-lg-12 col-md-12 col-xl-12 mb-3">
                                            <label for="validationDefault01">IMG:</label>
                                            <input type="file" name="img" class="form-control" id="validationDefault01" placeholder="Precios de boletos"  required=""/>
                                        </div>
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Rifas </label>
                                        <select name="sorteo" class="form-control" id="exampleFormControlSelect1">
                                          @foreach($rifas as $rifa)
                                      
                                      <option value="{{$rifa->id}}">{{$rifa->premio}}</option>
                                      @endforeach
                                        </select>
                                      </div>
                                    
                                    
                                    <button class="btn btn-primary btn-send mt-3" type="submit">Agregar bono</button>
                                </form>                                 
                            </div>
                        </div>
                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Administrar Bonos</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                @php $i = 1; @endphp
                                @foreach($bonos as $bono)
                                <div class="row row-admin1">
                                    <div class="col-panel4 col-span1">
                                        <span>{{$i}}</span> 
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-panel1 col-panel4 col-xl-3">
                                        <label class="txt-label txt-label2">
                                            <img class="img-fluid w-50 " src="{{asset('public/img/bonos/'.$bono->img)}}">
                                        </label>                                         
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-xl-3">
                                        
                                        <a href="{{route('bonos.edit', $bono->id)}}" >
                                        <i class="bi bi-pencil-square text-warning"></i>             
                                        </a>
                                        <a href="{{route('bonos.destroy', $bono->id)}}" >
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

