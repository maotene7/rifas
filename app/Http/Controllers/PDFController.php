<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rifas;
use App\Models\boletes;
use App\Models\boletos_aleatorio;
use App\Models\precios;
use App\Models\bonos;
use App\Models\usuario;
use PDF;

class PDFController extends Controller
{
    public function pdf(Request $request)
    {
        $usuario = usuario::where([['id', $request->usuario],['sorteo', $request->sorteo]])->first();
        $boletos = boletes::where([['id_us', $request->usuario],['sorteo', $request->sorteo],['status', '1']])->get();
        $boletos_aleatorio = boletos_aleatorio::where([['id_us', $request->usuario],['sorteo', $request->sorteo],['status', '1']])->get();
        $rifa = rifas::where('id', $request->sorteo)->first();

        $pdf = \PDF::loadView('reportes.boletos', compact('usuario', 'boletos', 'rifa', 'boletos_aleatorio'));
         return $pdf->download('Tikes.pdf');

    }

    public function participantes(Request $request)
    {
        //$rifa = rifas::first();

        //return $request->rifa;
        

        $usuarios = usuario::where('sorteo', $request->rifa)->get();
        $boletos = boletes::where('sorteo', $request->rifa)->get();
        $boletos_aleatorio = boletos_aleatorio::where('sorteo', $request->rifa)->get();
        $rifa = rifas::where('id', $request->rifa)->first();

       

       $pdf = \PDF::loadView('reportes.participantes', compact('usuarios', 'boletos', 'rifa', 'boletos_aleatorio'));
         return $pdf->download('rifas.pdf');

    }
}
