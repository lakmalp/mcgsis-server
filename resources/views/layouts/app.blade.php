<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        label {
            color: #666;
            font-size: .7rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{asset('logo.png')}}" width="45" height="51" class="d-inline-block align-top" alt="">
                    <span style="margin-top: 20px;">{{ config('app.name', 'SIS') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            @if(Route::currentRouteName() != "login")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register') && Route::currentRouteName() != "register")
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.index') }}">Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('teachers.index') }}">Teachers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('guardians.index') }}">Parents / Guardians</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownBasicData" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Basic Data <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBasicData">
                                    <a class="dropdown-item" href="{{ route('schools.index') }}">
                                        Schools
                                    </a>
                                    <a class="dropdown-item" href="{{ route('sports.index') }}">
                                        Sports
                                    </a>
                                    <a class="dropdown-item" href="{{ route('houses.index') }}">
                                        Houses
                                    </a>
                                    <a class="dropdown-item" href="{{ route('disabilities.index') }}">
                                        Disabilities
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->usertype == "principal")
                                    <a class="dropdown-item" href="{{ route('users.create') }}">
                                        Create User
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
@stack('script')
</html>
