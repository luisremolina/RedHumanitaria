@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-1"> <a style="font-size: 11px" href="{{ route('productos-tienda') }}"
                class="badge badge-dark">BACK STORE</a> </div>

        <div class="col-md-11">
                <div class="card-header">{{ __('Carrito de compras') }}</div>

                @if (session('cart'))
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr style="text-align:center;">
                            <th >Imagen</th>
                            <th >Descripcion</th>
                            <th >Cantidad</th>
                            <th >Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php $valor = 0 ?>
                        @foreach (session('cart') as $id => $details)
                        <?php $valor += $details['Precio'] * $details['Cantidad'] ?>
                        <tr heigth="300px" style="text-align:center;" >
                            <td width="200px"> <img style="object-fit: contain" src="{{ $details['Imagen']}}" alt="imagen" width="150"> </td>
                            <td width="">
                                <h6>{{  $details['Nombre']  }} </h6>
                                <hr>
                                <p>{{  $details['Descripcion']  }}</p>
                                <h4> <span id="valoritem" class="badge badge-primary"> ${{$details['Precio']}}</span></h4>
                                {{-- @include('dashboard/talla') --}}
                                <a style="font-size: 11px" href="{{ route('delete-cart', $id )}}" class="badge badge-danger">DELETE</a>
                                
                            </td>
                            <td style="vertical-align: middle">
                                <div class="d-flex justify-content-around">
                                    <a class="btn" href="{{route('cartDescon', $id)}}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                    <h4 class="mx-3" style="align-self: flex-end" name="quantity" id="quantity"> {{  $details['Cantidad']  }} </h4>
                                    <a class="btn" href="{{route('cartAument', $id)}}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                        
                                

                            </td>
                            <td style="vertical-align: middle">
                                <h4 name="total" id="total">$.{{ $details['Precio'] * $details['Cantidad'] }} </h4>
                            </td>
                        
                        @endforeach
                           
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2"></td>
                            <td> Valor Total </td>
                            <td> <h4> $. {{$valor}}</h4> </td>
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2"></td>
                            <td> </td>
                            <td> <a style="font-size: 20px" href="#" class="badge badge-danger">PAGAR </a> </td>
                        </tr>
                    </tbody>
                </table>
                @else 
                    <h1 class="lead mt-5 ml-5">No hay productos en el carrito</h1>
                @endif
           </div>
         </div>
    </div>
{{-- <script>
    window.onload = ()=>{

        const quantity = document.getElementById("quantity");
        // const buttonOp = document.getElementById("buttonop");
        // const valoritem = document.getElementById("valoritem");
        const button_plus = document.getElementById("button+");
        const button_minus = document.getElementById("button-");
        let items = 1;
        function increaseItem() {
        items++;
        quantity.textContent = items;
        }

        function decreaseItem(){
        if(items > 0) items--;
        quantity.textContent = items;
        }
        function total(){
            // total = items * valoritem; 
            // quantity.textContent = total;
        }

        button_plus.addEventListener("click", increaseItem);
        button_minus.addEventListener("click",decreaseItem);
        // buttonOp.addEventListener("click",total);

        }

</script> --}}

@endsection