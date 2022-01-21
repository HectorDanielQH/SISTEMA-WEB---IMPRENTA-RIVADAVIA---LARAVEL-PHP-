<?php

namespace App\Http\Controllers;

use App\Models\Jefe;
use Illuminate\Http\Request;

class JefeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function show(Jefe $jefe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function edit(Jefe $jefe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jefe $jefe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jefe  $jefe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jefe $jefe)
    {
        //
    }
}
