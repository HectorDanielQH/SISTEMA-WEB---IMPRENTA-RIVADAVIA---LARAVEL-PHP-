@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Esta es la compra del cliente ") }}{{$clientes[0]['nombres']}} {{$clientes[0]['apellidos']}}</h4>
<h4>C.I.: {{$clientes[0]['ci']}}</h4>
@stop

@section('content')
<div class="tab-content" id="pills-tabContent">
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
                <tr>
                    <td>{{$venta->created_at->year}}-{{$venta->created_at->month}}-{{$venta->created_at->day}}</td>
                    <td>{{$venta->descripcion}}</td>
                    <td>{{$venta->cantidad}}</td>
                    <td>{{$venta->precio}}</td>
                    <td>{{$venta->cantidad * $venta->precio}}</td>
                </tr>
            @empty
                <strong>No exite datos</strong>
            @endforelse
            <tr>
                <td></td>
                <td colspan="3">Total</td>
                <td>{{$suma[0]['total']}}</td></tr>
        </tbody>
    </table>  
</div>

@stop

@section('css')
    
@stop

@section('js')
@stop