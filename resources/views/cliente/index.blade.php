@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    <table class="border-collapse border text-center border-gray-500 mt-4" style="width:100%">
        <thead>
            <tr>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("CI") }}</th>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("NOMBRES") }}</th>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("APELLIDOS") }}</th>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("CORREO ELECTRONICO") }}</th>
            </tr>
        </thead>
    <tbody>
@forelse($cliente as $clientes)
    <tr>
        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $clientes->ci }}</td>
        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $clientes->nombres }}</td>
        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $clientes->apellidos }}</td>
        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $clientes->correo_electronico }}</td>
        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
            <div class="inline-flex">
                <a href="{{ route('cliente.edit', ['cliente' => $clientes]) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                    {{ __("Modificar") }}
                </a>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
            {{ __("LISTA DE ENCARGADOS VACIA") }}
        </td>
    </tr>
@endforelse

@stop

@section('css')

@stop

@section('js')
@stop