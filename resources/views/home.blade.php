@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Bienvenido al Dashboard de la imprenta Rivadavia</h1>
@stop

@section('content')
    @can('cliente.home')
        <h1>Ponte barbijo es por tu bien!!!</h1>
        <h1>Mas sobre covid en Bolivia</h1>
        <iframe src="https://graphics.reuters.com/world-coronavirus-tracker-and-maps/es/countries-and-territories/bolivia/" frameborder="0"></iframe>
        <h1>Noticias que pueden interesarte</h1>
        <iframe src="https://elpotosi.net/" frameborder="0"></iframe>
    @endcan
    @can('encargado.home')
        <h1>Estadisticas {{now()}}</h1>
        <div class="container card-deck">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Consultas NO Atendidas</div>
                <div class="card-body">
                    <h5 class="card-title">{{$consulta}}</h5>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Pedidos NO Atendidas</div>
                <div class="card-body">
                    <h5 class="card-title">{{$pedido}}</h5>
                </div>
            </div>

            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Clientes hasta el dia de hoy</div>
                <div class="card-body">
                    <h5 class="card-title">{{$cliente}}</h5>
                </div>
            </div>
            
        </div>
        <div class="container">
        <h1>Ventas por Clientes</h1>
        <canvas id="myChart" class="canvas"></canvas>
        </div>
        <h1>Mas sobre covid en Bolivia</h1>
        <iframe src="https://graphics.reuters.com/world-coronavirus-tracker-and-maps/es/countries-and-territories/bolivia/" frameborder="0"></iframe>
        <h1>Noticias que pueden interesarte</h1>
        <iframe src="https://elpotosi.net/" frameborder="0"></iframe>
    @endcan
    @can('admin.home')
        <h1>Estadisticas {{now()}}</h1>
        <div class="container card-deck">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
            <div class="card-header">Consultas NO Atendidas</div>
                <div class="card-body">
                    <h5 class="card-title">{{$consulta}}</h5>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Pedidos NO Atendidas</div>
                <div class="card-body">
                    <h5 class="card-title">{{$pedido}}</h5>
                </div>
            </div>

            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Clientes hasta el dia de hoy</div>
                <div class="card-body">
                    <h5 class="card-title">{{$cliente}}</h5>
                </div>
            </div>
            
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Cantidad de Empleados</div>
                <div class="card-body">
                    <h5 class="card-title">{{$encargado}}</h5>
                </div>
            </div>
            
        </div>
        <div class="container">
        <h1>Ventas por Clientes</h1>
        <canvas id="myChart" class="canvas"></canvas>
        </div>
        <h1>Mas sobre covid en Bolivia</h1>
        <iframe src="https://graphics.reuters.com/world-coronavirus-tracker-and-maps/es/countries-and-territories/bolivia/" frameborder="0"></iframe>
        <h1>Noticias que pueden interesarte</h1>
        <iframe src="https://elpotosi.net/" frameborder="0"></iframe>
    @endcan
@stop

@section('css')
    <style>
        iframe{
            width:100%;
            height:100vh;
        }
        .canvas{
            display:flex;
            width:40%;
            height:400px;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: [
                @foreach($cliente_venta as $total)
                    '{{$total->clientes->nombres}}',
                @endforeach
            ],
            datasets: [{
                label: 'Bolivianos',
                data: [
                    @foreach($cliente_venta as $total)
                        {{$total->total}},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
 
@stop