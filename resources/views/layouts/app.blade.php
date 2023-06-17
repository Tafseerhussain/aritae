<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aritae') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite([
        'resources/sass/app.scss', 
        'resources/sass/responsive.scss', 
        'resources/js/app.js'
    ])

    <!-- Toastr.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
</head>
<body>
    <div id="app">

        {{-- SIDENAV FOR MOBILE --}}
        <div id="mySidenav" class="sidenav utile">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
            <i class="bi bi-x-circle"></i>
          </a>
          <div id="sidenav-content" class="w-100 p-3">
              <div class="sidenav-logo d-md-none d-block">
                <a href="/"><img src="/assets/img/logo.png" alt=""></a>
              </div>
              <div class="sidenav-links text-capitalize">
                  <a href="#"><i class="bi bi-info-circle me-1"></i> About</a>
                  <a href="#"><i class="bi bi-chat-right-text me-1"></i> Faq</a>
                  <a href="#"><i class="bi bi-person-rolodex me-1"></i> Contact</a>
                  <hr class="text-white opacity-50">
                  <a href="#"><i class="bi bi-mortarboard me-1"></i> Academy</a>
                  <a href="#" class="sub-item"><i class="bi bi-people-fill me-1"></i> Players</a>
                  <a href="#" class="sub-item"><i class="bi bi-person-check-fill me-1"></i> Coaches</a>
                  <a href="#" class="sub-item"><i class="bi bi-person-hearts me-1"></i> Parents</a>
              </div>
              <div class="sidenav-bottom text-uppercase text-start">
                <a class="navbar-brand" href="#!">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                </a>
              </div>
            </div>
        </div>  

        {{-- DESKTOP NAVBAR --}}
        <nav class="navbar navbar-expand-md container">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://aritae.com/"><i class="bi bi-arrow-left"></i> Marketing Site</a>
                    </li>
                </ul>
                {{-- Logo --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                </a>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle account-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ asset('assets/img/account.svg') }}" alt="">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @guest
                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Login
                                </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="{{ route('register') }}">
                                    Register
                                </a>
                            @else

                                @if (Auth::user()->userType->type == 'coach')
                                    <a class="dropdown-item" href="{{ route('coach.dashboard') }}">
                                        Dashboard
                                    </a>
                                @elseif (Auth::user()->userType->type == 'player')
                                    <a class="dropdown-item" href="{{ route('player.dashboard') }}">
                                        Dashboard
                                    </a>
                                @elseif (Auth::user()->userType->type == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        Dashboard
                                    </a>
                                @elseif (Auth::user()->userType->type == 'parent')
                                    <a class="dropdown-item" href="{{ route('parent.dashboard') }}">
                                        Dashboard
                                    </a>
                                @endif
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endguest
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- MOVILE NAVBAR --}}
        <nav class="navbar navbar-expand-md container navbar-mobile text-white">
            <div class="row d-flex align-items-center">
                <div class="col-2 p-0">
                    <a href="#!" class="open-nav-menu text-white" onclick="openNav()">
                        <i class="bi bi-list"></i>
                    </a>
                </div>
                <div class="col-8 text-center">
                    {{-- Logo --}}
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </a>
                </div>
                <div class="col-2 p-0">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown align-self-end">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle account-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ asset('assets/img/account.svg') }}" alt="">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @guest
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        <i class="bi bi-plus-square me-1"></i> Register
                                    </a>
                                @endguest
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 
    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
    @livewireScripts
    @stack('custom-scripts')
    
    @auth
    @include('components.notification-script')
    @endauth
</body>
</html>
