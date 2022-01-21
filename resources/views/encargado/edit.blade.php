@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Lista de Ventas") }}</h4>
@stop

@section('content')
    <div class="flex justify-center flex-wrap p-4 mt-5">
        @include("encargado.form")
    </div>
@stop

@section('css')
    
@stop

@section('js')
@stop
