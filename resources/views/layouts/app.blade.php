<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/stylesheet.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="row header-row">
                    <div class="col-sm-7">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/logo_TeamUp-ss-cut.png') }}" class="header-img">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                @if (Auth::guest())
                                    <li><a href="{{ url('/') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Registrarme</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('/my-matches') }}">Mis partidos</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/matches') }}">Ver todos los partidos</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif

                                    <li class="dropdown theme-choice">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Themes<span class="caret"></span></a>
                                        
                                        <ul class="dropdown-menu">
                                            <li><a id="original" href="#">Messi</a></li>
                                            <li><a id="ortigoza" href="#">Gordo Ortigoza</a></li>
                                            <li><a id="peron" href="#">El General</a></li>
                                            <li><a id="fort" href="#">El Comandante</a></li>
                                        </ul>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous"></script>
    <!--script type="text/javascript" src="bootstrap/js/bootstrap.js"></script -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
