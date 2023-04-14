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
                                    <h5 class="txt-title1">Rifa {{$rifa->premio}}</h5>
                                </div>                                 
                            </div>
                            
                        </div>   

                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Boletos de Apartados</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                
                                
                                <div class="card">
                                  <div class="card-body">
                                    {{$boletos_apartado}}
                                  </div>
                                </div>
                                
                            </div>
                        </div>   
                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Boletos de Comprados</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                
                                
                                <div class="card">
                                  <div class="card-body">
                                    {{$boletos_Comprado}}
                                  </div>
                                </div>
                                
                            </div>
                        </div>   

                        <div class="row row-panel2">
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <div class="title4">
                                    <h5 class="txt-title1">Boletos Por Comprar</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                
                                
                                <div class="card">
                                  <div class="card-body">
                                    {{$boletos_pendiente}}
                                  </div>
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
@endsection