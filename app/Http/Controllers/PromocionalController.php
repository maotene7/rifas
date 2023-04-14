<?php

namespace App\Http\Controllers;

use App\Models\promocional;
use App\Models\boletes;
use Illuminate\Http\Request;

class PromocionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocional = promocional::all();

        return view('admin.promocional.index', compact('promocional'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $promo = promocional::where('id', $request->id)->first();

        $boletos = boletes::where([['cod_ref', $promo->codigo],['status', '1']])->count();

        return view('admin.promocional.contador', compact('promo', 'boletos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request->name;
        
                $promocional = new promocional;
                $promocional->name = $request->name;
                $promocional->codigo = $request->codigo;
                $promocional->save();

                //redireccion
       return back()->with('mensaje', 'Promociòn Agregada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\promocional  $promocional
     * @return \Illuminate\Http\Response
     */
    public function show(promocional $promocional)
    {
        $promocional->delete();

               //redireccion
       return back()->with('mensaje', 'Promociòn Eliminada!');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\promocional  $promocional
     * @return \Illuminate\Http\Response
     */
    public function edit(promocional $promocional)
    {
       return view('admin.promocional.edit', compact('promocional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\promocional  $promocional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, promocional $promocional)
    {
        $promocional->name = $request->name;
                $promocional->codigo = $request->codigo;
                $promocional->save();

                //redireccion
       return back()->with('mensaje', 'Promociòn Agregada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\promocional  $promocional
     * @return \Illuminate\Http\Response
     */
    public function destroy(promocional $promocional)
    {
        
    }
}
