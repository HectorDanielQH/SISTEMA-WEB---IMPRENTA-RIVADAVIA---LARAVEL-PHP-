@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h4>{{ __("Lista de Pedidos") }}</h4>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-primary" role="alert">
            {{session('success')}}
        </div>
    @endif
    <table class="table table-bordered table-dark" style="width:100%">
        <thead>
            <tr>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("DESCRIPCION") }}</th>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("TAMAÑO") }}</th>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("CANTIDAD") }}</th>
                <th class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("PRECIO") }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedido as $pedidos)
                <tr>
                    <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->descripcion }}</td>
                    <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->tamano }}</td>
                    <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->cantidad }}</td>
                    <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">{{ $pedidos->precio }}</td>
                </tr>
            @empty
                <tr>
                    <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                        {{ __("LISTA DE PEDIDOS VACIA") }}
                    </td>
                </tr>
            @endforelse
            <tr>
                <td></td>
                <td colspan="2">TOTAL</td>
                <td>{{$total}} 
                </td>
            </tr>

            <tr>
                <td colspan="4">
                    <h3>Puedes Depositar a esta cuenta</h3>
                    <button class="btn btn-warning boton">
                        <div id="paypal-button-container"></div>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <div class="alert alert-success" role="alert">
        <h6>
        Nota!!
            <ul>
                <br>
                <h6><li>Espera a que los pedidos tengan precio</li></h6>
                <h6><li>No tarda mas de 5 a 15 minutos</li></h6>
                <h6><li>Saca una foto o captura de pantalla del deposito</li></h6>
            </ul>
        </h6>
        <h6>Puedes hacernos llegar tu comprobante de deposito aqui!!!---->>><a href="https://api.whatsapp.com/send?phone=+59168392417&text=Hola!!!%20soy%20cliente%20de%20la%20imrpenta%20Rivadavia,%20les%20envio%20el%20comprobante%20para%20el%20trabajo" class="btn btn-danger">Pulsame!!!</a></h6>
    </div>

@stop

@section('css')
<style>
    .texto{
        font-size:35px;
        
    }
    .boton{
        margin-left:5px;
    }
</style>
@stop

@section('js')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script defer>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size:  'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'gold'   // gold | blue | silver | black
        },
 
        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
 
        client: {
            sandbox:    'AQqO0_MOy1tPbkeLpaP0gIjHM45Wf0Ei7UymUP5HSDP81wkvwNJGmGlYaygqoaaV8QD4YZFrBOWfQUTd',
            production: '<insert production client id>'
        },
 
        // Wait for the PayPal button to be clicked
 
        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '{{$total}}', currency: 'USD' }, 
                            description:"Compra de productos a imprenta Rivadavia :${{$total}}",
                            custom:"Codigo"
                        }
                    ]
                }
            });
        },
 
        // Wait for the payment to be authorized by the customer
 
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('El pago se realizo con exito');
            });
        }
    
    }, '#paypal-button-container');
</script>
@stop