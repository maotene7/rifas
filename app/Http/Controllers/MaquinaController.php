<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rifas;
use App\Models\boletes;

class MaquinaController extends Controller
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
        ////validacion
        $this->validate($request, [
            
            'cant_boleto' => 'required|string',
            
  
        ]);
            $boletos = boletes::where('sorteo', $request->rifa)->get();
            $rifa = rifas::where('id', $request->rifa)->first();
            
            //meter los numero de los boletos ocupados en un array
            foreach($boletos as $bol){
                $bolet[] = $bol->number;
            }
            //meter todo los numero en un array
                    for ($i=$rifa->del; $i <= $rifa->hasta; $i++) { 
                          $i = str_pad($i,5, '0', STR_PAD_LEFT);

                        
                                $numb[] = $i;
                            
                    }
                   
                   
                   /* foreach ($numb as $val) {
                    $aleat[] = $val;
                    }*/

                   // return $numb;


                    if ($boletos == '[]') {
                        $res = $numb;
                       // return 'bien';
                    }else{
                        //diferenciar de ambos
                      // return 'mal';
                     $res = array_diff($numb, $bolet);
                    }

                     //desordenar los numeros
                    shuffle($res);

                    //return $res;
                    //return $boletos;
                    
                // return $res;  

            //tomar los numeros correspondiente
            for ($i=0; $i < $request->cant_boleto; $i++) {
                if (isset($res[$i])) {
                     $sele_aleat[] = $res[$i] ;
                 } 
                
            }

            $cant = $request->cant_boleto; 
            $rifa = $request->rifa;
          return view('maquina', compact('sele_aleat', 'cant', 'rifa')) ;
         
                      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
