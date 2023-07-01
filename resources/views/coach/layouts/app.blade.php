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
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
    <!-- Scripts -->
    @vite([
        'resources/sass/admin.scss',
        'resources/sass/admin-responsive.scss',
        'resources/js/app.js'
    ])
    @livewireStyles
    <!-- Toastr.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div id="admin-app">
        
        <div class="container-fluid">

                <div class="col-lg-2 sidebar-col">
                    <div class="sidebar">
                        <a href="/" class="logo text-center d-lg-block d-none">
                            <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                        </a>
                        <a href="#!" class="dashboard-menu-close d-lg-none mx-auto d-block text-center" onclick="closeNav()">
                            <i class="bi bi-arrow-left-short"></i>
                        </a>
                        @php
                            $route = Route::current()->getName();
                        @endphp
                        <div class="sidebar-links">
                            <ul class="list-group">
                                <li class="list-group-item {{ $route == 'coach.dashboard' ? 'active' : '' }}">
                                    <a href="{{ route('coach.dashboard') }}">
                                        <i class="bi bi-boxes"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="list-group-item drop-menu {{ $route == 'coach.profile' ? 'active' : '' }}">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                      <div class="accordion-item">
                                        <div class="accordion-header" id="panelsStayOpen-headingThree">
                                        @if ($route == 'coach.profile')
                                            <button 
                                                class="accordion-button" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#panelsStayOpen-profile" 
                                                aria-expanded="true" 
                                                aria-controls="panelsStayOpen-profile">
                                                <i class="bi bi-person"></i>
                                                <span>Profile</span>
                                              </button>
                                        @else
                                            <button 
                                                class="accordion-button collapsed" 
                                                type="button" 
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#panelsStayOpen-profile" 
                                                aria-expanded="false" 
                                                aria-controls="panelsStayOpen-profile">
                                                <i class="bi bi-person"></i>
                                                <span>Profile</span>
                                              </button>
                                        @endif
                                          
                                        </div>
                                        <div id="panelsStayOpen-profile" 
                                            class="accordion-collapse collapse 
                                                {{ $route == 'coach.profile' ? 'show' : '' }}
                                                " 
                                            aria-labelledby="panelsStayOpen-headingThree">
                                          <div class="accordion-body">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li>
                                                    <a href="{{ route('coach.profile') }}#" class="link-dark rounded">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                        <span>Personal Information</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('coach.profile') }}#hourlyrate" class="link-dark rounded">
                                                        <i class="bi bi-cash-coin"></i>
                                                        <span>Hourly Rate</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('coach.profile') }}#experience" class="link-dark rounded">
                                                        <i class="fa-solid fa-briefcase"></i>
                                                        <span>Coaching Experience</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('coach.profile') }}#certifications" class="link-dark rounded">
                                                        <i class="fa-solid fa-award"></i>
                                                        <span>Certifications</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('coach.profile') }}#education" class="link-dark rounded">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                        <span>Education</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('coach.profile') }}#videos" class="link-dark rounded">
                                                        <i class="fa-solid fa-video"></i>
                                                        <span>My Videos</span>
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('coach.profile') }}#sessions" class="link-dark rounded">
                                                        <i class="fa-solid fa-film"></i>
                                                        <span>My Sessions</span>
                                                    </a>
                                                </li> --}}
                                              </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </li>    
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="bi bi-activity"></i>
                                        <span>Activity</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'coach.chat' ? 'active' : '' }}">
                                    <a href="{{ route('coach.chat') }}">
                                        <i class="bi bi-chat-square-text"></i>
                                        <span>Messages</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'coach.teams' ? 'active' : '' }}">
                                    <a href="{{ route('coach.teams') }}">
                                        <i class="bi bi-people"></i>
                                        <span>Teams</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="bi bi-trophy"></i>
                                        <span>Academy</span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="bi bi-play-circle"></i>
                                        <span>Videos</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'coach.events' ? 'active' : '' }}">
                                    <a href="{{ route('coach.events') }}">
                                        <i class="bi bi-calendar-month"></i>
                                        <span>Events</span>
                                    </a>
                                </li>
                                <hr class="p-0 mt-2 mb-3">
                                <li class="list-group-item {{ $route == 'coach.requests' ? 'active' : '' }}">
                                    <a href="{{ route('coach.requests') }}">
                                        <i class="bi bi-person-plus"></i>
                                        <span>Hire Requests <span class="badge text-bg-secondary rounded-circle">{{ $hire_count }}</span></span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'coach.team_requests' ? 'active' : '' }}">
                                    <a href="{{ route('coach.team_requests') }}">
                                        <i class="bi bi-people"></i>
                                        <span>Team Requests <span class="badge text-bg-secondary rounded-circle">{{ $team_request_count }}</span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>  
                    </div>
                </div>
                <div class="dashboard-col">
                    <div class="row top-bar align-items-center">
                        <div class="col-lg-5 order-lg-1 order-2">
                            <div class="input-group standard-search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                            </div>  
                        </div>
                        <div class="col-lg-2 text-center order-lg-2 order-2">
                            <div class="welcome">
                                Welcome {{ Auth::user()->first_name }}
                            </div>
                        </div>
                        <div class="col-lg-5 order-1 order-lg-3 position-relative">
                            <a href="#!" class="open-dashboard-menu d-lg-none" onclick="openNav()">
                                <i class="bi bi-list"></i>
                            </a>
                            <a class="navbar-brand mobile-navbar-logo d-lg-none" href="#">
                                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                            </a>
                            <ul class="list-group list-group-horizontal">
                                {{-- <li class="list-group-item notifications">
                                    <a class="nav-link dropdown-toggle dropdown-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-bell"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>

                                            <a class="dropdown-item" href="#">Action</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li class="list-group-item">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle account-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset('assets/img/account.svg') }}" alt="">
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end bg-light user-action-menu" aria-labelledby="navbarDropdown">
                                        @guest
                                            <a class="dropdown-item text-dark" href="{{ route('login') }}">
                                                Login
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-dark" href="{{ route('register') }}">
                                                Register
                                            </a>
                                        @else
                                            <div class="d-flex justify-content-start align-items-center">
                                                @if(auth()->user()->coach->profile_img)
                                                    <img class="profile-image" src="{{asset(auth()->user()->coach->profile_img)}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'" alt="Profile Photo">
                                                @else
                                                    <img class="profile-image" src="{{asset('assets/img/default/default-profile-pic.jpg')}}" alt="Profile Photo">
                                                @endif
                                                <div>
                                                    <h6 class="m-0 text-dark profile-name">{{auth()->user()->full_name}}</h6>
                                                    <span class="text-secondary profile-focus">{{auth()->user()->area_of_focus}} Coach</span>
                                                </div>
                                            </div>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-dark" href="{{ route('coach.dashboard') }}">
                                                <svg class="icon" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1890_6273)">
                                                        <path d="M6.7252 10.9492H0.7276C0.5304 10.9492 0.3536 11.0172 0.2176 11.16C0.0816 11.3028 0 11.4796 0 11.6768V16.2736C0 16.4912 0.068 16.668 0.1972 16.7972C0.3264 16.9264 0.51 17.0012 0.7276 17.0012H6.7048C6.9224 17.0012 7.0992 16.9332 7.2284 16.804C7.3576 16.6748 7.4256 16.498 7.4256 16.2804V11.6836C7.4256 11.4864 7.3576 11.3096 7.2284 11.1736C7.0992 11.0376 6.9224 10.9492 6.7252 10.9492Z" fill="#333333"/>
                                                        <path d="M6.7252 0H0.7276C0.5236 0 0.3536 0.068 0.2108 0.1972C0.068 0.3264 0 0.51 0 0.7276V8.1056C0 8.3028 0.068 8.4796 0.1972 8.6156C0.3264 8.7516 0.5032 8.8264 0.7208 8.8264H6.698C6.9156 8.8264 7.0924 8.7584 7.2216 8.6156C7.3508 8.4728 7.4188 8.3028 7.4188 8.1056V0.7276C7.4188 0.51 7.3508 0.3332 7.2216 0.204C7.0924 0.0748 6.9224 0 6.7252 0Z" fill="#333333"/>
                                                        <path d="M16.8027 0.1972C16.6667 0.068 16.4899 0 16.2723 0H10.2951C10.0775 0 9.90074 0.068 9.77154 0.1972C9.64234 0.3264 9.57434 0.5032 9.57434 0.7208V5.3176C9.57434 5.5148 9.64234 5.6916 9.77154 5.8276C9.90754 5.9704 10.0707 6.0384 10.2747 6.0384H16.2723C16.4695 6.0384 16.6463 5.9704 16.7823 5.8276C16.9319 5.6984 16.9999 5.5284 16.9999 5.3244V0.7276C16.9999 0.51 16.9319 0.3332 16.8027 0.1972Z" fill="#333333"/>
                                                        <path d="M16.2723 8.17188H10.2951C10.0775 8.17188 9.90074 8.23987 9.77154 8.38267C9.63554 8.52547 9.57434 8.69547 9.57434 8.89267V16.2707C9.57434 16.4883 9.64234 16.6651 9.77154 16.7943C9.90074 16.9235 10.0775 16.9983 10.2747 16.9983H16.2723C16.4695 16.9983 16.6463 16.9303 16.7823 16.8011C16.9183 16.6719 16.9999 16.4883 16.9999 16.2707V8.89947C16.9999 8.70227 16.9319 8.52547 16.8027 8.38947C16.6667 8.24667 16.4899 8.17188 16.2723 8.17188Z" fill="#333333"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1890_6273">
                                                            <rect width="17" height="17" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                {{__('Dashboard')}}
                                            </a>
                                            <a class="dropdown-item text-dark" href="{{ route('coach.profile') }}">
                                                <i class="bi bi-person-fill icon"></i> {{__('My Profile')}}
                                            </a>
                                            <a class="dropdown-item text-dark" href="{{ route('coach.settings') }}">
                                                <i class="bi bi-gear-fill icon"></i> {{__('Settings')}}
                                            </a>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <i class="bi bi-power icon"></i> {{ __('Logout') }}
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
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="incomplete-profile">
                                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                                      <i class="fa-solid fa-triangle-exclamation"></i>
                                      <div class="ms-2">
                                        Your Profile is incomplete. 
                                        <a href="#">
                                            <span>Complete Profile</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                      </div>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 
    <!-- Price nouislider-filter cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>
    <script src="{{ asset('assets/js/adminSidebar.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script> --}}
    @livewireScripts
    @stack('custom-scripts')

    @include('components.notification-script')
</body>
</html>
