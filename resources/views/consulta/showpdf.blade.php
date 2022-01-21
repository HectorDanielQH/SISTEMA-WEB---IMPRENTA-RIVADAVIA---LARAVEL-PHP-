<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
<div class="cabecera">
    <div>
        <h2>Imprenta Offset</h2>
        <h1>"RIVADAVIA"</h1>
        <h3>Dir.: Calle Fortunato Gumiel Nro. 34</h3>
        <h3>Zona: Central</h3>
        <h3>Cel.: 68392417</h3>
        <h3>NIT: 5100318017</h3>
        <h4>Potosí - Bolivia</h4>
    </div>
</div>

<div class="titulo-proforma">
    <h1>PRO-FORMA</h1>
</div>

<div class="datos">
    <h2>Potosí, {{now()->day}} de 
        @if(now()->month == 1)
            Enero
        @elseif(now()->month == 2)
            Febrero
        @elseif(now()->month == 3)
            Marzo
        @elseif(now()->month == 4)
            Abril
        @elseif(now()->month == 5)
            Mayo
        @elseif(now()->month == 6)
            Junio
        @elseif(now()->month == 7)
            Julio
        @elseif(now()->month == 8)
            Agosto
        @elseif(now()->month == 9)
            Septiembre
        @elseif(now()->month == 10)
            Octubre
        @elseif(now()->month == 11)
            Noviembre
        @else
            Diciembre
        @endif

        de {{now()->year}}
    </h2>
    <h3>Señor es: {{$consulta[0]->clientes->nombres}} {{$consulta[0]->clientes->apellidos}}</h3>
    <h3>Institución: {{$consulta[0]->clientes->institucion}}</h3>
    <h3>C.I./NIT: {{$consulta[0]->clientes->ci}}</h3>
</div>
<style>
    *{
        padding: 0px;
        margin: 0px;  
        font-family: Arial, Helvetica, sans-serif; 
        color:#696969;
    }
    body{
        width: 80%;
        margin:auto;
    }
    table{
        width: 100%;
        margin:auto;
        border-collapse: collapse;
    }
    thead{
        background: #E7334D;
    }
    th{
        border:1px solid white;
        color:white;
    }
    td{
        border:1px solid #A9A9A9;
        text-align:center;
    }
    .cabecera{
        width:100%;
        margin:50px 0px;
    }
    .cabecera div{
        align-items:center;
        
    }
    .cabecera div>*{
        font-size:15px;
    }
    .titulo-proforma{
        width:100%;
        padding-bottom:50px;
    }
    .datos>*{
        padding: 5px 0px;
        font-size:16px;
    }
    .datos{
        margin-bottom:15px;
    }
    th{
        padding:20px 10px;
    }
    td{
        padding:20px 10px;
    }
    .abajo{
        margin-top:150px;
        margin-bottom:70px;
    }
    .abajo>*{
        font-size:15px;
    }
</style>
<table>
    <thead>
        <tr>
            <th class="">{{ __("CANTIDAD") }}</th>
            <th class="">{{ __("DESCRIPCION") }}</th>
            <th class="">{{ __("TAMAÑO") }}</th>
            <th class="">{{ __("PRECIO") }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($consulta as $consultas)
            <tr>
                <td class="">{{ $consultas->cantidad }}</td>
                <td class="">{{ $consultas->descripcion }}</td>
                <td class="">{{ $consultas->tamano }}</td>
                <td class="">{{ $consultas->precio }}</td>
            </tr>
        @empty
            <tr>
                <td class="" colspan="5">
                    {{ __("LISTA DE PEDIDOS VACIA") }}
                </td>
            </tr>
        @endforelse
        <tr>
            <td></td>
            
            <td colspan="2">Total</td>
            <td>{{$consulta->sum('precio')}}</td>
        </tr>
    </tbody>
</table>

<div class="abajo">
<h5>....................................................................................</h5>
    <h3>Sr. Hector Quispe</h3>
    <h3>Gerente Propietario</h3>
</div>

</body>
</html>