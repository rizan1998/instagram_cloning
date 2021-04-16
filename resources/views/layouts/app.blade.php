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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        {{-- @if (Auth()->check())
                              
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Home</a>
                        </li>
                        @endif  --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                               
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('posts/create')? "active":"" }} 
                            {{ Request::is('posts/create/*')? "active":"" }} " href="/posts/create">Upload Foto</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link {{ Request::is('@'.Auth::user()->username)? "active":"" }} 
                            {{ Request::is('@'.Auth::user()->username.'/*')? "active":"" }} {{ Request::is('user/edit')? "active":"" }}  " href="/{{'@'.Auth::user()->username}}">{{ Auth::user()->username }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('notification')? "active":"" }} 
                            {{ Request::is('notification'.'/*')? "active":"" }}" href="/notification">Notifs <small id="notif-count" class="badge badge-danger" ></small></a>
                            
                            <script>
                                fetch('/notification/count')
                                .then(Response => Response.json())
                                .then(data => {
                                    console.log(data.total)
                                    document.getElementById('notif-count').innerText = parseInt(data.total)
                                }).catch(err => {console.log(err)});
                            </script>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </li>
                           
                        @endguest
                        <li class="nav-item dropdown">
                        
                            <form class="form-inline" method="get" action="/search" >
                              <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
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
