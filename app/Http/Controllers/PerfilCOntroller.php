<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class PerfilCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.perfils.index');
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
        $user = User::where('id', Auth::user()->id)->first();

        if ($request->ico != '') {
            $ram1 = rand(1,999);
            $file = $request->file('ico');
            $ico = $ram1.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/perfil/';  
            $file->move($path,$ico);

            unlink(public_path('img/perfil/'.Auth::user()->ico));
        }else{
            $ico = Auth::user()->ico;
        }
        if ($request->logo != '') {
           $ram2 = rand(1,999);
            $file = $request->file('logo');
            $logo = $ram2.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/perfil/';  
            $file->move($path,$logo);

            unlink(public_path('img/perfil/'.Auth::user()->logo));
        }else{
            $logo = Auth::user()->logo;
        }

        if ($request->img != '') {
           $ram3 = rand(1,999);
            $file = $request->file('img');
            $img = $ram3.Auth::user()->id.$file->getClientOriginalName();
            $path = public_path() .'/img/perfil/';  
            $file->move($path,$img);

            unlink(public_path('img/perfil/'.Auth::user()->img));
        }else{
            $img = Auth::user()->img;
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->ico = $ico;
        $user->logo = $logo;
        $user->img = $img;
        $user->whatsapp = $request->whatsapp;
        $user->save();

         //redireccion
       return back()->with('mensaje', 'Perfil Actualizado!');

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
