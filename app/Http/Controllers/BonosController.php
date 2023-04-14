<?php

namespace App\Http\Controllers;

use App\Models\bonos;
use App\Models\rifas;
use Illuminate\Http\Request;
use Auth;

class BonosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rifas = rifas::all();
        $bonos = bonos::all();

        return view('admin.bonos.index', compact('rifas', 'bonos'));
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
            
            'sorteo' => 'required|string',
             
  
        ]);

        $ram = rand(1,999);
            $file = $request->file('img');
            $name = $ram.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/bonos/';  
            $file->move($path,$name);

        $bonos = new bonos;
                $bonos->img = $name;
                $bonos->sorteo = $request->sorteo;
                $bonos->save();

                //redireccion
       return back()->with('mensaje', 'Bono Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bonos  $bonos
     * @return \Illuminate\Http\Response
     */
    public function show(bonos $bonos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bonos  $bonos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, bonos $bonos)
    {
        $rifas = rifas::all();
        $bonos = bonos::where('id', $request->bono)->first();

        return view('admin.bonos.edit', compact('rifas', 'bonos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bonos  $bonos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bonos $bonos)
    {
        $bonos = bonos::where('id', $request->bono)->first();


        if ($request->img != '') {
            $ram = rand(1,999);
            $file = $request->file('img');
            $name = $ram.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/bonos/';  
            $file->move($path,$name);

            $bonos->img = $name;
                $bonos->sorteo = $request->sorteo;
                $bonos->save();
        }else{

                $bonos->sorteo = $request->sorteo;
                $bonos->save();
        }
        
   

                //redireccion
       return back()->with('mensaje', 'Bono Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bonos  $bonos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, bonos $bonos)
    {
        $bonos = bonos::where('id', $request->bono)->first();


        unlink(public_path('img/bonos/'.$bonos->img));

        $bonos->delete();

        //redireccion
       return back()->with('mensaje', 'Bono Eliminado!');
    }
}
