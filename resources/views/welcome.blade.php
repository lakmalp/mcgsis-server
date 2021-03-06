<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
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
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body style="background-color: white">
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register') && (!App\User::hasPrincipal()))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div id="app">
            <div class="container pt-5 mt-0">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-3 px-0 mx-0">
                            
                                {{-- <div class="col pt-3 px-0 mx-0">
                                    <div class="card">
                                        <img class="buddha_statue" width="100%;" src="{{asset('img/buddha_statue.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                                <div class="col pt-3 px-0 mx-0">
                                    <div class="card">
                                        <img class="buddha_statue" width="100%;" src="{{asset('img/templetree.jpg')}}" alt="Card image cap">
                                    </div>
                                </div>
                                <div class="col pt-3 px-0 mx-0">
                                    <div class="card">
                                        <img class="buddha_statue" width="100%;" src="{{asset('img/thestairs.jpg')}}" alt="Card image cap">
                                    </div>
                                </div> --}}
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-center">
                                {{-- <span class="col"> --}}
                                    <img src="{{asset('logo.png')}}" style="background-color: white;">
                                    <img class="buddha_statue" width="100%;" src="{{asset('img/olcott.jpg')}}" alt="Card image cap">
                                    {{-- <span> --}}
                                    <h1 class="mt-3 pt-3 mb-0" style="text-align: center;background-color: #FFA726;">School Information Management System</h1>
                                    {{-- </span> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="col-3 px-0 mx-0">
                                {{-- <div class="col pt-3 px-0 mx-0">
                                        <div class="card">
                                            <img class="buddha_statue" width="100%;" src="{{asset('img/olcott.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <div class="col pt-3 px-0 mx-0">
                                        <div class="card">
                                            <img class="buddha_statue" width="100%;" src="{{asset('img/buddha_statue.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <div class="col pt-3 px-0 mx-0">
                                        <div class="card">
                                            <img class="buddha_statue" width="100%;" src="{{asset('img/buddha_statue.jpg')}}" alt="Card image cap">
                                        </div>
                                    </div> --}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
