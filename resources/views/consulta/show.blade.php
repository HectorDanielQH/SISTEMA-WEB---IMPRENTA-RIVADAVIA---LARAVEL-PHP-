@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Formulario de Consulta") }}</h4>
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
        @forelse($consulta as $consultas)
            <tr>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $consultas->descripcion }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $consultas->tamano }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $consultas->cantidad }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $consultas->precio }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                    <div class="inline-flex">
                        <a href="{{ route('consulta.edit', $consultas) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            {{ __("Modificar") }}
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
    <div class="alert alert-light" role="alert">
        Si quieres imprimir la proforma dale click!!! --> <a href="{{route('proforma',$consulta[0])}}" class="btn btn-success">Descargar</a>
    </div>
    @stop

@section('css')
    
@stop

@section('js')
@stop