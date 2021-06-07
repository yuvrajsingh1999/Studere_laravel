<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <link rel="icon" type="image/png" href="img/brand/studere.png"/>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body style="background-image: linear-gradient(360deg, #f093fb 0%, #f5576c 70%);   background-size: cover; background-repeat: no-repeat; ">
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <ul class="navbar-nav mr-auto">
                    <div class="wrapper d-flex align-items-stretch">
                        <nav id="sidebar">
                                <div class="custom-menu ">
                                    <button type="button" id="sidebarCollapse" class="btn btn-primary fas fa-bars " value="{{ Auth::user()->name }}">     
                                    </button>
                                </div>
                                <div clas="container bg-white">
                                    {{-- <img src="img/brand/studere.png"> --}}
                                <a class="navbar-brand text-dark" style="margin-left:1000px;" href="{{ url('/') }}">
                                   <strong> {{ config('app.name') }} </strong>
                                </a>
                                </div>
                              <div class="img bg-wrap text-center py-4 mt-2" style="background-image: url(img/theme/bg_1.jpg);">
                                  <div class="user-logo">
                                      <div class="img" style="background-image: url(images/logo.jpg);"></div>
                                      <h3>{{ Auth::user()->name }}</h3>
                                  </div>
                              </div>
                        <ul class="list-unstyled components mb-5">
                          <li class="active">
                            <a href="/student"><span class="fa fa-home mr-3"></span> Home</a>
                          </li>

                          <li>
                            <a href="/studentprofile"><span class="fa fa-trophy mr-3"></span> Profile</a>
                          </li>
                          <li>
                              <a href="/showmaterial"><span class="fa fa-download mr-3 notif"></span> Study Material</a>
                          </li>

                          <li>
                            <a href="/stutimetable"><span class=" mr-3"></span> Time-Table</a>
                          </li>
                          <li>
                            <a href="/showatten"><span class="fas fa-clipboard-list mr-3"></span> Attendence</a>
                          </li>
                          <li>
                            <a href="/support"><span class="fa fa-support mr-3"></span> Support</a>
                          </li>
                          <li>
                          
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        
                
                        
                            {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a> --}}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </ul>
        
                            
                        </nav>
                                                
                            <main class="py-4">
                                @yield('student-content')
                            </main>
                        
                    </div>
                    
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                        @endguest
                    </ul>
                {{-- </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('student')
        </main>
    </div>


    @include('layouts.footer.adminfoot')

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
