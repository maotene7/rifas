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
                                    <h5 class="txt-title1">Actualizar datos Bancario</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <form action="{{route('pagos.update', $pagos->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                     <div class="form-row">
                                        <div class="col-lg-7 col-md-7 col-xl-7 mb-3">
                                            <label for="validationDefault01">Nombre :</label>
                                            <input type="text" name="nombre" class="form-control" id="validationDefault01" value="{{$pagos->nombre}}"  required=""/>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-xl-5 mb-3">
                                            <label for="validationDefault02">Cuenta:</label>
                                            <input type="text" name="cuenta" class="form-control" id="validationDefault02" value="{{$pagos->cuenta}}" required=""/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                         <div class="col-lg-12 col-md-12 col-xl-12 mb-3">
                                            <label for="exampleFormControlTextarea1">Instrucciones:</label>
                                            <textarea name="instru" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$pagos->instru}}</textarea>
                                        </div>
                                        
                                       
                                    </div>

                                   <img class="img-fluid" src="{{asset('img/pagos/'.$pagos->img)}}">
                                    <div class="form-row">
                                        <div class="col-lg-12 col-md-12 col-xl-12 mb-3">
                                            <label for="validationDefault01">cambiar IMG:</label>
                                            <input type="file" name="img" class="form-control" id="validationDefault01" />
                                        </div>
                                       
                                    </div>
                                    
                                    
                                    <button class="btn btn-primary btn-send mt-3" type="submit">Actualizar </button>
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

