@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Detalle del producto') }}</div> --}}

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
                            {{-- <th>Precio</th> --}}
                            {{-- <th>Cantidad</th> --}}
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          <tr>
                            <td width="300px">  <img src="{{asset('web/images/coming.jpg')}}" alt="imagen" width="100%" height="300px"> </td>

                            <td  width="400px">
                                <h3 style="text-transform: uppercase;">  {{$productos->nombre}} </h3>
                                <hr>
                                <h5>{{$productos->descripcionLarga}}</h5>
                                <p>Tallas:</p>
                                <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                            L
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                            <label class="form-check-label" for="exampleRadios2">
                                            XL
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                                            <label class="form-check-label" for="exampleRadios3">
                                            S
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                                            <label class="form-check-label" for="exampleRadios3">
                                            M
                                            </label>
                              </div>
                              <div class="badge text-wrap mt-4" style="display:flex">
                                <h4> <span class="badge badge-warning"> ${{$productos->precioActual}}</span></h4>
                                <p class="text-muted" style="text-decoration: line-through; margin-left: 4px; margin-top: 13px">${{$productos->precioAnterior}}</p>
                              </div>
                            
                            </td>
                            <td  width="300px">
                             <a href="{{route('cart', $productos->id)}}" class="btn btn-primary" role="button" aria-pressed="true">ADD TO CART</a>
                            <a href="{{route('productos-tienda')}}" class="btn btn-dark" role="button" aria-pressed="true">Volver</a>

                            <a href="{{route('carrito')}}" class="btn btn-warning" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i> <span class="badge badge-danger">{{ count($cart)}}</span></a>

                            {{-- <div class="col-1 "><a style="display:flex" href="{{ route('carrito') }}" class="btn btn-warning" role="button" aria-pressed="true"> </a></div> --}}
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
