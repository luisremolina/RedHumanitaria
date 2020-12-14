@extends('layouts.welcome')

@section('content')

<div class="container margen">

    <div class="row">
        <div class="col-md-12 text center">
            <div class="form-group ">
                      {{-- <button type="submit" class="btn btn-primary">Guardar</button><a href=" {{ route('pagina-main.opciondonar' ) }} " class="btn btn-secondary">Ver Registrados</a> --}}
              </div>
                       <a class="btn btn-primary btn-lg" target="_blank" href="https://www.nequi.com.co/">Donar
                                    con nequi</a>
                       <a class="btn btn-primary btn-lg" target="_blank"
                       href="https://www.paypal.com/co/home">Donar con paypal</a> 
         <br>
                       <img class="img-fluid" src="{{asset('web/images/grac.JPEG')}}" alt="Card image cap">

              </div>
                 
            </div>
        </div>
    </div>
</div>


@endsection