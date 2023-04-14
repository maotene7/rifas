<?php
    
    use App\Models\boletes;
    use App\Models\balance;
    use App\Models\referred;


    $balance = balance::where('id_us', Auth::user()->id)->sum('valor');

    $ref = boletes::where('cod_ref', Auth::user()->id)->count();
    
?>


<div class="col-md-12 col-panel3">
                        <div class="row row-panel3">
                            <div class="col-lg-3 col-md-3 col-panel1 col-xl-3">
                                <ul class="list-group">
                                    <li class="active1 list-group-item">Balance</li>
                                    <a href="{{route('rifas.create')}}"><li class="list-group-item list-hover list1 text-dark"><i class="bi bi-cash"></i>  <span class="float-right">= {{number_format($balance,2)}}</span></li></a>
                                    <a href="{{route('rifas.index')}}"><li class="list-group-item list-hover list1 text-dark"><i class="bi bi-people-fill"></i> <span class="float-right">= {{$ref}}</span> </li></a>
                                </ul>                                 
                            </div> 
                            <div class="col-lg-3 col-md-3 col-panel1 col-xl-3">
                                <ul class="list-group">
                                    <li class="active1 list-group-item">Boletos</li>
                                    <a href="{{route('boletos.index')}}"><li class="list-group-item list-hover list1 text-dark">Registro de Boletos</li></a>
                                    
                                    
                                </ul>                                 
                            </div>
                            <div class="col-lg-3 col-md-3 col-panel1 col-xl-3">
                                <ul class="list-group">
                                    <li class="active1 list-group-item">Banco</li>
                                    <a href="{{route('pagos.index')}}"><li class="list-group-item list-hover list1 text-dark">Datos Bancarios</li></a>
                                    <a href="{{route('pagos.index')}}"><li class="list-group-item list-hover list1 text-dark">Retiro</li></a>
                                    
                                </ul>                                 
                            </div>
                        </div>                         
                    </div>