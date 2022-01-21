<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\VentaController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('proforma/{consulta}',[ConsultaController::class,'PDFGenerator'])->name('proforma');
Route::get('pedidobus/{datos}/{tiempo}',[PedidoController::class,'busqueda'])->name('pedidobus');
Route::get('pedidobusform/{datos}/{tiempo}',[PedidoController::class,'busquedaformulario'])->name('pedidobusform');
Route::get('consultabus/{datos}/{tiempo}',[ConsultaController::class,'busqueda'])->name('consultabus');
Route::get('consultabusform/{datos}/{tiempo}',[ConsultaController::class,'busquedaformulario'])->name('consultabusform');
Route::resource('cliente',ClienteController::class);
Route::resource('encargado',EncargadoController::class);
Route::resource('jefe',JefeController::class);
Route::resource('pedido',PedidoController::class);
Route::resource('venta',VentaController::class);
Route::resource('consulta',ConsultaController::class);