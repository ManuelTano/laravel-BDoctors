<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BDoctors</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- JS --}}
    <script defer src="{{ asset('js/front.js') }}"></script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/ddb740f05b.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: fixed;
            right: 10px;
            top: 45px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 96px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .show-home {
            z-index: 10;
        }

        .show-home a {
            color: black;
            font-size: 16px;
        }

        .fixed-btn{
            top: 10px
        }
    </style>
</head>

<body>

    <div class="dropdown show-home flex-center top-right ml-4 fixed-btn">
        <button class="btn btn-primary dropdown-toggle flex-center p-2 " type="button" id="dropdownMenu2" data-toggle="dropdown"
           >
            <div class="d-none d-lg-block"> Sei un dottore? Clicca qui! </div>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}" class="dropdown-item">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="dropdown-item">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="dropdown-item">Registrati</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <div id="root"></div>
</body>

</html>
