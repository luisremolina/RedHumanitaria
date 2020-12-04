@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalle del producto') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row">
                        <div class="col-12">
                            {{-- <img src="{{$item->id}}" alt="imagen" width="300px" height="300px"> --}}
                            <img src="{{asset('web/images/coming.jpg')}}" alt="imagen" width="100%" height="300px">
                           
                            <h4 class="mt-2">{{$productos->nombre}}</h4>
                            <p>{{$productos->descripcionLarga}}</p>
                            <h4>${{$productos->precioActual}}</h4>
                            
                            <a href="/" class="btn btn-primary" role="button" aria-pressed="true">Agregar al carrito</a>
                        <a href="{{route('productos-tienda')}}" class="btn btn-dark" role="button" aria-pressed="true">Volver</a>
                           
                            <hr>
                        </div>
                  


                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
