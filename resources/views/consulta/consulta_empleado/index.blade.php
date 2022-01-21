@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
    <h4>{{ __("Lista de Consultas") }}</h4>
@stop

@section('content')
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Consultas Atendidos</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Consultas No Atendidos</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="border-collapse border text-center border-gray-500 mt-4" style="width:100%">
            <thead>
                <tr>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("LISTA DE CONSULTAS") }}</th>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("OPCIONES") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consulta as $consultas)
                    @if($consultas->atendido == 'SI')
                        <tr>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-">Esta Consulta {{ $consultas->atendido }} fue Atendido : De {{$consultas->clientes->nombres}} {{$consultas->clientes->apellidos}}</td>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                                <div class="inline-flex">
                                    <a href="{{ route('consulta.show', $consultas->numero_consulta) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                        {{ __("Visualizar Formulario de Consulta") }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{ __("LISTA DE CONSULTAS VACIA") }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <table class="border-collapse border text-center border-gray-500 mt-4" style="width:100%">
            <thead>
                <tr>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("LISTA DE CONSULTAS") }}</th>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("OPCIONES") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consulta as $consultas)
                    @if($consultas->atendido == 'NO')
                        <tr>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-">Esta Consulta {{ $consultas->atendido }} fue Atendido : De {{$consultas->clientes->nombres}} {{$consultas->clientes->apellidos}}</td>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                                <div class="inline-flex">
                                    <a href="{{ route('consulta.show', $consultas->numero_consulta) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                        {{ __("Visualizar Formulario de Consulta") }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{ __("LISTA DE CONSULTAS VACIA") }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@stop

@section('css')
    
@stop

@section('js')
@stop