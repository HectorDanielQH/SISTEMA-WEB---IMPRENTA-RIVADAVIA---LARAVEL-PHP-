<?php

namespace App\Http\Controllers;

use App\Models\Encargado;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EncargadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encargado = Encargado::select('*')->get();
        return view("encargado.index", compact("encargado"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encargado = new Encargado();
        $title = __("Registrar Encargado");
        $textButton = __("Registrar");
        $route = route("encargado.store");
        
        
        return view("encargado.create", compact("title", "textButton", "route", "encargado"));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Encargado::create([
            'ci' => $request->carnet,
            'nombres' =>$request->nombres,
            'apellidos' => $request->apellidos,
            'correo_electronico'=>$request->email,
        ]);

        $encargado = Encargado::where("ci",$request->carnet)->get();

        User::create([
            'name'=>$request->nombres,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->carnet),
            'id_encargados' => $encargado[0]["id"],
        ])->assignRole('encargado');
        return redirect(route("encargado.index"))->with("success", __("¡Encargado Creado Correctamente!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show(Encargado $encargado)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function edit(Encargado $encargado)
    {
        $title = __("Modificar Encargado");
        $textButton = __("Actualizar");
        $route = route("encargado.update",['encargado'=>$encargado]);
        $update=true;
        return view("encargado.edit", compact("title","update", "textButton", "route", "encargado"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encargado $encargado)
    {
        $encargado->fill([
            'ci'=>$request->carnet,
            'nombres'=>$request->nombres,
            "apellidos"=>$request->apellidos,
            'correo_electronico'=>$request->email,
        ])->save();
        return redirect(route("encargado.index"))->with("success", __("¡Encargado Editado Correctamente!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encargado $encargado)
    {
        $usuario=User::where('id_encargados',$encargado->id);
        $usuario->delete();
        $encargado->delete();
        return redirect(route("encargado.index"))->with("success", __("¡Encargado Eliminado Correctamente!"));
    }
} 
