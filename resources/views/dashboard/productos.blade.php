@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-2"><a style="width: 100%" href="{{ route('carrito') }}" class="btn btn-success" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i> <span class="badge badge-primary">{{ count($cart)}}</span> </a></div>
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">{{ __('Nuestros Productos') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                  
                    <div class="row">
                        @foreach ($productos as $item)
                        <div class="col-6">
                            
                            <img src="{{asset('web/images/coming.jpg')}}" alt="imagen" width="100%" height="300px" class="" style="border-radius:5px;">

                            <h4 class="mt-2 text-center" style="text-transform: capitalize">{{$item->nombre}}</h4>
                            <p>{{$item->descripcionCorta}}</p>
                            <div class="badge text-wrap" style="display:flex">
                                <h4> <span class="badge badge-success"> ${{$item->precioActual}}</span></h4>
                                <p class="" style="text-decoration: line-through; margin-left: 4px; margin-top: 13px">${{$item->precioAnterior}}</p>
                              </div>

                            <a href="{{route('cart', $item->id)}}" class="btn btn-primary btn-lg btn-block"
                                role="button" aria-pressed="true">Agregar al carrito</a>
                            <a href="{{route('detalle', $item->id)}}" class="btn btn-secondary btn-lg btn-block"
                                role="button" aria-pressed="true">Ver detalles</a>
                            <hr>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection