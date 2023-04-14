<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RifasController;
use App\Http\Controllers\DesarrolloController;
use App\Http\Controllers\BoletesController;
use App\Http\Controllers\PreciosController;
use App\Http\Controllers\BonosController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\MaquinaController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\PromocionalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PerfilCOntroller;
use App\Http\Controllers\WinnersController;


use App\Models\rifas; 
use App\Models\User;

/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = User::first();
    session(['ico' => $user->ico]);
    session(['logo' => $user->logo]);
    session(['img' => $user->img]);
    session(['whatsapp' => $user->whatsapp]);
    return view('welcome');
});  

Route::get('Compra_boleto',[ DesarrolloController::class, 'index']); 
Route::get('comprarboletos',[ DesarrolloController::class, 'show'])->name('comprarboletos.show'); 
 
Route::get('/verification', function () {
    $rifas = rifas::all();
    return view('verificacion', compact('rifas')); 
});

Route::get('pdf-imprimir',[ PDFController::class, 'pdf'])->name('imprimirPDF');

Route::get('verificar_boleto',[ DesarrolloController::class, 'verif'])->name('verification.verif');

Route::get('pay',[ PagosController::class, 'pay']);

//Accion para maquina de la suerte
    Route::resource('Maquina', MaquinaController::class);

//Accion para buscar 
    Route::resource('buscar', BuscarController::class);
    Route::get('buscar/{id}',[ BuscarController::class, 'verif'])->name('buscar.verif');

Auth::routes();

    //Accion para boletos
    Route::resource('boletos', BoletesController::class);

 //Accion para perfil
    Route::resource('perfils', PerfilCOntroller::class);

    //Accion para usuario
    Route::resource('usuarios', UsuarioController::class);

Route::group(['middleware' => 'admin'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

    //Accion para rifa
    Route::resource('rifas', RifasController::class);
    Route::get('rifas/{rifa}',[ RifasController::class, 'status'])->name('rifas.status');
    Route::get('rifasdestroy/{rifa}',[ RifasController::class, 'destroy'])->name('rifas.destroy');

    //Accion para ganadores
    Route::resource('winners', WinnersController::class);
    Route::get('winnersdestroy/{winner}',[ WinnersController::class, 'destroy'])->name('winners.destroy');

    //Accion para precios
    Route::resource('precios', PreciosController::class);
    Route::get('preciosdestroy/{precio}',[ PreciosController::class, 'destroy'])->name('precios.destroy');

    //Accion para bonos
    Route::resource('bonos', BonosController::class);
    Route::get('bonosdestroy/{bono}',[ BonosController::class, 'destroy'])->name('bonos.destroy');

    //Accion para PAgos
    Route::resource('pagos', PagosController::class);
    Route::get('pagosdestroy/{pago}',[ PagosController::class, 'destroy'])->name('
    pagos.destroy');


    //Accion para boletos
    
    Route::get('boletosdestroy/{bolete}',[ BoletesController::class, 'destroy'])->name('boletos.destroy');
    Route::get('boletosParticipantes/{rifa}',[ PDFController::class, 'participantes'])->name('imprimir');

     
    //Accion para promocional
    Route::resource('promocionals', PromocionalController::class);

    //Accion para usuario
    
    Route::get('usuarios/{usuario}/{sorteo}',[ UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::get('usuarios/{usuario}/{sorteo}',[ UsuarioController::class, 'destroy'])->name('usuarios.destroy');  

    //Accion para Contador
    Route::resource('Contadores', ContadorController::class);



});

// borrar caché de la aplicación
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

 // borrar caché de ruta
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

// borrar caché de configuración
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// borrar caché de vista
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
