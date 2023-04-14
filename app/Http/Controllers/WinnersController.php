<?php

namespace App\Http\Controllers;

use App\Models\winners;
use App\Models\rifas;
use App\Models\precios;
use App\Models\boletes;
use App\Models\boletos_aleatorio;
use App\Models\usuario;
use Illuminate\Http\Request;

class WinnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $winners = winners::where('sorteo', $request->rifa)->get();
        $rifa = rifas::where('id', $request->rifa)->first();
        $usuarios = usuario::where('sorteo', $request->rifa)->get();

        //return $usuarios;
        return view('admin.rifas.ganadores', compact('rifa', 'winners', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ////validacion
        $this->validate($request, [
            
            'number' => 'required|string',
            'sorteo' => 'required|string', 
            'position' => 'required|string',
  
        ]);

        $boletos = boletes::where('sorteo', $request->sorteo)->count();
        $rifa = rifas::where('id', $request->sorteo)->first();

        //establecer los ceros adicionales;
            $num = str_pad($request->number,5, '0', STR_PAD_LEFT);

        if ($rifa->hasta >= $request->number) {
            

            $boleto = boletes::where('number', $num)->first();

            if ($boleto != '') {
                
                $user_id = $boleto->id_us;
                
            }else{
                $user_id = 'No Hubo Ganador';
            }
        }else{
            
            $numale[] = $request->number;

            //return $numale;
            
            if ($rifa->bole_adi != '0') {
                $bole_ale = boletos_aleatorio::where('sorteo', $request->sorteo)->get();

               $user_id = 'No Hubo Ganador';

               //return $bole_ale;                
                
               foreach($bole_ale as $val){

                $num2 = explode('-', $val->number); 

                $res_comp = array_intersect($numale, $num2); 

                     if (count($res_comp) > '0') {
                        $user_id = $val->id_us;
                        }

                    }

                }else{
                    return back()->with('mensaje1', 'Esta rifa No tiene boletos Adicionales!');
                }
                
            }

            

        if ($request->porciento == '0') {
            $premio = $request->premio;
        }else{
            $boletos = boletes::where('sorteo', $request->sorteo)->count();

            $pric = precios::where('sorteo', $request->sorteo)->first();

            $res = $boletos*$pric->precio;

            $premio = $res*$request->porciento/100;
        }


        //return $premio;
        //almacenamiento
        
                $winners = new winners;
                $winners->position = $request->position;
                $winners->id_user = $user_id;
                $winners->sorteo = $request->sorteo;
                $winners->winning_number = $num;
                $winners->porciento = $request->porciento;
                $winners->premio = $premio;
                $winners->save();

                return back()->with('mensaje', 'agregado Numero Ganador!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\winners  $winners
     * @return \Illuminate\Http\Response
     */
    public function show(winners $winners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\winners  $winners
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, winners $winners)
    {
        $winners = winners::where('id', $request->winner)->first();
        $rifa = rifas::where('id', $winners->sorteo)->first();

        //return $winners;
        return view('admin.rifas.editGanador', compact('winners', 'rifa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\winners  $winners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, winners $winners)
    {
        $winners = winners::where('id', $request->winner)->first();

        $rifa = rifas::where('id', $winners->sorteo)->first();

        //establecer los ceros adicionales;
            $num = str_pad($request->number,5, '0', STR_PAD_LEFT);

        if ($rifa->hasta > $request->number) {
            

            $boleto = boletes::where('number', $num)->first();

            if ($boleto != '') {
                
                $user_id = $boleto->id_us;
                
            }else{
                $user_id = 'No Hubo Ganador';
            }
        }else{
            $numale[] = $request->number;

            if ($rifa->bole_adi != '0') {
                $bole_ale = boletos_aleatorio::where('sorteo', $request->sorteo)->get();

               $user_id = 'No Hubo Ganador';
                
               foreach($bole_ale as $val){

                $num = explode('-', $val->number); 

                $res_comp = array_intersect($numale, $num); 

                     if (count($res_comp) > '0') {
                        $user_id = $val->id_us;
                     }

                }

            }else{
                return back()->with('mensaje1', 'Esta rifa No tiene boletos Adicionales!');
            }
            
        }

         if ($request->porciento == '0') {
            $premio = $request->premio;
        }else{
            $boletos = boletes::where('sorteo', $request->sorteo)->count();

            $pric = precios::where('sorteo', $request->sorteo)->first();

            $res = $boletos*$pric->precio;

            $premio = $res*$request->porciento/100;
        }
        //almacenamiento
        
               
                $winners->position = $request->position;
                $winners->id_user = $user_id;
                $winners->winning_number = $num;
                $winners->porciento = $request->porciento;
                $winners->premio = $premio;
                $winners->save();

                return back()->with('mensaje', 'Actualizado Numero Ganador!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\winners  $winners
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, winners $winners)
    {
         $winners = winners::where('id', $request->winner)->delete();

        return back()->with('mensaje', 'Eliminado Numero Ganador!');

        //return 'bien';
    }
}
