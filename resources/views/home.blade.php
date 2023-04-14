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
                </div>
                <footer class="small text-secondary">
                    <div class="container">
                        <div class="align-items-center row">
                            <div class="col-md col-panel1 pb-2 pt-2">
                                <p class="mb-0">&copy; FEVEDEU 2022.  - Desarrollado por Sublime by Concept</p>
                            </div>
                        </div>
                    </div>
                </footer>                 
            </div>
        </div>
@endsection
 