@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Lista de Pedidos") }}</h4>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{session('success')}}
    </div>
@endif
<table class="border-collapse border text-center border-gray-500 mt-4" style="width:100%">
    <thead>
        <tr>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("DESCRIPCION") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("TAMAÑO") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("CANTIDAD") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("PRECIO") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("OPCIONES") }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pedido as $pedidos)
            <tr>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->descripcion }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->tamano }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->cantidad }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->precio }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                    <div class="inline-flex">
                        <a href="{{ route('pedido.edit', $pedidos) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            {{ __("Poner Precio") }}
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                    {{ __("LISTA DE PEDIDOS VACIA") }}
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
    
@stop

@section('css')
    
@stop

@section('js')
@stop