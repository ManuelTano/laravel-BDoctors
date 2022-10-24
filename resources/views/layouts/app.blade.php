<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Additional scripts --}}
    @yield('additional-scripts')

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/ddb740f05b.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand m-0 mr-3" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="mr-5">
                                <a href="{{ url('/home') }}" class="text-decoration-none text-secondary"><i class="fa-solid fa-house mr-2"></i>Il Mio Profilo</a>
                            </li>
                            <li class="mr-5">
                                <a href="{{ route('admin.messages.index') }}" class="text-decoration-none text-secondary"><i class="fa-solid fa-comments mr-2"></i>I Tuoi Messaggi</a>
                            </li>
                            <li class="mr-5">
                                <a href="{{ route('admin.reviews.index') }}" class="text-decoration-none text-secondary"><i class="fa-solid fa-users mr-2"></i>Le Tue Recensioni</a>
                            </li>
                            <li class="mr-5">
                                <a href="{{ route('admin.sponsorships.index') }}" class="text-decoration-none text-secondary"><i class="fa-solid fa-cart-flatbed-suitcase mr-2"></i>Piani d'acquisto</a>
                            </li>
                            <li class="mr-5">
                                <a href="" class="text-decoration-none text-secondary"><i class="fa-solid fa-chart-column mr-2"></i>Statistiche</a>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Effettua Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                {{-- Logged User --}}
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                {{-- Logout --}}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     {{-- Edit profile --}}
                                     <a class="dropdown-item" href="{{ route('admin.userdetails.edit') }}">
                                        Modifica Profilo
                                    </a>
                                    
                                    {{-- Logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Effettua Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
