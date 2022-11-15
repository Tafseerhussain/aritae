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

    <!-- Scripts -->
    @vite([
        'resources/sass/admin.scss',
        'resources/js/app.js'
    ])
    @livewireStyles
</head>
<body>
    <div id="admin-app">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar">
                        <a href="#" class="logo text-center d-block">
                            <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                        </a>
                        <div class="sidebar-links">
                            <ul class="list-group">
                                <li class="list-group-item active">
                                    <a href="#">
                                        <i class="fa-solid fa-layer-group"></i><span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-user"></i>
                                        <span>My Profile Preview</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-square-poll-horizontal"></i>
                                        <span>Activity</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-comments"></i>
                                        <span>Messages</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-people-group"></i>
                                        <span>Teams</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-trophy"></i>
                                        <span>Academy</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-circle-play"></i>
                                        <span>Videos</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa-solid fa-calendar-days"></i>
                                        <span>Events</span>
                                    </a>
                                </li>
                            </ul>
                        </div>  
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row top-bar align-items-center">
                        <div class="col-md-5">
                            <div class="input-group standard-search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                            </div>  
                        </div>
                        <div class="col-md-2">
                            <div class="welcome">
                                Welcome {{ Auth::user()->first_name }}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item notifications">
                                    <a class="nav-link" href="#"><i class="fa-regular fa-bell"></i></a>
                                </li>
                                <li class="list-group-item">
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
                                            <a class="dropdown-item" href="@">
                                                Profile
                                            </a>
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
                    </div>
                    <main class="dashboard-content">
                        <p class="incomplete-profile">
                            Your Profile is incomplete.
                            <a href="#">
                                <span>Complete Profile</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </p>
                        @yield('content')
                    </main>
                    <footer class="admin-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="d-flex footer-links justify-content-center">
                                        <a href="#">
                                            Privacy Policy
                                        </a>
                                        <a href="#">
                                            Terms of Use
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 
    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    @livewireScripts
    @stack('custom-scripts')
</body>
</html>
