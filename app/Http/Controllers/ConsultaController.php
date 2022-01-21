<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class ConsultaController extends Controller
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
            $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])->get();
            $consulta2=Consulta::select('numero_consulta','id_cliente')
                            ->where("id_cliente",$usuario[0]['id_cliente'])
                            ->groupBy('id_cliente','numero_consulta')
                            ->get();
            return view('consulta.index',compact('consulta','consulta2'));
        }
        else{
            if(isset($usuario[0]['id_encargados'])){
                $consulta=Consulta::select("id_cliente","numero_consulta",'atendido')
                                ->groupBy('numero_consulta','atendido',"id_cliente")
                                ->get();
                return view('consulta.consulta_empleado.index',compact('consulta'));
            }
            else{
                $consulta=Consulta::select("id_cliente","numero_consulta",'atendido')
                                ->groupBy('numero_consulta','atendido',"id_cliente")
                                ->get();
                return view('consulta.consulta_jefe.index',compact('consulta'));
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
        return view('consulta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $num_pedido=Consulta::select('numero_consulta')->max('numero_consulta');
        $num_pedido+=1;
        $usuario=User::where("id",auth()->id())->get();
        $variables = $request->all();
        for ($i=1;$i<=(count($variables)/4);$i++){
            Consulta::insert([
                'numero_consulta'=>$num_pedido,
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
        return view('consulta.create',compact('success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show($consultas)
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where("numero_consulta",$consultas)->get();

            $total=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where("numero_consulta",$consultas)
                            ->sum('precio');

            return view('consulta.show',compact('consulta','total'));
        }
        else{
            $consulta=Consulta::where("numero_consulta",$consultas)->get();
            return view('consulta.consulta_empleado.show',compact('consulta'));
        }
    }
 

    public function PDFGenerator($consultas)
    {
        $numero=Consulta::find($consultas);
        $usuario=User::where("id",auth()->id())->get();
        $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where("numero_consulta",$numero->numero_consulta)->get();
        $pdf=PDF::loadView('consulta.showpdf',compact('consulta'));//->setOptions(['defaultFont' => 'arial']);
        //return $pdf->stream();
        return $pdf->download('proforma.pdf');
        //*/return view('consulta.showpdf',compact('consulta'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit($consultas)
    {
        $usuario=User::where("id",auth()->id())->get();
        $consulta=Consulta::where("id",'=',$consultas)->get()[0];
        //echo $consulta;
        if(isset($usuario[0]['id_cliente'])){
            $title = __("Modificar Consulta");
            $textButton = __("Actualizar");
            return view("consulta.edit", compact("title", "textButton", "consulta"));
        }
        else{
            $title = __("Modificar Consulta");
            $textButton = __("Poner Precio");
            return view("consulta.consulta_empleado.edit", compact("title", "textButton", "consulta"));
        }
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $consultas)
    {
        $usuario=User::where("id",auth()->id())->get();
        $consulta=Consulta::where("id",'=',$consultas)->get()[0];
        if(isset($usuario[0]['id_cliente'])){
            $consulta->fill([
                'descripcion'=>$request->descripcion,
                'tamano'=>$request->tamano,
                "cantidad"=>$request->cantidad,
                'imagen'=>$request->imagen,
            ])->save();
            return redirect(route("consulta.show", $consultas))->with("success", __("¡Producto Editado Correctamente!"));
        }
        else{
            $si="SI";
            $consulta->fill([
                'precio'=>$request->precio,
                'atendido'=>$si,
            ])->save();
            return redirect(route("consulta.show", $consultas))->with("success", __("¡Se puso el precio!"));
        }
    }
    public function busqueda($dato,$tiempo){
        
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            if($dato==' ' || $dato==null || $dato=='' || $dato=='*')
            {
                $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                                ->whereBetween('created_at',[$tiempo,now()])->get();

                return response(json_encode($consulta),200)->header('Content-type','text/plain');
            }
            else
            {
                $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                                ->where('descripcion','LIKE','%'.$dato.'%')
                                ->whereBetween('created_at',[$tiempo,now()])->get();
                return response(json_encode($consulta),200)->header('Content-type','text/plain');
            }
        }
        else{
            $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where('descripcion','LIKE',"%$dato%")->get();
            return response(json_encode($consulta),200)->header('Content-type','text/plain');
        }
    }


    public function busquedaformulario($dato,$tiempo)
    {
        $usuario=User::where("id",auth()->id())->get();
        if(isset($usuario[0]['id_cliente'])){
            $consulta2=Consulta::select('numero_consulta')
                            ->where("id_cliente",$usuario[0]['id_cliente'])
                            ->where('numero_consulta',intval($dato))
                            ->whereBetween('created_at',[$tiempo,now()])
                            ->groupBy('numero_consulta')
                            ->get();
            return response(json_encode($consulta2),200)->header('Content-type','text/plain');
        }
        else{
            $consulta=Consulta::where("id_cliente",$usuario[0]['id_cliente'])
                            ->where('descripcion','LIKE',"%$dato%")->get();
            return response(json_encode($consulta),200)->header('Content-type','text/plain');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($consulta)
    {
        $consulta=Consulta::where('numero_consulta',$consulta)->delete();
        $usuario=User::where("id",auth()->id())->get();
        $consulta=Consulta::select("numero_consulta")->where("id_cliente",$usuario[0]['id_cliente'])->groupBy('numero_consulta')->get();
        return view('consulta.index',compact('consulta'));
    }
}
