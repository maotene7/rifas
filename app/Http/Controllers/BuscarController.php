<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\boletes;
use App\Models\boletos_aleatorio;
use App\Models\rifas;
use App\Models\usuario;

class BuscarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function verif(Request $request)
    {
        $rifa = rifas::where('sorteo', $request->rifa)->first();

        return 'bien';
    }

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
        $rifa = rifas::where('id', $request->sorteo)->first();

        //return $request->number;
        $num = str_pad($request->number,5, '0', STR_PAD_LEFT);

        if ($rifa->hasta < $request->number) {
            return back()->with('mensaje1', 'El '.$num.' no esta entre los boletos!');
        }

        
        
        $boletos = boletes::where([['sorteo', $request->sorteo],['number',$num]])->count();

        if ($boletos == '0') {

            //return $sele_aleat;
            
            //return $sele_aleat;
            if (isset($request->sele_aleat)) {
                
                $sele_aleat =  $request->sele_aleat;

                array_push($sele_aleat, $num);

            }else{
                $sele_aleat[] = $num;
                
            }


             $rifa = $request->sorteo;
            $cant = count($sele_aleat);
            

            return view('buscar', compact('sele_aleat', 'cant', 'rifa'));
        }else{
            return back()->with('mensaje1', 'El '.$num.' ya esta apartado!');
        }
    
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rifas = rifas::all();

        $num = str_pad($request->number,5, '0', STR_PAD_LEFT);
        $vali_boletos = boletes::where([['sorteo', $request->sorteo],['number', $num]])->first();

        $bole_cant = boletes::where([['sorteo', $request->sorteo],['number', $num]])->count();


        $rifa_ele = rifas::where('id', $request->sorteo)->first();

        if ($rifa_ele->hasta < $request->number) {
           // return 'bien';


            $numale[] = $request->number;
            
            $bole_ale = boletos_aleatorio::where('sorteo', $request->sorteo)->get();

           // return $bole_ale;
          
           if ($bole_ale == '[]') {
                return redirect('buscar/'.$request->sorteo)->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
            }

            $e = '0';
            foreach($bole_ale as $val){

                $num = explode('-', $val->number); 

                $res_comp = array_intersect($numale, $num); 

                //return count($res_comp);

                if (count($res_comp) > '0') {

                    //si existe el numero en aleatorio
                     $e++;
                    
                    $user = $val->id_us;

                 }

                           
            }
 
            if($e != '0'){
                $usuario = usuario::where([['id', $user],['sorteo', $request->sorteo]])->first();
                    $boletos = boletes::where([['id_us', $user],['sorteo', $request->sorteo]])->get();
                    $rifa = rifas::where('id', $val->sorteo)->first();

                    $boletos_aleatorio = boletos_aleatorio::where([['id_us', $user],['sorteo', $val->sorteo]])->get();

                   
            }else{
                //return 'EL Boleto ingresado no esta disponible!';
                return redirect('buscar/'.$request->sorteo)->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
            }

        }else{
            
             if ($vali_boletos == '') {
            //redireccion
                 //return 'EL Boleto ingresado no esta disponible!';
                return redirect('buscar/'.$request->sorteo)->with('mensaje1', 'EL Boleto ingresado no esta disponible!');
                
            }else{

            $usuario = usuario::where([['id', $vali_boletos->id_us],['sorteo', $request->sorteo]])->first();
            $boletos = boletes::where([['id_us', $vali_boletos->id_us],['sorteo', $request->sorteo]])->get();
            $rifa = rifas::where('id', $vali_boletos->sorteo)->first();

            $boletos_aleatorio = boletos_aleatorio::where([['id_us', $vali_boletos->id_us],['sorteo', $vali_boletos->sorteo]])->get();

            /*foreach($boletos_aleatorio as $bol_al){
                $num_ale = $bol_al->number;
            }
            $n_ale = explode('-', $num_ale);*/


        }


        
        }
        return view('admin.verif.index', compact('boletos', 'rifa', 'rifas', 'boletos_aleatorio',  'usuario'));
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rifa = rifas::where('id', $id)->first();

        return view('admin.verif.index', compact('rifa'));
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
