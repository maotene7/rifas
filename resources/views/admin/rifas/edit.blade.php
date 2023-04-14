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
                                    <h5 class="txt-title1">Actualizar Rifa</h5>
                                </div>                                 
                            </div>
                            <div class="col-lg-12 col-md-12 col-panel1 col-xl-12">
                                <form action="{{route('rifas.update', $rifas->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-lg-5 col-md-5 col-xl-5 mb-3">
                                            <label for="validationDefault01">Premio:</label>
                                            <input type="text" name="premio" class="form-control" id="validationDefault01" value="{{$rifas->premio}}"  required=""/>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">Numero desde:</label>
                                            <input type="number" name="del" class="form-control" id="validationDefault02" value="{{$rifas->del}}" required=""/>
                                        </div>
                                        <div class="col-2 col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">Numero hasta:</label>
                                            <input type="number" name="hasta" class="form-control" id="validationDefault02" value="{{$rifas->hasta}}"  required=""/>
                                        </div>
                                        <div class="col-2 col-lg-2 col-md-2 col-xl-2 mb-3">
                                            <label for="validationDefault02">Fecha de Sorteo:</label>
                                            <input type="date" name="fecha_sorteo" class="form-control" id="validationDefault02" value="{{$rifas->fecha_sorteo}}" value="Hasta" required=""/>
                                        </div>
                                    </div>
                                    <img src="{{asset('img/level/'.$rifas->img)}}" class="img-fluid">
                                    <div class="form-row">
                                        <div class="col-12">
                                            <label for="validationDefault01">Cambiar Imagen:</label>
                                            <input type="file" name="img" class="form-control" id="validationDefault01" />
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary btn-send mt-3" type="submit">Guardar Cambios</button>
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