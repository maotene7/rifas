@extends('layouts.appadmin')

@section('content')
<div class="row row-main">
            <div class="col-lg-2 col-md-2 col-space col-xl-2"> 
</div>
            <div class="col-md main1">
                <div class="title4">
                    <h5 class="txt-title1">Administrar Perfil</h5>
                </div>
                @if (session('mensaje'))
                        <div class="contaniner alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                             @elseif(session('mensaje1'))     
                             <div class="contaniner alert alert-danger">
                               {{ session('mensaje1') }}
                             </div>                 
                    @endif  
                <div class="row row-panel1 row-panel4">
                    @include('menu')

                     
                    <!-- contenido de crear-->
                    <form action="{{route('perfils.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      @if(Auth::user()->rol == 1)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                              <img src="{{asset('img/perfil/'.Auth::user()->ico)}}" class="card-img-top img-fluid" alt="..." >
                              <div class="card-body">
                                <h5 class="card-title">Cambiar Ico</h5>
                                <div class="input-group mb-3">
                                  
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="ico" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                              <img src="{{asset('img/perfil/'.Auth::user()->logo)}}" class="card-img-top img-fluid" alt="..." >
                              <div class="card-body">
                                <h5 class="card-title">Cambiar logo</h5>
                                <div class="input-group mb-3">
                                  
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="logo" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                              <img src="{{asset('img/perfil/'.Auth::user()->img)}}" class="card-img-top img-fluid" alt="..." >
                              <div class="card-body">
                                <h5 class="card-title">Cambiar Portada</h5>
                                <div class="input-group mb-3">
                                  
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                        </div>
                        
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                              <div class="card-body">
                                <h5 class="card-title">Cambiar Numero de Whatsapp</h5>
                                <div class="input-group flex-nowrap">
                                  
                                  <input type="text" class="form-control" name="whatsapp" value="{{Auth::user()->whatsapp}}"  placeholder="+00000000" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                              <div class="card-body">
                                <h5 class="card-title">Cambiar Correo</h5>
                                <div class="input-group flex-nowrap">
                                  
                                  <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" aria-label="Username" aria-describedby="addon-wrapping" @if(Auth::user()->rol != 1)readonly @endif>
                                </div>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                              <div class="card-body">
                                <h5 class="card-title">Cambiar Nombre</h5>
                                <div class="input-group flex-nowrap">
                                  
                                  <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" aria-label="Username" aria-describedby="addon-wrapping">
                                </div>
                                
                              </div>
                            </div>
                        </div>
                    </div>
                <button class="btn btn-primary btn-send mt-3" type="submit">Actualizar evento</button>
                <!-- fin de contenido-->
                
                </form>
                </div>

                
            </div>
        </div>



@endsection

