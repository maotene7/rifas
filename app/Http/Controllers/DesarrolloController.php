<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rifas;
use App\Models\boletes;
use App\Models\precios;
use App\Models\bonos;
use App\Models\usuario;
use App\Models\winners;
use App\Models\boletos_aleatorio;

class DesarrolloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rifas = rifas::where('status', '1')->get();
        
        
        
        $rif_cant = count($rifas);

        if ($rif_cant == '1') {

            $rifa = rifas::where('status', '1')->first();
            $bono = bonos::where('sorteo', $rifa->id)->first();
            $precios = precios::where('sorteo', $rifa->id)->get();
            $boletos = boletes::where('sorteo', $rifa->id)->get();
            $ganadores = winners::where('sorteo', $rifa->id)->get();
             

            return view('compra', compact('rifas', 'boletos', 'precios', 'bono', 'ganadores'));

        }else{
            $bonos = bonos::all(); 
            return view('compra2', compact('rifas', 'bonos'));
        }

       
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

    public function verif(Request $request)
    {

        $rifas = rifas::all();

        $num = str_pad($request->number,5, '0', STR_PAD_LEFT);
        $vali_boletos = boletes::where([['sorteo', $request->sorteo],['number', $num], ['status', '1']])->first();

        $rifa_ele = rifas::where('id', $request->sorteo)->first();

        if ($rifa_ele->hasta < $request->number) {

            $numale[] = $request->number;
            
            $bole_ale = boletos_aleatorio::where([['sorteo', $request->sorteo],['status', '1']])->get();

            if ($bole_ale == '[]') {
                return back()->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
            }
            foreach($bole_ale as $val){

                $num = explode('-', $val->number); 

                $res_comp = array_intersect($numale, $num); 

                if (count($res_comp) > '0') {
                    //verificar si 
                    $boletos_conf = boletes::where([['id_us', $val->id_us],['sorteo', $request->sorteo],['status', '1']])->first();

                    if ($boletos_conf == '') {
                    //redireccion
                        return back()->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
                        
                    }else{

                    //si existe el numero en aleatorio
                     
                     $usuario = usuario::where([['id', $val->id_us],['sorteo', $request->sorteo]])->first();
                    $boletos = boletes::where([['id_us', $val->id_us],['sorteo', $request->sorteo],['status', '1']])->get();
                    $rifa = rifas::where('id', $val->sorteo)->first();

                    $boletos_aleatorio = boletos_aleatorio::where([['id_us', $val->id_us],['sorteo', $val->sorteo]])->get();

                    foreach($boletos_aleatorio as $bol_al){
                        $num_ale = $bol_al->number;
                    }
                    $n_ale = explode('-', $num_ale);

                    }


                 }else{
                    //si no existe el numero en aleatorio
                    return back()->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
                
                 } 

                            
            }

            
        }else{
            
             if ($vali_boletos == '') {
            //redireccion
                return back()->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
                
            }else{

            $usuario = usuario::where([['id', $vali_boletos->id_us],['sorteo', $request->sorteo]])->first();
            $boletos = boletes::where([['id_us', $vali_boletos->id_us],['sorteo', $request->sorteo],['status', '1']])->get();
            $rifa = rifas::where('id', $vali_boletos->sorteo)->first();

            $boletos_aleatorio = boletos_aleatorio::where([['id_us', $vali_boletos->id_us],['sorteo', $vali_boletos->sorteo]])->get();


        } 

        
        }
        return view('verificacion', compact('boletos', 'rifa', 'rifas', 'boletos_aleatorio', 'usuario'));
       
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //return 'bien';

        $rifa = rifas::where('id', $request->id)->first();
        $boletos = boletes::where('sorteo', $rifa->id)->get();
        $bono = bonos::where('sorteo', $rifa->id)->first();
        $precios = precios::where('sorteo', $rifa->id)->get();
        $ganadores = winners::where('sorteo', $rifa->id)->get();

        return view('compra3', compact('rifa', 'boletos', 'precios', 'bono', 'ganadores')); 
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
