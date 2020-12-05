@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-1"> <a style="font-size: 11px" href="{{ route('productos-tienda') }}" class="badge badge-dark">BACK STORE</a> </div>
        
        <div class="col-md-11">
            <div class="card">
            
                <div class="card-header">{{ __('Carrito de compras') }}</div>

                    <?php $valor = 0 ?>
                     @if (session('cart'))
                        <table class="table table-striped ">
                            <thead class="">
                                <tr>
                                
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Cantidad</th>
                                    <th>Precio Total</th>
                                </tr>
                            </thead>
                         @foreach (session('cart') as $id => $details)
                             

                              <?php $valor += $details['Precio'] * $details['Cantidad'] ?>
                              <tr>
                                 <th width="300px">
                                  <img style="object-fit: contain;" src="{{ $details['Imagen']}}" alt="imagen" width="150" height="">
                                </th>
                                
                                <th width="300px"> 
                                    <h3>{{  $details['Nombre']  }} </h3> <hr>
                                    <h4> <span class="badge badge-primary"> ${{$details['Precio']}}</span></h4>
                                    <a style="font-size: 11px" href="{{ route('delete-cart', $id )}}" class="badge badge-danger">DELETE</a> 
                                </th>
                                <th> <h5> {{  $details['Cantidad']  }} </h5> </th>
                                <th> <h4>$.{{ $details['Precio'] * $details['Cantidad'] }}</h4> </th>

                            </tr>
                         @endforeach
                            <tr>
                                <th></th>
                                <th></th>
                                <th> Valor Total   </th>
                                <th> <h4> $. {{$valor}}</h4> </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>  </th>
                                <th> <a style="font-size: 20px" href="/" class="badge badge-danger">PAGAR </a> </th>
                            </tr>
                        </table>
                     @endif

                        {{-- <table style="margin-left: 57%">
                            <th>
                                <div class="bagde  text-wrap" style="width: 10rem;">
                            
                                <p>Valor $./ {{$valor}}</p>
                                <p>IVA $./ {{$valor * 0.19}}</p>
                                <p>Total $./ {{$valor+$valor*0.19}}</p>
                                
                                </div>
                            </th>
                        </table> --}}

                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
