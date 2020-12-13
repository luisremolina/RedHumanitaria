<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    {{-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' /> --}}
    <link href="{{asset('web/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    @yield('links')

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombres }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                
                                <a href="{{ route('productos-tienda') }}" class="dropdown-item">Tienda virtual</a>

                                <a href="{{ route('agenda') }}" class="dropdown-item">Agendar Cita</a>

                                @if(auth()->user()->isAdmin())

                                <a href="{{ route('usuarios') }}" class="dropdown-item">Registrar Caminante</a>

                                <a href="{{ route('usuarios.registrados') }}" class="dropdown-item">Usuarios Registrados
                                </a>

                                <a href="{{ route('inventario') }}" class="dropdown-item">Registrar Inventario</a>

                                <a href="{{ route('kit') }}" class="dropdown-item">Detallar kit</a>

                                <a href="{{ route('producto') }}" class="dropdown-item">Registrar Producto</a>
                                <a href="{{ route('producto.registrados') }}" class="dropdown-item"> Ver Productos Registrados</a>
                                
                                <a href="{{ route('informeDonantes') }}" class="dropdown-item">Informes</a>
                                


                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session ('flash'))
        <div>
            <div class="alert alert-success" role="alert">
                <strong>AVISO</strong> {{session('flash')}}
                <button type="button" class="close" data-dismiss="alert" alert-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>
        </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!-- Scripts -->
{{-- <script src="{{ asset('web/jquery.min.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.tipo_kit').select2({
            tags: true,
            tokenSeparators: [','],
            maximumSelectionLength: 4
        });
    });
</script>
@yield('scripts')

</html>