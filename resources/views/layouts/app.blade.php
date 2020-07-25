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
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color:#212123;background-image:url('/img/logo.png');background-repeat:no-repeat;background-position:90% 50%" > 
    <div id="app">
        <nav class="navbar position-relative" style="background-color: #e5ba37">
            <div class="container-fluid">
                <a class="navbar-brand" style="color:#18298C" href="{{ url('/') }}"><img style="height:40px" src='/img/logo.png'><small><small> by </small>DCIX</small></a>
                <nav class="d-flex">
                    <!-- Authentication Links -->
                        <a class="nav-item px-0">
                            <a class="nav-link px-2 " href="/devlogs">DevLogs</a>
                        </a>
                    @guest
                        <a class="nav-item px-0" style="text-">
                            <a class="nav-link px-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </a>
                        @if (Route::has('register'))
                            <a class="nav-item px-0">
                                <a class="nav-link px-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </a>
                        @endif
                    @else
                        <a class="nav-item">
                                <a class="nav-link" href="/devlogs/create">Create</a>
                        </a>
                        <a class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>  
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>  
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </a>
                        
                    @endguest
                </nav>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>
</html>
