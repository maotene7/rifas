<?php

namespace App\Http\Controllers;

use App\Models\precios;
use App\Models\rifas;
use Illuminate\Http\Request;

class PreciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rifas = rifas::where('id', $request->id)->first();

        $precios = precios::where('sorteo', $request->id)->get();


        return view('admin.precios.index', compact('rifas', 'precios'));
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
            
            'description' => 'required|string',
            
  
        ]);

                $precios = new precios;
                $precios->precio = $request->precio;
                $precios->description = $request->description;
                $precios->sorteo = $request->sorteo;
                $precios->save();
            

        return back()->with('mensaje', 'Precio agregado!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\precios  $precios
     * @return \Illuminate\Http\Response
     */
    public function show(precios $precios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\precios  $precios
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, precios $precios)
    {
        $precios = precios::where('id', $request->precio)->first();

        return view('admin.precios.edit', compact('precios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\precios  $precios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, precios $precios)
    {
         $precios = precios::where('id', $request->precio)->first();

        // return $request->precio;

               $precios->precio = $request->price;
                $precios->description = $request->description;
                $precios->save();
            

        return back()->with('mensaje', 'Precio Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\precios  $precios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, precios $precios)
    {
        $precios = precios::where('id', $request->precio)->first();

        //return $precios;
        $precios->delete();

        return back()->with('mensaje', 'Precio Actualizado!');
    }
}
