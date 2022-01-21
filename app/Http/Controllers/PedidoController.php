<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $pedido=Pedido::where("id_cliente",$usuario[0]['id_cliente'])->get();
            $pedido2=Pedido::select('numero_pedido','id_cliente')
                            ->where("id_cliente",$usuario[0]['id_cliente'])
                            ->groupBy('id_cliente','numero_pedido')
                            ->get();
            return view('pedido.index',compact('pedido','pedido2'));
        }
        else{
            if(isset($usuario[0]['id_encargados'])){
                $pedido=Pedido::select("id_cliente","numero_pedido",'atendido')
                                ->groupBy('numero_pedido','atendido',"id_cliente")
                                ->get();
                return view('pedido.pedido_empleado.index',compact('pedido'));
            }
            else{
                $pedido=Pedido::select("id_cliente","numero_pedido",'atendido')
                                ->groupBy('numero_pedido','atendido',"id_cliente")
                                ->get();
                return view('pedido.pedido_jefe.index',compact('pedido'));
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
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $usuario=User::where("id",auth()->id())->get();
        $conteo=Pedido::select('numero_pedido')
                        ->where('id_cliente',$usuario[0]['id_cliente'])
                        ->groupBy('numero_pedido')
                        ->count();
        if($conteo>0){
            $num_pedido=Pedido::select('numero_pedido')
                            ->where('id_cliente',$usuario[0]['id_cliente'])
                            ->max('numero_pedido');
        }
        else
        {
            $num_pedido=0;
        }
        $num_pedido+=1;
        $variables = $request->all();
        for ($i=1;$i<=(count($variables)/4);$i++){
            Pedido::insert([
                'numero_pedido'=>$num_pedido,
                'id_cliente'=>$usuario[0]['id_cliente'],
                'descripcion'=>$variables["descripcion".$i],
                'tamano'=>$variables["tamano".$i],
                'cantidad'=>$variables["cantidad".$i],
                'precio'=>$variables["precio".$i],
                'atendido'=>'NO',
                'created_at'=>now(),
            ]);
        }
        $success="Insertado Correctamente";
        return view('pedido.create',compact('success'));
    }

    public function busqueda($dato,$tiempo){
        
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            if($dato==' ' || $dato==null || $dato=='' || $dato=='*')
            {
                $pedido=Pedido::where("id_cliente",$usuario[0]['id_cliente'])
                                ->whereBetween('created_at',[$tiempo,now()])->get();

                return response(json_encode($pedido),200)->header('Content-type','text/plain');
            }
            else
            {
                $pedido=Pedido::where("id_cliente",$usuario[0]['id_cliente'])
                                ->where('descripcion','LIKE','%'.$dato.'%')
                                ->whereBetween('created_at',[$tiempo,now()])->get();
                return response(json_encode($pedido),200)->header('Content-type','text/plain');
            }
        }
        else{
            $pedido=Pedido::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where('descripcion','LIKE',"%$dato%")->get();
            return response(json_encode($pedido),200)->header('Content-type','text/plain');
        }
    }


    public function busquedaformulario($dato,$tiempo)
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $pedido2=Pedido::select('numero_pedido')
                            ->where("id_cliente",$usuario[0]['id_cliente'])
                            ->where('numero_pedido',intval($dato))
                            ->whereBetween('created_at',[$tiempo,now()])
                            ->groupBy('numero_pedido')
                            ->get();
            return response(json_encode($pedido2),200)->header('Content-type','text/plain');
        }
        else{
            $pedido=Pedido::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where('descripcion','LIKE',"%$dato%")->get();
            return response(json_encode($pedido),200)->header('Content-type','text/plain');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($pedidos)
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $pedido=Pedido::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where("numero_pedido",$pedidos)->get();

            $total=Pedido::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where("numero_pedido",$pedidos)
                            ->sum('precio');

            return view('pedido.show',compact('pedido','total'));
        }
        else{
            $pedido=Pedido::where("numero_pedido",$pedidos)->get();
            return view('pedido.pedido_empleado.show',compact('pedido'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $title = __("Modificar Pedido");
            $textButton = __("Actualizar");
            return view("pedido.edit", compact("title", "textButton", "pedido"));
        }
        else{
            $title = __("Modificar Pedido");
            $textButton = __("Poner Precio");
            return view("pedido.pedido_empleado.edit", compact("title", "textButton", "pedido"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $pedido->fill([
                'descripcion'=>$request->descripcion,
                'tamano'=>$request->tamano,
                "cantidad"=>$request->cantidad,
                'imagen'=>$request->imagen,
            ])->save();
            return redirect(route("pedido.show", $pedido->numero_pedido))->with("success", __("¡Producto Editado Correctamente!"));
        }
        else{
            $si="SI";
            $pedido->fill([
                'precio'=>$request->precio,
                'atendido'=>$si,
            ])->save();
            return redirect(route("pedido.show", $pedido->numero_pedido))->with("success", __("¡Se puso el precio!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($pedido)
    {
        $pedido=Pedido::where('numero_pedido',$pedido)->delete();
        $usuario=User::where("id",auth()->id())->get();
        $pedido=Pedido::select("numero_pedido")->where("id_cliente",$usuario[0]['id_cliente'])->groupBy('numero_pedido')->get();
        return view('pedido.index',compact('pedido'));
    }
}
