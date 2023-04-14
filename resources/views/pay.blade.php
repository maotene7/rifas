@extends('layouts.appprin')

@section('contentenido')
        <section class="banner"> 
            <img src="images/logo_rifa.png" class="banner_logo">
        </section>
        <section class="txt1">
            <div class="div_title1">
                <h1 class="txt_title">INFORMACIÓN DE PAGO</h1>
            </div>
            <div class="div_ico2">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-caret-down-fill ico_down ico_down3" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>
            </div>
            <div class="div_txt1">
                <div class="container container_txt">
                    <p class="txt_pay">Debes realizar el pago por alguna de éstas opciones y enviar tu comprobante de pago al</p>
                    <h3 class="title1">WHATSAPP 3338228856</h3>
                    <hr class="hr1"/>
                </div> 
                <div class="container container_pay">
                    <div class="logo2">
                        <img src="images/logo_rifa.png" class="logo3">
                    </div> 

                    <h3 class="title1 title10">CUENTAS DE PAGO</h3>
                    <p class="title1 title10">
Para transferir: copia el numero de cuenta clabe al que quieras enviar el dinero, puedes hacerlo dejando presionado el numero y seleccionar copiar, después en tu banca en linea introdúcelo, en el concepto debes poner tu nombre y la rifa en la que estas comprando boletos (ejemplo, Carlos Rifa1) y enviar el comprobante por WhatsApp.</p>

                    @foreach($pagos as $pago)
                    <div class="row row_pay">

                        
                        <div class="col-md-8 col_pay">
                            
                            
                            <div class="pay_bank">
                                <div class="bank1">
                                    <h4 class="txt_bank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-circle-fill fill1" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>Banco:</h4>
                                </div>
                                <div class="bank2">
                                    <img src="{{asset('img/pagos/'.$pago->img)}}" class="ico_bank">
                                </div>
                            </div>
                            <div class="pay_bank">
                                <div class="bank1">
                                    <h4 class="txt_bank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-circle-fill fill1" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>Nombre:</h4>
                                </div>
                                <div class="bank2">
                                    <h4 class="txt_pay4">{{$pago->nombre}}</h4>
                                </div>
                            </div>
                            <div class="pay_bank">
                                <div class="bank1">
                                    <h4 class="txt_bank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-circle-fill fill1" viewBox="0 0 16 16">
                                            <circle cx="8" cy="8" r="8"/>
                                        </svg>Cuenta:</h4>
                                </div>
                                <div class="bank2">
                                    <a href="{{$pago->cuenta}}" class="txt_pay5">{{$pago->cuenta}}</a>
                                </div>
                            </div>

                            
                                                                                      
                        </div>
                        
                        
                      
                    </div>
                    @endforeach
                    <div class="div_txt11">
                        <h3 class="title1 title11">SI ALGUNA CUENTA APARECE SATURADA POR FAVOR INTENTA CON OTRA</h3>
                    </div>
                </div>
            </div>
            
            
        @endsection
