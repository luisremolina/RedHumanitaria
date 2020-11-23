@extends('layouts.app')

@section('content')

<section id="recent-works">
    <div class="container">
        <div class="center fadeInDown">
            <h2>Trabajos Recientes</h2>
            <p class="lead">La Red Humanitaria es una asociación de organizaciones de la sociedad civil dedicada a la respuesta de emergencia dentro del proceso migratorio</p>
        </div>
    </div>
    <div class="container">
        <!-- Grid row -->

        <div class="gallery" id="gallery">

            <!-- Grid column -->
            <div class="mb-3 pics animation all 2">
                <img class="img-fluid" src="{{asset('web/images/red1.JPEG')}}" alt="Card image cap">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="mb-3 pics animation all 1">
                <img class="img-fluid" src="{{asset('web/images/red2.JPEG')}}" alt="Card image cap">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="mb-3 pics animation all 1">
                <img class="img-fluid" src="{{asset('web/images/red3.JPEG')}}" alt="Card image cap">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="mb-3 pics animation all 2">
                <img class="img-fluid" src="{{asset('web/images/red4.JPEG')}}" alt="Card image cap">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="mb-3 pics animation all 2">
                <img class="img-fluid" src="{{asset('web/images/red5.JPEG')}}" alt="Card image cap">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="mb-3 pics animation all 1">
                <img class="img-fluid" src="{{asset('web/images/red6.JPEG')}}" alt="Card image cap">
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->
    </div>

</section>
@endsection