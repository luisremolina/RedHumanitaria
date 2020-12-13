@extends('layouts.app')

@section('content')
    <div class="container">
     
        <div class="row">
          <h5 class="mb-4">DESCARGAR INFORMES</h5>
           <div class="col-4">
              <a class="btn btn-success mr-3" href="{{ route('informeUsuarios') }}" target="_blank">Descargar PDF</a>
          </div>
          <br>
          <div class="col-4">
            <a class="btn btn-success mr-3" href="{{ route('informes') }}" target="_blank">Descargar PDF</a>
        </div>
        <br>
        <div class="col-4">
            <a class="btn btn-success" href="{{ route('descargaPDF') }}" target="_blank">Descargar PDF</a>     
           </div>
        </div>
      
@endsection
