<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=Cliente::all();
        return view('cliente.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente=new Cliente();
        $ruta=route('cliente.store');
        return view('cliente.create',compact('ruta','cliente'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Cliente::create([
            'ci' =>$request->ci,
            'nombres' =>$request->name,
            'apellidos'=>$request->apellidos,
            'correo_electronico'=>$request->email,
        ]);
        $dato=Cliente::select('id')->where('ci',$request->ci)->get();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->ci),
            'id_cliente'=> $dato[0]['id'],
        ])->assignRole('cliente');

        $cliente=Cliente::all();
        return view('cliente.index',compact('cliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $update = true;
        $ruta=route('cliente.update',["cliente"=>$cliente]);
        return view('cliente.update',compact('ruta','cliente','update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fill([
            'ci' =>$request->ci,
            'nombres' =>$request->name,
            'apellidos'=>$request->apellidos,
            'correo_electronico'=>$request->email,
        ])->save();
        return redirect(route('cliente.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
