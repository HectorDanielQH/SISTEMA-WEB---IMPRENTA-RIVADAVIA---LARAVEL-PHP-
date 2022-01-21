@extends('adminlte::page')

@section('title', 'Dashboard')
 
@section('content_header')
    <h4>{{ __("Realizar Venta") }}</h4>
    @if(isset($success))
      <div class="alert alert-primary" role="alert">
          {{$success}}
      </div>
    @endif
@stop

@section('content')
  <form action='{{$route}}' method="post">
    @csrf
    <div>
    <input id="myInput" type="text" name="usuario" placeholder="Coloca el Carnet del Usuario">
    </div>
    <br>
    <div class="form form-container">
    <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Cantidad</th>
          <th scope="col">Descripcion</th>
          <th scope="col">P.U.</th>
          <th scope="col">Sub Total</th>
        </tr>
      </thead>
      <tbody class="tabla">
        <tr>
          <th scope="row"></th>
          <td colspan="3">Total</td>
          <td class="total-total">0</td>
        </tr>
      </tbody>
    </table>
    <button type="button" class="aderir btn btn-outline-danger" onclick="">Agregar Fila</button>
    <button type="submit" class="btn btn-outline-success">Realizar Venta</button>
    </div>
    </form>
@stop

@section('css')
<style>
* {
  box-sizing: border-box;
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
  color:black;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
  color:black;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
  color:black;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
  color:black;
}

.autocomplete-items {
  position: relative;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  color:black;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  color:black;
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
  color:black;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff;
  color:black; 
}
.cantidad{
  width: 100%;
  margin:0px;
}
</style>
@stop

@section('js')

<script>
  let num=1;
  $('.aderir').click(function(){

    $('.tabla').before(
      `<tr class='fila${num}'>
          <td>
            <button type="button"  class="btn btn-danger" onclick="
              $('.fila${num}').remove();
            "><i class="fas fa-trash-alt"></i></button>
          </td>
          <td>
            <input name="cantidad${num}" type="number" class="form-control" id="cantidad${num}" value="0"  onchange="fila(this)">
            
          </td>
            <td><input name="descripcion${num}" type="text" class="descripcion form-control" id="texto${num}"></td>
            <td><input name="precio${num}" type="number" step="0.01" class="preciounitario${num} form-control" onchange="fila_dos(this)" id="precio${num}" value="0"></td>
            <td><input type="number" readonly step="0.01" class="subtotal${num} form-control" id="staticEmail2" value="0"></td>
        </tr>`
    );
    num+=1;
  });

  function fila(rr){
    let numero=$(rr).attr('id');
    numero=numero.replace('cantidad','');
    let subtotal=parseFloat($(rr).val())*parseFloat($(`.preciounitario${numero}`).val());
    $(`.subtotal${numero}`).val(subtotal.toFixed(2));

    let tabla=document.getElementsByTagName('table');
    let  ce=tabla[0].getElementsByTagName('tr');
    let total_resultado=0.0;
    for(let i=1;i<ce.length-1;i++){
      let valor=ce[i].cells[4];
      total_resultado+=parseFloat($(valor).children('input').val());
    }
    $('.total-total').html(total_resultado.toFixed(2));
  }

  function fila_dos(rr){
    let numero=$(rr).attr('id');
    numero=numero.replace('precio','');
    let subtotal=parseFloat($(rr).val())*parseFloat($(`#cantidad${numero}`).val());
    $(`.subtotal${numero}`).val(subtotal.toFixed(2));

    let tabla=document.getElementsByTagName('table');
    let  ce=tabla[0].getElementsByTagName('tr');
    let total_resultado=0.0;
    for(let i=1;i<ce.length-1;i++){
      let valor=ce[i].cells[4];
      total_resultado+=parseFloat($(valor).children('input').val());
    }
    $('.total-total').html(total_resultado.toFixed(2));
  }
</script>


<script>
  function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }
  
  /*An array containing all the country names in the world:*/
  var countries = [
      @foreach($cliente as $cliente)
          "{{$cliente->ci}} - {{$cliente->nombres}} {{$cliente->apellidos}}",
      @endforeach
  ];
  
  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("myInput"), countries);
</script>

@stop