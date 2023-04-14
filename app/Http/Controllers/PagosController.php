<?php

namespace App\Http\Controllers;

use App\Models\pagos;
use Auth;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pay()
    {
        $pagos = pagos::all();

        return view('pay', compact('pagos'));
    }

    public function index()
    {
        $pagos = pagos::all();

        return view('admin.pagos.index', compact('pagos'));
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
        

        $ram = rand(1,999);
            $file = $request->file('img');
            $name = $ram.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/pagos/';  
            $file->move($path,$name);

                $pagos = new pagos;
                $pagos->nombre = $request->nombre;
                $pagos->cuenta = $request->cuenta;
                $pagos->instru = $request->instru;
                $pagos->img = $name;
                $pagos->save();

                //redireccion
       return back()->with('mensaje', 'Datos Agregado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, pagos $pagos)
    {
        $pagos = pagos::where('id', $request->pago)->first();


        unlink(public_path('img/pagos/'.$pagos->img));

        $pagos->delete();

        //redireccion
       return back()->with('mensaje', 'datos Eliminado!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, pagos $pagos)
    {
        
        $pagos = pagos::where('id', $request->pago)->first();

        return view('admin.pagos.edit', compact( 'pagos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagos $pagos)
    {
        $pagos = pagos::where('id', $request->pago)->first();

        if ($request->img != '') {
            $ram = rand(1,999);
            $file = $request->file('img');
            $name = $ram.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/pagos/';  
            $file->move($path,$name);

            $pagos->nombre = $request->nombre;
            $pagos->cuenta = $request->cuenta;
            $pagos->instru = $request->instru;
            $pagos->img = $name;
                
                $pagos->save();
        }else{
            $pagos->nombre = $request->nombre;
            $pagos->cuenta = $request->cuenta;
            $pagos->instru = $request->instru;                
                $pagos->save();
        }
        
   

                //redireccion
       return back()->with('mensaje', 'datos Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagos $pagos)
    {
        return 'bien';
    }
}
