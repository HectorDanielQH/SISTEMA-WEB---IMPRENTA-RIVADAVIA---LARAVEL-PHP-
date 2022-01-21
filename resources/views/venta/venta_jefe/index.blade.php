@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Lista de Ventas") }}</h4>
@stop

@section('content')
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Ventas Por Nombres</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ventas Por Descripción</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Vendedor</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">Ver Venta</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas_dos as $venta)
                <tr>
                    <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                    <td>{{$venta->vendedor->nombres}} {{$venta->vendedor->apellidos}}</td>
                    <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                    <td>{{$venta->fecha}}</td>
                    <td><a href="{{ route('venta.show', $venta->numero_venta) }}">Visualizar Formulario</a></td>
                </tr>
            @empty
                <strong>No exite datos</strong>
            @endforelse
        </tbody>
      </table>  
    </div>


    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <table class="table table-bordered table-dark">
          <thead>
              <tr>
                  <th scope="col">Cliente</th>
                  <th scope="col">Vendedor</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Ver Venta</th>
              </tr>
          </thead>
          <tbody>
              @forelse($ventas as $venta)
                  <tr>
                      <td>{{$venta->clientes->nombres}} {{$venta->clientes->apellidos}}</td>
                      <td>{{$venta->vendedor->nombres}} {{$venta->vendedor->apellidos}}</td>
                      <td>{{$venta->descripcion}}</td>
                      <td>{{$venta->created_at->year}}-{{$venta->created_at->month}}-{{$venta->created_at->day}}</td>
                      <td><a href="{{ route('venta.show', $venta->numero_venta) }}">Visualizar Formulario</a></td>
                  </tr>
              @empty
                  <strong>No exite datos</strong>
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