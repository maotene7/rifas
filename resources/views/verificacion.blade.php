@extends('layouts.appprin')

@section('contentenido')

        <section class="banner">
            <img src="{{asset('img/perfil/'.session('logo'))}}" class="banner_logo">
        </section>
        @if (session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                             @elseif(session('mensaje1'))     
                             <div class="alert alert-danger">
                               {{ session('mensaje1') }}
                             </div>                 
                    @endif 
        <section class="txt1">
            <div class="div_title1">
                <h1 class="txt_title">GENERA TU BOLETO</h1>
            </div>
            <div class="div_txt1">
                <div class="container container_txt">
                    <h3 class="title1">
                        @if(isset($rifa))
                        {{$rifa->premio}}
                        @endif
                    </h3>
                    <hr class="hr1 hr2"/>
                    <p class="title12">Introduce tu número de boleto y haz click en "Generar"</p>
                </div>
                <div class="div_ico2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-down-fill ico_down ico_down3" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </div>
                 @if(isset($rifa))
                <div class="container" >
                    <div class="row row_bolet1" >
                        <div class="col-md-8 col_pay" >
                            <div class="row row_bolet">
                                <div class="col-md-1 col_bolet ">
                                    <h3 class="txt-bolet1 d-none d-sm-none d-md-block">
                                        {{$rifa->premio}}
                                        
                                    </h3>
                                    <p class="d-sm-block d-md-none">{{$rifa->premio}}</p>                                      
                                </div>
                                <div class="col-md-10 col_bolet2" >
                                    <div class="logo4">
                                        <img src="{{asset('images/logoW.png')}}" class="logo5 img-fluid">
                                        
                                         
                                    </div>
                                    <div class="info_bolet" style="word-wrap: break-word;;">
                                        <div class="div_bolet1 div_bolet3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3 class="txt_bolet1">Boleto:</h3>
                                                </div>
                                                <div class="col-6">
                                                    
                                            <p class="" style="line-height: 90%;">
                                                <strong>
                                                    @foreach($boletos as $bol)
                                                     {{$bol->number}}
                                                    @endforeach
                                                </strong>
                                                
                                            </p>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    
                                        
                                    </div>
                                    @if(count($boletos_aleatorio) != '0')
                                    <div class="info_bolet" style="word-wrap: break-word;;">
                                        <div class="div_bolet1 div_bolet3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3 class="txt_bolet1">Boleto aleatorios:</h3>
                                                </div>
                                                <div class="col-6">
                                                    
                                            <p class="" style="line-height: 90%;">
                                                <strong>
                                                    @foreach($boletos_aleatorio as $bol_ale)
                                                     {{$bol_ale->number}}
                                                    @endforeach
                                                </strong>
                                                
                                            </p>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    
                                        
                                    </div>
                                    @endif
                                    <div class="client">
                                        <div class="row row_client">
                                            <div class="col-md-12 col_pay">
                                                <div class="pay_bank">
                                                    <div class="bank1">
                                                        <h4 class="txt_client">SORTEO:</h4>
                                                    </div>
                                                    <div class="bank2">
                                                        <label class="txt_client1">{{$rifa->premio}}</label>
                                                    </div>
                                                </div>
                                                <div class="pay_bank">
                                                    <div class="bank1">
                                                        <h4 class="txt_client">NOMBRE:</h4>
                                                    </div>
                                                    <div class="bank2">
                                                        <label class="txt_client1">{{$usuario->nombres}}</label>
                                                    </div>
                                                </div>
                                                <div class="pay_bank">
                                                    <div class="bank1">
                                                        <h4 class="txt_client">APELLIDOS:</h4>
                                                    </div>
                                                    <div class="bank2">
                                                        <label class="txt_client1">{{$usuario->apellidos}}</label>
                                                    </div>
                                                </div>
                                                <div class="pay_bank">
                                                    <div class="bank1">
                                                        <h4 class="txt_client">ESTADO:</h4>
                                                    </div>
                                                    <div class="bank2">
                                                        <label class="txt_client1">{{$usuario->estado}}</label>
                                                    </div>
                                                </div>
                                                <div class="pay_bank">
                                                    <div class="bank1">
                                                        <h4 class="txt_client">PAGADO:</h4>
                                                    </div>
                                                    <div class="bank2">
                                                        <label class="txt_client1">PAGADO</label>
                                                     </div>
                                                </div>
                                                <div class="pay_bank">
                                                    <div class="bank1">
                                                        <h4 class="txt_client">COMPRA:</h4>
                                                    </div>
                                                    <div class="bank2">
                                                        <label class="txt_client1"> 
                                                            {{ Carbon\Carbon::parse($usuario->updated_at)->format('d M Y') }}
                                                        </label>
                                                    </div> 
                                                </div>                                                 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img1">
                                        <img src="{{asset('img/level/'.$rifa->img)}}" class="img2 img-fluid">
                                    </div>
                                    <div class="suert">
                                        <h3 class="title13">¡MUCHA SUERTE!</h3>
                                    </div>                                                                          
                                </div>
                                <div class="col-md-1 col_bolet">
                                    <h3 class="txt-bolet1 d-none d-sm-none d-md-block">
                                        {{$rifa->premio}}
                                        
                                    </h3>
                                    <p class="d-sm-block d-md-none">{{$rifa->premio}}</p>  
                                </div>
                            </div>                             
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form action="{{route('imprimirPDF')}}" method="GET">
                            @csrf
                            <input type="hidden" name="sorteo" value="{{$rifa->id}}">
                            <input type="hidden" name="usuario" value="{{$usuario->id}}">
                            <button type="submit" class="btn btn-info">IMPRIMIR BOLETO</button>
                        </form>
                        
                    </div>
                </div>
                @endif 
                <div class="container container_gener">
                    <form action="{{route('verification.verif')}}" method="GET">
                        @csrf
                    <div class="row row_gener">
                        <div class="col-md-3">
                            <input type="text" name="number" class="form-control form_input" placeholder="Nª de boleto" required>                              
                        </div>
                        <div class="form-group col-md-3">
                            
                            <select name="sorteo" class="form-control form_input" id="exampleFormControlSelect1" required>
                              <option>Selecciona tu Rifa</option>
                              @foreach($rifas as $rifa)
                              <option value="{{$rifa->id}}">{{$rifa->premio}}</option>
                              @endforeach
                            </select>
                          </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-lg btn-primary btn_gener">GENERAR</button>                                                          
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
        @endsection