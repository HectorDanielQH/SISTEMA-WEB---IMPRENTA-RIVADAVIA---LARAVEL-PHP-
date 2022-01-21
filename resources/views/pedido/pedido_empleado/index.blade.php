@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Lista de Pedidos") }}</h4>
@stop

@section('content')
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pedidos Atendidos</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pedidos No Atendidos</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <table class="border-collapse border text-center border-gray-500 mt-4" style="width:100%">
            <thead>
                <tr>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("LISTA DE PEDIDOS") }}</th>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("OPCIONES") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedido as $pedidos)
                    @if($pedidos->atendido == 'SI')
                        <tr>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-">Este Pedido {{ $pedidos->atendido }} fue Atendido : De {{$pedidos->clientes->nombres}} {{$pedidos->clientes->apellidos}}</td>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                                <div class="inline-flex">
                                    <a href="{{ route('pedido.show', $pedidos->numero_pedido) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                        {{ __("Visualizar Formulario de Pedido") }}
                                    </a>
                                    <a
                                        href="#"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"
                                    >
                                        {{ __("Ver compras") }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{ __("LISTA DE PEDIDOS VACIA") }}
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
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("LISTA DE PEDIDOS") }}</th>
                    <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("OPCIONES") }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pedido as $pedidos)
                    @if($pedidos->atendido == 'NO')
                        <tr>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-">Este Pedido {{ $pedidos->atendido }} fue Atendido : De {{$pedidos->clientes->nombres}} {{$pedidos->clientes->apellidos}}</td>
                            <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                                <div class="inline-flex">
                                    <a href="{{ route('pedido.show', $pedidos->numero_pedido) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                        {{ __("Visualizar Formulario de Pedido") }}
                                    </a>
                                    <a
                                        href="#"
                                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r"
                                    >
                                        {{ __("Ver compras") }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{ __("LISTA DE PEDIDOS VACIA") }}
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