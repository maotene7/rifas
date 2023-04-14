<?php
namespace App\Http\Controllers;

use App\Models\boletes;
use App\Models\boletosAditiones;
use App\Models\boletos_aleatorio;
use App\Models\usuario;
use App\Models\rifas;
use App\Models\precios;
use Illuminate\Http\Request;
use Auth;

class BoletesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return view('welcome');
        }else{
            if (Auth::user()->rol != '1') {
                $rifas = rifas::all();
                $boletes = boletes::join('rifas', 'boletes.sorteo', '=', 'rifas.id')
                                    ->join('usuarios','boletes.id_us', '=', 'usuarios.id')
                                    ->select('rifas.premio', 'usuarios.nombres', 'usuarios.apellidos', 'boletes.id_us', 'boletes.sorteo', 'boletes.number', 'boletes.id',
                                        'boletes.status')->where('boletes.cod_ref', Auth::user()->id)
                                    ->paginate(100);

                    return view('admin.boletos.index', compact('boletes', 'rifas'));
            }else{
                $rifas = rifas::all();
                $boletes = boletes::join('rifas', 'boletes.sorteo', '=', 'rifas.id')
                                    ->join('usuarios','boletes.id_us', '=', 'usuarios.id')
                                    ->select('rifas.premio', 'usuarios.nombres', 'usuarios.apellidos', 'boletes.id_us', 'boletes.sorteo', 'boletes.number', 'boletes.id',
                                        'boletes.status')
                                    ->paginate(100);

                    return view('admin.boletos.index', compact('boletes', 'rifas'));
            }
         
        }
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
            
            'nombres' => 'required|string',
            'apellidos' => 'required|string', 
  
        ]);

            //return $request->sorteo;
           //cantidad de boletos seleccionado

        $precios = precios::where('sorteo', $request->sorteo)->first();
         $cant = count($request->number);

         $rifas = rifas::where('id', $request->sorteo)->first();



         if ($rifas->bole_adi > '0') {
             //por cada boleto multiplicar
             $max =  $request->hasta + ($request->hasta * $request->bole_adi);
             $cantgrupo = $rifas->bole_adi;
            
             //cantidad de boletos aleatorio;

             $T_aleat = $cant * $cantgrupo;

              //seleccionar grupos aleatodorios

            $bol_adi = boletosAditiones::where('sorteo', $request->sorteo)->first();

                 $num = explode('-', $bol_adi->number);      
            

                //elegir los numeros aleatorios de los boletos adicionales
                 for ($i=0; $i < $T_aleat; $i++) { 
                     $num_al[] = $num[$i];
                     //eliminar de los adicionales los numeros agarrado
                     unset($num[$i]);
                 }


                  $num_act =implode('-', $num);

                  $bol_adi->number = $num_act;
                  $bol_adi->save();

            
            $num_final =implode('-', $num_al);

        }

        $boletos = boletes::where('sorteo', $request->sorteo)->get();

        $array2 = [];
        foreach($boletos as $bol){
            $array2[] = $bol->number;
        }
        

        $array1 = $request->number;

        
        $res_comp = array_intersect($array1, $array2);

        //return count($res_comp) ;

        if (count($res_comp) != '0') {
             
             //eturn 'mal';
             //redireccion
            return back()->with('mensaje1', 'Un Boleto de los seleccionado ya a sido apartado, vuelve a elejir!');

         }

                
        $bole_manual = implode('-',$request->number);
        //almacenamiento
            $usuario = new usuario;
            $usuario->whatsapp = $request->whatsapp;
            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->estado = $request->estado;
            $usuario->sorteo = $request->sorteo;
            $usuario->codigo_pro = $request->codigo_pro;
            $usuario->save();
            
            for ($i=0; $i < $cant; $i++) { 
                $boletes = new boletes;
                $boletes->number = $request->number[$i];
                $boletes->id_us = $usuario->id;
                if (Auth::guest()) {
                    }else{
                        $boletes->id_reg = Auth::user()->id;
                    }
                $boletes->sorteo = $request->sorteo;
                $boletes->status = '0';
                $boletes->cod_ref = $request->codigo_pro;
                $boletes->save();
            }

            if ($rifas->bole_adi > '0') {
                $boletos_aleatorio = new boletos_aleatorio;
                $boletos_aleatorio->number = $num_final;
                $boletos_aleatorio->id_us = $usuario->id;
                $boletos_aleatorio->sorteo = $request->sorteo;
                $boletos_aleatorio->status = '0';
                $boletos_aleatorio->cnt = $T_aleat;
                $boletos_aleatorio->save();

            }
            
            $usuario = usuario::where('id', $usuario->id)->first();
            $boletes = boletes::where([['id_us', $usuario->id], ['sorteo', $request->sorteo]])->get();

            $rifas = rifas::where('id', $request->sorteo)->first();
            

            $codigo_pro = $request->codigo_pro;
            $nombre = $request->nombres;
            $apellido = $request->apellidos;
            
        //redireccion 
             
       // return view('compra_exitosa', compact('usuario', 'boletes', 'rifas', 'bole_manual', 'T_aleat', 'cant', 'precios', 'num_final', 'codigo_pro', 'nombre', 'apellido'));

            if ($rifas->bole_adi == '0') {
                 return redirect('https://wa.me/573219801263?text=Hola%2C+Aparte+boletos+de+la+rifa%21%21%0A'.$rifas->premio.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+%2A'.$cant.'+BOLETOS%3A%2A%0A%2A'.$bole_manual.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90%29%0A%0A%2ANombre%3A%2A+'.$request->nombres.'+'.$request->apellidos.'+%0A%0A%EE%84%A5'.$precios->description.'%AF%2ACUENTAS+DE+PAGO+AQU%C3%8D%3A%2A+https://rifaslemt.lemt.tech/public/pay%0A%0AEl+siguiente+paso+es+enviar+foto+del+comprobante+de+pago+por+aqu%C3%AD&type=phone_number&app_absent=0');
            }else{
                if ($request->codigo_pro == '') {
                    return redirect('https://wa.me/573219801263?text=Hola%2C+Aparte+boletos+de+la+rifa%21%21%0A'.$rifas->premio.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+%2A'.$cant.'+BOLETOS%3A%2A%0A%2A'.$bole_manual.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90++BOLETOS+ADICIONALES+GRATIS %3A%2A%0A%2A'.$num_final.'%29%0A%0A%2ANombre%3A%2A+'.$request->nombres.'+'.$request->apellidos.'+%0A%0A%EE%84%A5'.$precios->description.'%AF%2ACUENTAS+DE+PAGO+AQU%C3%8D%3A%2A+https://rifaslemt.lemt.tech/public/pay%0A%0AEl+siguiente+paso+es+enviar+foto+del+comprobante+de+pago+por+aqu%C3%AD&type=phone_number&app_absent=0');
                }else{
                    return redirect('https://wa.me/573219801263?text=Hola%2C+Aparte+boletos+de+la+rifa%21%21%0A'.$rifas->premio.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+%2ACODIGO+PROMOCIONAL+'.$request->codigo_pro.'%3A%2A%0A%2A%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+%2A'.$cant.'+BOLETOS%3A%2A%0A%2A'.$bole_manual.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+BOLETOS+ADICIONALES+GRATIS %3A%2A%0A%2A'.$num_final.'%29%0A%0A%2ANombre%3A%2A+'.$request->nombres.'+'.$request->apellidos.'+%0A%0A%EE%84%A5'.$precios->description.'%AF%2ACUENTAS+DE+PAGO+AQU%C3%8D%3A%2A+https://rifaslemt.lemt.tech/public/pay%0A%0AEl+siguiente+paso+es+enviar+foto+del+comprobante+de+pago+por+aqu%C3%AD&type=phone_number&app_absent=0');
                }
            }
            
      

        //return redirect('https://api.whatsapp.com/send?phone=523338228856&text=Hola%2C+Aparte+boletos+de+la+rifa%21%21%0A'.$rifas->premio.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+%2A'.$cant.'+BOLETOS%3A%2A%0A%2A'.$bole_manual.'%21%21%0A%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%E2%80%94%0A%EE%84%90+%2A'.$T_aleat.'+BOLETOS+ADICIONALES+GRATIS %3A%2A%0A%2A'.$num_final.'%29%0A%0A%2ANombre%3A%2A+'.$request->nombres.'+'.$request->apellidos.'+%0A%0A%EE%84%A5'.$precios->description.'%AF%2ACUENTAS+DE+PAGO+AQU%C3%8D%3A%2A+https://rbgdl.com/public/pay%0A%0AEl+siguiente+paso+es+enviar+foto+del+comprobante+de+pago+por+aqu%C3%AD&type=phone_number&app_absent=0', );
        //return count($request->number) ;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boletes  $boletes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, boletes $boletes)
    {
        
    }

     public function status(Request $request)
    {
        return 'bien';
        /*
        $rifas = rifas::where('id',$request->bolete)->first();
        
        if ($rifas->status == 1) {

                $rifas->status = '0';
                $rifas->save();
        }else{
                $rifas->status = '1';
                $rifas->save();
        }

        //redireccion
        return back()->with('mensaje', 'Status Cambiado!');*/
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boletes  $boletes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, boletes $boletes)
    {
            if (Auth::user()->rol != '1') {
                return view('welcome');
            }else{
                 $boletes = boletes::where('id',$request->boleto)->first();
                
                if ($boletes->status == 1) {

                        $boletes->status = '0';
                        $boletes->save();
                }else{
                        $boletes->status = '1';
                        $boletes->save();
                }

                //redireccion
                return back()->with('mensaje', 'Status Cambiado!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boletes  $boletes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, boletes $boletes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boletes  $boletes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, boletes $boletes)
    {
        $boletes = boletes::where('id',$request->bolete)->first();

        $bole_cant = boletes::where('id_us',$boletes->id_us)->count();
       // return $bole_cant;

        if ($bole_cant == '1') {
            //return 'bien';
            $usuario = usuario::where('id', $boletes->id_us)->delete();
        }

        $boletos_aleatorio = boletos_aleatorio::where('id_us', $boletes->id_us)->first();

        $bol_adi = boletosAditiones::where('sorteo', $boletes->sorteo)->first();


        if ($boletos_aleatorio != '') {    
        
            $num1 = explode('-', $boletos_aleatorio->number);

            $num2 = explode('-', $bol_adi->number);

            $datos = \Arr::collapse([$num1, $num2]);

             $num_act =implode('-', $datos);
            $bol_adi->number = $num_act;
            $bol_adi->save();
           // return $usuario;

            $boletos_aleatorio = boletos_aleatorio::where('id_us', $boletes->id_us)->delete();
        }
        

        $boletes->delete();

        //redireccion
        return back()->with('mensaje', 'Numero eliminado!');
    }
}
