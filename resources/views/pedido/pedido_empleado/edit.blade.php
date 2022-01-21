@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ $title }}</h4>
@stop

@section('content')

<form class="form-group"
    method="POST"
    action="{{route('pedido.update',['pedido'=>$pedido])}}"
>
    @method("PUT")
    @csrf
    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input name="descripcion" type="text" value="{{ old('descripcion') ?? $pedido->descripcion }}" class="form-control" id="descripcion" disabled>
    </div>

    <div class="form-group">
        <label for="tamano">Tamaño</label>
        <input name="tamano" type="text" value="{{ old('tamano') ?? $pedido->tamano }}" class="form-control" id="tamano" disabled>
    </div>

    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input name="cantidad" type="number" value="{{ old('cantidad') ?? $pedido->cantidad }}" class="form-control" id="cantidad" disabled>
    </div>


    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input name="imagen" type="text" value="{{ old('ruta_imagen') ?? $pedido->ruta_imagen }}" class="form-control" id="imagen">
    </div>

    
    <div class="form-group">
        <label for="precio">Precio</label>
        <input name="precio" type="number" step="0.01" value="{{ old('precio') ?? $pedido->precio }}" class="form-control" id="cantidad">
    </div>


    <button type="submit" class="btn btn-primary">{{$textButton}}</button>
</form>

@stop

@section('css')
    
@stop

@section('js')
@stop