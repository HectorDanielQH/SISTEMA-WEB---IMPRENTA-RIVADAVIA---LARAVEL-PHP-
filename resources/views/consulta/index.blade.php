@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
<h4>{{ __("Lista de Consultas") }}</h4>
@stop

@section('content')
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Consultas Por Descripcion</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Consultas Por Formulario</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">    
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="input-group justify-content-center align-items-center">
            <h4>{{ __("Busca por descripcion") }}</h4>
            <input type="text" class="m-3 texto form-control" aria-label="Text input with dropdown button" placeholder="Busca por descripcion">
            <h4>{{__('Busca por fecha')}}</h4>
            <input type="date" class="m-3 form-control" name="tiempo" id="tiempo_actual" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>">
        </div>

        <table class="table table-dark" style="width:100%">
            <thead>
                <tr >
                    <th colspan="3" scope="col" class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("ESTOS SON PEDIDOS TUYOS PUEDES REVISARLOS") }}</th>
                </tr>
            </thead>
            <tbody class='fila'>
                
                @forelse($consulta as $consultas)
                    <tr>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">Descripcion del pedido: <h3>{{ $consultas->descripcion }}</h3> en fecha: <h5>{{$consultas->created_at->year}}-{{$consultas->created_at->month}}-{{$consultas->created_at->day}}</h5></td>

                        <td class="border-solid border-4 border-gray-500 text-xs px-4 py-2">
                            <div class="inline-flex">
                                <a href="{{ route('consulta.show', $consultas->numero_consulta) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                    <h5>{{__("Visualizar Formulario de Consulta")}}</h5>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{ __("LISTA DE PEDIDOS VACIA") }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

    <div class="input-group justify-content-center align-items-center">
            <h4>{{ __("Busca por numero de consulta") }}</h4>
            <input type="number" class="m-3 numerodos form-control" aria-label="Text input with dropdown button" placeholder="Busca por descripcion" value="1">
            <h4>{{__('Busca por fecha')}}</h4>
            <input type="date" class="m-3 form-control" name="tiempodos" id="tiempoactualdos" value="<?php echo date("Y-m-d");?>" max="<?php echo date("Y-m-d");?>">
        </div>

        <table class="table table-dark" style="width:100%">
            <thead>
                <tr >
                    <th colspan="3" scope="col" class="bg-blue-900 text-gray-100 px-4 py-2">{{ __("ESTOS SON PEDIDOS TUYOS PUEDES REVISARLOS") }}</th>
                </tr>
            </thead>
            <tbody class='filados'>
                @forelse($consulta2 as $consultas)
                    <tr>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">Formulario del consulta Numero: <h3>{{ $consultas->numero_consulta }}</h3> Creado por: {{$consultas->clientes->nombres}} {{$consultas->clientes->apellidos}}</td>

                        <td class="border-solid border-4 border-gray-500 text-xs px-4 py-2">
                            <div class="inline-flex">
                                <a href="{{ route('consulta.show', $consultas->numero_consulta) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                    <h5>{{__("Visualizar Formulario de consulta")}}</h5>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border-solid border-2 border-gray-500 px-4 py-2" colspan="5">
                            {{ __("LISTA DE PEDIDOS VACIA") }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script defer>
        let texto="";
        $("#tiempo_actual").change(function(){
            texto=$('.texto').val();
            tiempo=$(this).val();
            if(texto.length==0){
                texto="*";
            }
            $.ajax({
                url:`consultabus/${texto}/${tiempo}`,
                method:'GET',
                data:{
                    text:texto,
                    tiempo_actual:tiempo,
                }
            }).done(function(res){
                let arreglo=JSON.parse(res);
                let cadena="";
                for(let i=0;i<arreglo.length;i++){
                    let fecha_mostrar="";
                    for(let j=0;j<arreglo[i]['created_at'].length;j++){
                        if(arreglo[i]['created_at'][j]=='T')
                            break;
                        fecha_mostrar+=arreglo[i]['created_at'][j];
                    }
                    cadena+=`
                    <tr>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">Descripcion del pedido: <h3>${arreglo[i]['descripcion']}</h3>en fecha: <h5>
                        ${fecha_mostrar}
                        </h5></td>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                            <div class="inline-flex">
                            <a href="consulta/${arreglo[i]['numero_consulta']}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                {{__("Visualizar Formulario de Consulta")}}
                            </a>
                            </div>
                        </td>
                    </tr>
                    `;
                }
                $('.fila').html(cadena);
            });
        });
                
                    
        $(".texto").keyup(function(){
            texto=$(this).val();
            tiempo=$('#tiempo_actual').val();
            if(texto==''){
                texto="*";
            }
            $.ajax({
                url:`consultabus/${texto}/${tiempo}`,
                method:'GET',
                data:{
                    text:texto,
                    tiempo_actual:tiempo,
                }
            }).done(function(res){
                let arreglo=JSON.parse(res);
                let cadena="";
                for(let i=0;i<arreglo.length;i++){
                    let fecha_mostrar="";
                    for(let j=0;j<arreglo[i]['created_at'].length;j++){
                        if(arreglo[i]['created_at'][j]=='T')
                            break;
                        fecha_mostrar+=arreglo[i]['created_at'][j];
                    }
                    cadena+=`
                    <tr>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">Descripcion del pedido: <h3>${arreglo[i]['descripcion']}</h3>en fecha: <h5>
                        ${fecha_mostrar}
                        </h5></td>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                            <div class="inline-flex">
                            <a href="consulta/${arreglo[i]['numero_consulta']}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                {{__("Visualizar Formulario de Consulta")}}
                            </a>
                            </div>
                        </td>
                    </tr>
                    `;
                }
                $('.fila').html(cadena);
            });
        });
    </script>


    <script defer>
        let textodos="";
        $("#tiempoactualdos").change(function(){
            textodos=$('.numerodos').val();
            tiempodos=$(this).val();
            $.ajax({
                url:`consultabusform/${textodos}/${tiempodos}`,
                method:'GET',
                data:{
                    text:textodos,
                    tiempo_actual:tiempodos,
                }
            }).done(function(res){
                let arreglo=JSON.parse(res);
                let cadena="";
                for(let i=0;i<arreglo.length;i++){
                    cadena+=`
                    <tr>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">Formulario del pedido Numero: <h3>${arreglo[i]['numero_consulta']}</h3>Crceado por: {{auth()->user()->clientes}} {{auth()->user()->clientes}}</td>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                            <div class="inline-flex">
                            <a href="consulta/${arreglo[i]['numero_consulta']}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                {{__("Visualizar Formulario de Consulta")}}
                            </a>
                            </div>
                        </td>
                    </tr>
                    `;
                }
                $('.filados').html(cadena);
            });
        });


        $(".numerodos").change(function(){
            textodos=$(this).val();
            tiempodos=$('#tiempoactualdos').val();
            $.ajax({
                url:`consultabusform/${textodos}/${tiempodos}`,
                method:'GET',
                data:{
                    text:textodos,
                    tiempo_actual:tiempodos,
                }
            }).done(function(res){
                let arreglo=JSON.parse(res);
                let cadena="";
                for(let i=0;i<arreglo.length;i++){
                    cadena+=`
                    <tr>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">Formulario del pedido Numero: <h3>${arreglo[i]['numero_consulta']}</h3>Crceado por: {{auth()->user()->clientes}} {{auth()->user()->clientes}}</td>
                        <td class="border-solid border-2 border-gray-500 text-xs px-4 py-2">
                            <div class="inline-flex">
                            <a href="consulta/${arreglo[i]['numero_consulta']}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                                {{__("Visualizar Formulario de Consulta")}}
                            </a>
                            </div>
                        </td>
                    </tr>
                    `;
                }
                $('.filados').html(cadena);
            });
        });

    </script>
@stop