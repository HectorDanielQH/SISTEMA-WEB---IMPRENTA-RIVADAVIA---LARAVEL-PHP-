@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content_header')
<h1>Crea Tu Pedido</h1>
@if(isset($success))
    <div class="alert alert-primary" role="alert">
        Tu pedido se creo exitosamente
    </div>
@endif
@stop

@section('content')
    <span id="scri" class="d-none">1</span>
    <form 
        class="form-control-lg"
        method="POST"
        action="{{ route('pedido.store') }}"
    >
    @csrf
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Descripcion</th>
                <th scope="col">Tamaño</th>
                <th scope="col">Cantidad</th>
                <th class="d-none" scope="col">Precio</th>
                <th scope="col">Imagen(Opcional)</th>
                <th>Remover</th>
              </tr>
            </thead>
            <tbody id="lista">
                <tr id="fila1">
                    <td>
                        <textarea name="descripcion1" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </td>
                    <td>
                        <textarea name="tamano1" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                    </td>
                    <td>
                        <input name="cantidad1" type="number" class="form-control" min="0">
                    </td>
                    <td class='d-none'>
                        <input name="precio1" type="number" placeholder="0.00" required name="price" min="0" value="0" step="0.01" readonly>
                    </td>
                    <td>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">INSERTAR</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" onclick=remover(1) class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>






        <button type="submit" class="btn btn-primary">Realizar Pedido</button>
        <button type="button" class="btn btn-info" onclick="funcion()">AÑADIR FILA</button>
                    <script>
                        function funcion(){
                            let numero=0;
                            numero=parseInt(document.getElementById("scri").innerHTML);
                            numero+=1;
                            document.getElementById("scri").innerHTML=numero;
                            let fila=document.getElementById("lista");
                            lista.innerHTML += `
                            <tr id="fila${numero}">
                                <td>
                                    <textarea name="descripcion${numero}" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                </td>
                                <td>
                                    <textarea name="tamano${numero}" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                </td>
                                <td>
                                    <input name="cantidad${numero}" type="number" class="form-control" min="0">
                                </td>
                                <td class='d-none'>
                                    <input name="precio${numero}" type="number" placeholder="0.00" required name="price" min="0" value="0" step="0.01" readonly>
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupFileAddon01">INSERTAR</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" onclick=remover(${numero}) class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                            `;
                        }

                        function remover(no){
                            let valor="fila"+no;
                            let valoraso=document.getElementById(`${valor}`);
                            let padre=valoraso.parentNode;
                            padre.removeChild(valoraso);
                        }
                    </script>
    </form>
@stop

@section('css')

@stop

@section('js')
@stop