<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=User::where("id",auth()->id())->get();
        
        if(isset($usuario[0]['id_encargados'])){
            $ventas=Venta::where('id_vendedor',$usuario[0]['id_encargados'])->get();
            
            $ventas_dos=Venta::select('numero_venta','id_vendedor','id_cliente')
                            ->selectRaw("DATE(created_at) as fecha")
                            ->where('id_vendedor',$usuario[0]['id_encargados'])
                            ->groupBy('numero_venta','id_vendedor','id_cliente','fecha')->get();
            return view('venta.index',compact('ventas','ventas_dos'));
        }
        else{
            $ventas=Venta::all();
            
            $ventas_dos=Venta::select('numero_venta','id_vendedor','id_cliente')
                            ->selectRaw("DATE(created_at) as fecha")
                            ->groupBy('numero_venta','id_vendedor','id_cliente','fecha')->get();
            return view('venta.venta_jefe.index',compact('ventas','ventas_dos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente=Cliente::all();
        $titulo;
        $route=route('venta.store');
        $btn;
        return view('venta.create',compact('route','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente=$request->usuario;
        $id_cliente="";

        for($i=0;$i<strlen($cliente);$i++){
            if($cliente[$i]=='-')
                break;
            else{
                $id_cliente.=$cliente[$i];
            }
        }
        $usuario=User::where("id",auth()->id())->get();
        $conteo=Venta::select('numero_venta')
                        ->groupBy('numero_venta')
                        ->count();
        if($conteo<=0){
            $num_venta=0;
        }
        else{
            $num_venta=Venta::select('numero_venta')
                            ->max('numero_venta');
        }
        $num_venta+=1;
        $variables=$request->all();
        $cliente_insertar=Cliente::select('id')->where("ci",substr($id_cliente,0,strlen($id_cliente)-1))->get();
        unset($variables['_token']);
        unset($variables['usuario']);
        $cantidad;
        $descripcion;
        $precio;
        $salto=1;
        foreach ($variables as $datos_array){
            if($salto==1){
                $cantidad=$datos_array;
                $salto+=1;
            }
            else{
                if($salto==2){
                    $descripcion=$datos_array;
                    $salto+=1;
                }
                else{
                    Venta::insert([
                        "numero_venta"=>$num_venta,
                        "id_vendedor"=>$usuario[0]['id_encargados'],
                        "id_cliente"=>$cliente_insertar[0]['id'],
                        "descripcion"=>$descripcion,
                        "cantidad"=>$cantidad,
                        "precio"=>$datos_array,
                        "created_at"=>now(),
                    ]);
                    $salto=1;
                }
            }
        }

        $success="Insertado Correctamente";

        $cliente=Cliente::all();
        $route=route('venta.store');

        return view('venta.create',compact('success','route','cliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show($venta)
    {
        if(isset($usuario[0]['id_encargados'])){
            $usuario=User::where("id",auth()->id())->get();
        }
        else{
            $recu=Venta::select('id_vendedor')
                        ->where('numero_venta',$venta)
                        ->groupBy('id_vendedor')->get();
            $usuario=User::where("id_encargados",$recu[0]['id_vendedor'])->get();
        }
        $ventas=Venta::all()
                    ->where('numero_venta',$venta);
        
        $suma=Venta::selectRaw('sum(cantidad*precio) as total')
                    ->where('numero_venta',$venta)->get();

        $cliente=Venta::select('id_cliente')
                        ->where('id_vendedor',$usuario[0]['id_encargados'])
                        ->where('numero_venta',$venta)
                        ->groupBy('id_cliente')->get();

        $clientes=Cliente::where('id',$cliente[0]['id_cliente'])->get();
        return view('venta.show',compact('ventas','suma','clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
