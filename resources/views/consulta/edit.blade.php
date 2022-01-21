@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ $title }}</h4>
@stop

@section('content')

<form class="container form-group"
    method="POST"
    action="{{route('consulta.update',$consulta->id)}}"
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
        <input name="descripcion" type="text" value="{{ old('descripcion') ?? $consulta->descripcion }}" class="form-control" id="descripcion">
    </div>

    <div class="form-group">
        <label for="tamano">Tamaño</label>
        <input name="tamano" type="text" value="{{ old('tamano') ?? $consulta->tamano }}" class="form-control" id="tamano">
    </div>

    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input name="cantidad" type="number" value="{{ old('cantidad') ?? $consulta->cantidad }}" class="form-control" id="cantidad">
    </div>


    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input name="imagen" type="text" value="{{ old('ruta_imagen') ?? $consulta->ruta_imagen }}" class="form-control" id="imagen">
    </div>

    <button type="submit" class="btn btn-success">{{$textButton}}</button>
</form>
@stop

@section('css')
    
@stop

@section('js')
@stop