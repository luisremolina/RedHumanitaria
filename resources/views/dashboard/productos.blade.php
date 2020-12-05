@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-1"><a href="{{ route('carrito') }}" class="btn btn-warning" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i> <span class="badge badge-light">{{ count($cart)}}</span> </a></div>
        <div class="col-md-11 card-header">{{ __('Nuestros Productos') }}</div>
     
    </div>

    <div class="row mt-5 justify-content-center">
                 @foreach ($productos as $item)

                        <div class="card-deck col-4 mt-4">
                            <div class="card">
                              <img src="{{asset('web/images/coming.jpg')}}" class="card-img-top" alt="foto de algo ">
                              <div class="card-body">
                                <h4 style="text-transform: capitalize" class="card-title">{{$item->nombre}}</h4>
                                <p class="card-text">{{$item->descripcionCorta}}</p>
                               <div class="d-flex">
                                        {{-- <p class="card-text "><small class="text-muted"></small></p> --}}
                                        <h6 class="card-text"> ${{$item->precioActual}} <span class="badge badge-warning">New</span></h6>
                                        <h6 class="card-text ml-4" style="text-decoration: line-through;"> ${{$item->precioAnterior}}</h6>
                               </div>
                                <a style="font-size: 11px" href="{{route('cart', $item->id)}}" class="badge badge-primary">ADD TO CART</a>
                                <a style="font-size: 11px" href="{{route('detalle', $item->id)}}" class="badge badge-dark">DETALLES</a>
                              </div>
                            </div>
                          </div>

                        @endforeach


                    </div>
               
   
</div>
@endsection