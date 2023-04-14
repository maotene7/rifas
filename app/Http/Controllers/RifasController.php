<?php

namespace App\Http\Controllers;

use App\Models\rifas;
use App\Models\boletosAditiones;
use App\Models\boletes;
use App\Models\boletos_aleatorio;
use App\Models\usuario;
use App\Models\bonos;
use App\Models\precios;
use Illuminate\Http\Request;
use Auth;

class RifasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rifas = rifas::all();
        return view('admin.rifas.index', compact('rifas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rifas = rifas::all();
        return view('admin.rifas.create', compact('rifas'));
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
            'premio' => 'required|string',
            'del' => 'required|string',
            'hasta' => 'required|string', 
  
        ]);
 
        $rand_can = range($request->del, $request->hasta);

       // return count($rand_can);

        if ($request->bole_adi > '0') {
            
            $max =  $request->hasta + (count($rand_can) * $request->bole_adi);
          $desde = $request->hasta + 1;

          $cantgrupo = ($max / $request->hasta) -1;

          $grupo = ($max-$request->hasta)/2;

            $aleat = [];
            
            $rand = range($desde, $max);
            shuffle($rand);
            foreach ($rand as $val) {
            $aleat[] = str_pad($val,5, '0', STR_PAD_LEFT);
            }

            //return $aleat;

        }
       // return $aleat;
   

        $ram = rand(1,999);
            $file = $request->file('img');
            $name = $ram.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/level/';  
            $file->move($path,$name);

        //almacenamiento
            $rifas = new rifas;
            $rifas->premio = $request->premio;
            $rifas->del = $request->del;
            $rifas->hasta = $request->hasta;
            $rifas->bole_adi = $request->bole_adi;
            $rifas->fecha_sorteo = $request->fecha_sorteo;
            $rifas->img = $name;
            $rifas->status = '1';
            $rifas->save();

            if ($request->bole_adi > '0') {
                //numeros aleatorios

                 $num =implode('-', $aleat);
                
                $boletosAditiones = new boletosAditiones;
                $boletosAditiones->number = $num;
                $boletosAditiones->sorteo = $rifas->id;
                $boletosAditiones->status = '1';
                $boletosAditiones->save();
             
            }
           
            
        
        //redireccion
       return back()->with('mensaje', 'Sorteo Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rifas  $rifas
     * @return \Illuminate\Http\Response
     */
    public function show(rifas $rifas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rifas  $rifas
     * @return \Illuminate\Http\Response
     */

    public function status(Request $request, rifas $rifas)
    {
        $rifas = rifas::where('id',$request->rifa)->first();
        
        if ($rifas->status == 1) {

                $rifas->status = '0';
                $rifas->save();
        }else{
                $rifas->status = '1';
                $rifas->save();
        }

        //redireccion
        return back()->with('mensaje', 'Status Cambiado!');
    }

    public function edit(Request $request)
    {
        $rifas = rifas::where('id',$request->rifa)->first();

        return view('admin.rifas.edit', compact('rifas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rifas  $rifas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rifas $rifas)
    {
        $rifas = rifas::where('id',$request->rifa)->first();

      

        if ($request->img == '') {

            $rifas->premio = $request->premio;
            $rifas->del = $request->del;
            $rifas->hasta = $request->hasta;
            $rifas->fecha_sorteo = $request->fecha_sorteo;
            $rifas->save();
        }else{
            $ram = rand(1,999);
            $file = $request->file('img');
            $name = $ram.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/level/';  
            $file->move($path,$name);

            unlink(public_path('img/level/'.$rifas->img));

            $rifas->premio = $request->premio;
            $rifas->del = $request->del;
            $rifas->hasta = $request->hasta;
            $rifas->fecha_sorteo = $request->fecha_sorteo;
            $rifas->img = $name;
            $rifas->status = '1';
            $rifas->save();
        }
        
        //redireccion
        return back()->with('mensaje', 'Sorteo Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rifas  $rifas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bole_adic = boletosAditiones::where('sorteo', $request->rifa)->delete();
        $bole_ale = boletos_aleatorio::where('sorteo', $request->rifa)->delete();
        $precio = precios::where('sorteo', $request->rifa)->delete();
        $bonos = bonos::where('sorteo', $request->rifa)->delete();
        $bole = boletes::where('sorteo', $request->rifa)->delete();
        $rifas = rifas::where('id',$request->rifa)->first();
        unlink(public_path('img/level/'.$rifas->img));

        $rifas->delete();

        //redireccion
        return back()->with('mensaje', 'Sorteo Eliminado!');
    }
}
