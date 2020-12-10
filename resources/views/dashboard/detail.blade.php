@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                   <div class="row">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th>Producto</th>
                            <th>Detalles</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <tr>
                            <td width="300px">  <img style="object-fit: contain;" src="{{$productos->imagen}}" alt="imagen" width="100%" height="300px"> </td>

                            <td  width="400px">
                                <h3 style="text-transform: uppercase;">  {{$productos->nombre}} </h3>
                                <hr>
                                <h5>{{$productos->descripcionLarga}}</h5>
                                {{-- <p>Tallas:</p> --}}
                                {{-- @include('dashboard/talla') --}}
                                
                              <div class="badge text-wrap mt-4" style="display:flex">
                                <h4> <span class="badge badge-warning"> ${{$productos->precioActual}}</span></h4>
                                <p class="text-muted" style="text-decoration: line-through; margin-left: 4px; margin-top: 13px">${{$productos->precioAnterior}}</p>
                              </div>
                            
                            </td>
                            <td  width="300px">
                             <a href="{{route('cart', $productos->id)}}" class="btn btn-primary" role="button" aria-pressed="true">ADD TO CART</a>
                            <a href="{{route('productos-tienda')}}" class="btn btn-dark" role="button" aria-pressed="true">Volver</a>
                            @if ($cart)
                            <a href="{{ route('carrito') }}" class="btn btn-warning" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i> <span class="badge badge-light">{{ count($cart)}}</span> </a>
                            @else
                              <a href="{{ route('carrito') }}" class="btn btn-warning" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i></a>
                          @endif

                            </td>
                          </tr>
                         
                        </tbody>
                       </table>       

                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
