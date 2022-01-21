@extends("layouts.app")
@section('content')

<div class="w-full bg-gray-200 p-4 my-5">
    <div class="text-center">
        <h1 class="mb-5 text-4xl">{{ $title }}</h1>
        <a href="{{ route('home') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 my-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Volver a principal") }}
        </a>
    </div>
    
</div>
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
        <input name="descripcion" type="text" value="{{ old('descripcion') ?? $pedido->descripcion }}" class="form-control" id="descripcion">
    </div>

    <div class="form-group">
        <label for="tamano">Tamaño</label>
        <input name="tamano" type="text" value="{{ old('tamano') ?? $pedido->tamano }}" class="form-control" id="tamano">
    </div>

    <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input name="cantidad" type="number" value="{{ old('cantidad') ?? $pedido->cantidad }}" class="form-control" id="cantidad">
    </div>


    <div class="form-group">
        <label for="imagen">Imagen</label>
        <input name="imagen" type="text" value="{{ old('ruta_imagen') ?? $pedido->ruta_imagen }}" class="form-control" id="imagen">
    </div>

    <button type="submit" class="btn btn-primary">{{$textButton}}</button>
</form>

@endsection