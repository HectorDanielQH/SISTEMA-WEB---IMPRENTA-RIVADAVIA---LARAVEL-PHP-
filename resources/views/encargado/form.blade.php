<div class="w-full bg-gray-200 p-4 my-5">
    <div class="text-center">
        <h1 class="mb-5 text-4xl">{{ $title }}</h1>
    </div>
</div>
<form class="form-group"
    class=""
    method="POST"
    action="{{ $route }}"
>
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    @if(session('success'))
    <div class="alert alert-primary" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="form-group">
        <label for="carnet-identidad">Carnet de Identidad</label>
        <input name="carnet" type="number" value="{{ old('ci') ?? $encargado->ci }}" class="form-control" id="carnet-identidad">
    </div>

    <div class="form-group">
        <label for="carnet-identidad">Nombres</label>
        <input name="nombres" type="text" value="{{ old('nombres') ?? $encargado->nombres }}" class="form-control" id="carnet-identidad">
    </div>

    <div class="form-group">
        <label for="carnet-identidad">Apellidos</label>
        <input name="apellidos" type="text" value="{{ old('apellidos') ?? $encargado->apellidos }}" class="form-control" id="carnet-identidad">
    </div>


    <div class="form-group">
        <label for="carnet-identidad">Correo Electronico</label>
        <input name="email" type="email" value="{{ old('correo_electronico') ?? $encargado->correo_electronico }}" class="form-control" id="carnet-identidad">
    </div>


    <button type="submit" class="btn btn-primary">{{$textButton}}</button>
</form>
