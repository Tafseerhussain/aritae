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
        'resources/sass/admin.scss',
        'resources/js/app.js'
    ])
    @livewireStyles
    <!-- Toastr.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div id="admin-app">
        
        <div class="container-fluid">

                <div class="col-md-2 sidebar-col">
                    <div class="sidebar">
                        <a href="/" class="logo text-center d-block">
                            <img src="{{ asset('assets/img/logo.svg') }}" alt="">
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
                                <li class="list-group-item">
                                    <a href="#">
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
                                <li class="list-group-item">
                                    <a href="#">
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
                            </ul>
                        </div>  
                    </div>
                </div>
                <div class="dashboard-col">
                    <div class="row top-bar align-items-center">
                        <div class="col-md-5">
                            <div class="input-group standard-search">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
                            </div>  
                        </div>
                        <div class="col-md-2 text-center">
                            <div class="welcome">
                                Welcome {{ Auth::user()->first_name }}
                            </div>
                        </div>
                        <div class="col-md-5">
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
                                            <a class="dropdown-item" href="#">
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script> --}}
    @livewireScripts
    <!-- Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.addEventListener('chat_message_notification', 
            event => {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr[event.detail.type]((event.detail.message.length > 35) ? event.detail.message.slice(0, 35) + '&hellip;' : event.detail.message, event.detail.title ?? '')
            }
        );
    </script>

    @if(!Route::is('coach.chat'))
    <script type="module">
        window.Echo.private('chat.{{Auth::user()->id}}')
            .listen('MessageSent', (e) => {
                var data = {
                    "title" : "New message from "+e.user_name,
                    "type" : "info",
                    "message": e.message_body,
                }
                var event = new CustomEvent('chat_message_notification', { detail: data });
                window.dispatchEvent(event);
            });
    </script>
    @endif

    @stack('custom-scripts')
</body>
</html>
