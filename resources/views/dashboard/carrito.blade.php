@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Carrito de compras') }}, <a class="navbar-brand" href="{{ route('productos-tienda') }}">Tienda Virtual</a> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php $valor = 0 ?>
                     @if (session('cart'))

                        <table class="table">

                            <thead class="thead-dark">
                                <tr>
                                    <th> ID</th>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Cantidad</th>
                                    <th>Precio Total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>




                         @foreach (session('cart') as $id => $details)

                              <?php $valor += $details['Precio'] * $details['Cantidad'] ?>
                              <tr>
                              <th> {{ $id }}</th>
                                <th>{{  $details['Nombre']  }}</th>
                                <th>$./{{  $details['Precio']  }}</th>
                                <th>{{  $details['Cantidad']  }}</th>
                                <th>$./{{ $details['Precio'] * $details['Cantidad'] }}</th>
                                <th>

                                   
                                <a href="{{ route('delete-cart', $id ) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>

                                </th>
                            </tr>
                         @endforeach
                        </table>
                     @endif

                        <table style="margin-left: 57%">
                            <th>
                                <div class="bagde  text-wrap" style="width: 10rem;">
                            
                                <p>Valor $./ {{$valor}}</p>
                                <p>IVA $./ {{$valor * 0.19}}</p>
                                <p>Total $./ {{$valor+$valor*0.19}}</p>
                                
                                </div>
                            </th>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
