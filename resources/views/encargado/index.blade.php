@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Lista de Encargados") }}</h4>
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
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("CI") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("NOMBRES") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("APELLIDOS") }}</th>
            <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("CORREO ELECTRONICO") }}</th>
        </tr>
    </thead>
    <tbody> 
        @forelse($encargado as $encargados)
            <tr>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $encargados->ci }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $encargados->apellidos }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $encargados->nombres }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $encargados->correo_electronico }}</td>
                <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                    <div class="inline-flex">
                        <a href="{{ route('encargado.edit', ['encargado' => $encargados]) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
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
    </tbody>
</table>
@stop

@section('css')
    
@stop

@section('js')
@stop
