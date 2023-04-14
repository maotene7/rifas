@extends('layouts.appprin')

@section('contentenido')
<section class="login">
            <div class="container pb-5 pt-5"> 
                <div class="col-login col-md-7 col-xl-7 ml-auto mr-auto">
                    <div class="div-login p-4 p-lg-5 text-dark">
                        <h2 class="mb-1 text-dark">Bienvenido</h2>
                        <p class="mb-4">Ingrese usuario y clave asignado . </p>
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="flex-nowrap input-group">
                                    <div class="input-group-prepend">
                                        <span class="bg-light input-group-text" id="addon-wrapping1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em">
                                                <g>
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z"></path>
                                                </g>
                                            </svg></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Usuario" aria-label="User Email" aria-describedby="addon-wrapping1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="flex-nowrap input-group">
                                    <div class="input-group-prepend">
                                        <span class="bg-light input-group-text" id="addon-wrapping2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1em" height="1em">
                                                <g>
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path d="M10.758 11.828l7.849-7.849 1.414 1.414-1.414 1.415 2.474 2.474-1.414 1.415-2.475-2.475-1.414 1.414 2.121 2.121-1.414 1.415-2.121-2.122-2.192 2.192a5.002 5.002 0 0 1-7.708 6.294 5 5 0 0 1 6.294-7.708zm-.637 6.293A3 3 0 1 0 5.88 13.88a3 3 0 0 0 4.242 4.242z"></path>
                                                </g>
                                            </svg></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Clave" aria-label="Password" aria-describedby="addon-wrapping2"/>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1"/>
                                <label class="form-check-label" for="exampleCheck1">Recordame</label>
                            </div>
                            <button type="submit" class="btn btn-block btn-login btn-primary font-weight-bold pb-2 pl-3 pr-3 pt-2">Ingresar</button>
                        </form>
                    </div>
                </div>                 
            </div>             
        </section>
@endsection
