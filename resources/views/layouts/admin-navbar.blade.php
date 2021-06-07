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
    

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="css/style.css">


    {{-- ChartStyle --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</head>
<body style="background-image: linear-gradient(360deg, #f093fb 0%, #f5576c 70%);   background-size: cover; background-repeat: no-repeat; ">
    <div id="app" >
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    <!-- Left Side Of Navbar -->
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
                                <a href="/admin"><span class="fa fa-home mr-3"></span> Home</a>
                              </li>
                              <li>
                                  <a href="/requestaccount"><span class="fa fa-download mr-3 notif"></span> Account Request</a>
                              </li>
                              <li>
                                  <a href=""><span class="fa fa-download mr-3 notif"></span> Facutly list</a>
                              </li>
                              <li>
                                  <a href=""><span class="fa fa-download mr-3 notif"></span> Student list</a>
                              </li>
                              <li>
                                  <a href="{{ route('courses') }}">Course</a>
                                </li>
                              <li>
                                  <a href="{{ route('departments') }}">Departments</a>
                            </li>
                              <li>
                                  <a href="{{ route('timetable.showAll') }}">Time table</a>
                                </li>

                            <li>
                                <a href="{{ route('venues') }}">Venues</a>
                            </li>
                            <li>
                                <a href="{{ route('settings') }}">Settings</a>
                            </li>
                              <li>
                                <a href="/mailadmin"><span class="fa fa-gift mr-3"></span> Mail</a>
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
                                    @yield('admin-content')
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
                        
                        @endguest
                    </ul>
                {{-- </div>
            </div>
        </nav> --}}

        {{-- <main class="py-4">
            @yield('admin')
        </main> --}}
    </div>
    @include('layouts.footer.adminfoot')

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
