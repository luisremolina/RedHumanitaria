@extends('layouts.app')

@section('content')


<div class="container ">
    <div class="row justify-content-center">
        <a class="col-6 my-2 btn btn-primary" href="{{route('pdf-user')}}"> GENERAR INFORME DE USUARIOS </a>
    </div>
    <div class="row justify-content-center">
        <a class="col-6 my-2 btn btn-primary" href="{{route('pdf-donacion')}}"> GENERAR INFORME DE DONACIONES </a>
    </div>
    <div class="row justify-content-center">
        <a class="col-6 my-2 btn btn-primary" href="{{route('pdf-kit')}}"> GENERAR INFORME DE KITS </a>
    </div>
    <div class="row justify-content-center">
        <a class="col-6 my-2 btn btn-primary" href="{{route('pdf-inventario')}}"> GENERAR INFORME DE INVENTARIO </a>
    </div>
    <div class="row justify-content-center">
        <a class="col-6 my-2 btn btn-primary" href="{{route('pdf-producto')}}"> GENERAR INFORME DE PRODUCTOS </a>
    </div>
    

</div>


@endsection