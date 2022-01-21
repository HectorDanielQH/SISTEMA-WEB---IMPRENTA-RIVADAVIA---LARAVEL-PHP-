<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\Encargado;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $consulta = Consulta::where('atendido','NO')->count();
        $pedido = Pedido::where('atendido','NO')->count();
        $cliente = Cliente::all()->count();
        $encargado = Encargado::all()->count();
        $cliente_venta=Venta::select('id_cliente')->selectRaw('SUM(cantidad*precio) as total')->groupBy('id_cliente')->get();
        return view('home',compact('consulta','pedido','cliente','cliente_venta','encargado'));
    }
}
