<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\boletes;
use App\Models\rifas;
use App\Models\boletos_aleatorio;
use App\Models\boletosAditiones;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $boletos = boletes::where([['id_us', $request->id_us],['sorteo', $request->sorteo]])->get();
        $boletos_aleatorio = boletos_aleatorio::where([['id_us', $request->id_us],['sorteo', $request->sorteo]])->get();

        $usuario = usuario::where('id', $request->id_us)->first();

        $rifa = rifas::where('id', $request->sorteo)->first();

        return view('admin.usuarios.index', compact('boletos_aleatorio', 'boletos', 'usuario', 'rifa'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuario)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, usuario $usuario)
    {
        $boletos = boletes::where([['id_us', $request->usuario->id],['sorteo', $request->sorteo]])->get();
        foreach($boletos as $bole){

            $bole->status = '1';
            $bole->save();
        }
        $boletos_aleatorio = boletos_aleatorio::where([['id_us', $request->usuario->id],['sorteo', $request->sorteo]])->get();

        foreach($boletos_aleatorio as $bol_ale){
            $bol_ale->status = '1';
            $bol_ale->save();
        }

        //return $boletos_aleatorio;
        return back()->with('mensaje', 'Boleto de los seleccionado ya a sido Aprovados!');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, usuario $usuario)
    {
        $boletos = boletes::where([['id_us', $request->usuario->id],['sorteo', $request->sorteo]])->get();
        $boletos_aleatorio = boletos_aleatorio::where([['id_us', $request->usuario->id],['sorteo', $request->sorteo]])->first();

        $bol_adi = boletosAditiones::where('sorteo', $request->sorteo)->first();

         if ($boletos_aleatorio != '') {    
        
            $num1 = explode('-', $boletos_aleatorio->number);

            $num2 = explode('-', $bol_adi->number);

            $datos = \Arr::collapse([$num1, $num2]);

             $num_act =implode('-', $datos);
            $bol_adi->number = $num_act;
            $bol_adi->save();
           // return $usuario;

            $boletos_aleatorio->delete();
        }
        

        foreach($boletos as $bole){

            $bole->delete();
        }
        

        $usuario = usuario::where('id', $request->usuario->id)->delete();

    

        return redirect('boletos');
 
    }
}
