<form 
    class="container"
    action="{{$ruta}}" 
    method="post"
>
@csrf
@isset($update)
        @method("PUT")
@endisset
        <div class="input-group mb-3">
            <input type="number" name="ci" class="form-control {{ $errors->has('ci') ? 'is-invalid' : '' }}"
                   value="{{$cliente->ci}}" placeholder="{{ __('Carnet de Identidad') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-address-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>



        {{-- Nombres --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ $cliente->nombres }}" placeholder="{{ __('Nombres') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>


        {{-- Apellidos --}}
        <div class="input-group mb-3">
            <input type="text" name="apellidos" class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}"
                   value="{{ $cliente->apellidos  }}" placeholder="{{ __('Apellidos') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ $cliente->correo_electronico }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('Registrar') }}
        </button>

    </form>