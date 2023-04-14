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
                                    <h5 class="txt-title1">Promocional</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <form action="{{route('promocionals.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">
                                        <div class="col-lg-7 col-md-7 col-xl-7 mb-3">
                                            <label for="validationDefault01">Nombre :</label>
                                            <input type="text" name="name" class="form-control" id="validationDefault01" placeholder="Nombre completo"  required=""/>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-xl-5 mb-3">
                                            <label for="validationDefault02">codigo:</label>
                                            <input type="text" name="codigo" class="form-control" id="validationDefault02" placeholder="KAI876" required=""/>
                                        </div>
                                    </div>
                                    
                                    
                                    <button class="btn btn-primary btn-send mt-3" type="submit">Agregar Datos</button>
                                </form>                                 
                            </div>
                        </div>
                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Administrar </h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                @php $i = 1; @endphp
                                @foreach($promocional as $promo)
                                <div class="row row-admin1">
                                    <div class="col-panel4 col-span1">
                                        <span>{{$i}}</span> 
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-panel1 col-panel4 col-xl-3">
                                        <label class="txt-label txt-label2">
                                            {{$promo->codigo}}</p>
                                        </label>                                         
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xl-4">
                                        <a href="{{route('promocionals.create', ['id'=>$promo->id])}}">{{$promo->name}}</a>
                                        
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-xl-3">
                                        
                                        <a href="{{route('promocionals.edit', $promo->id)}}" >
                                        <i class="bi bi-pencil-square text-warning"></i>             
                                        </a>
                                        <a href="{{route('promocionals.destroy', $promo->id)}}" >
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

