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

    <!-- FullCalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>
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
                                <li class="list-group-item {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-boxes"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="list-group-item drop-menu {{ $route == 'admin.profile' ? 'active' : '' }}">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                      <div class="accordion-item">
                                        <div class="accordion-header" id="panelsStayOpen-headingThree">
                                        @if ($route == 'admin.profile')
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
                                                {{ $route == 'admin.profile' ? 'show' : '' }}
                                                " 
                                            aria-labelledby="panelsStayOpen-headingThree">
                                          <div class="accordion-body">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                <li>
                                                    <a href="#" class="link-dark rounded">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                        <span>Personal Information</span>
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{ route('player.profile') }}#experience" class="link-dark rounded">
                                                        <i class="fa-solid fa-briefcase"></i>
                                                        <span>playering Experience</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('player.profile') }}#athletic" class="link-dark rounded">
                                                        <i class="fa-solid fa-person-running"></i>
                                                        <span>Athletic Information</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('player.profile') }}#certifications" class="link-dark rounded">
                                                        <i class="fa-solid fa-award"></i>
                                                        <span>Certifications</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('player.profile') }}#education" class="link-dark rounded">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                        <span>Education</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('player.profile') }}#videos" class="link-dark rounded">
                                                        <i class="fa-solid fa-video"></i>
                                                        <span>My Videos</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('player.profile') }}#sessions" class="link-dark rounded">
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
                                <li class="list-group-item {{ $route == 'admin.sports' ? 'active' : '' }}">
                                    <a href="{{ route('admin.sports') }}">
                                        <i class="bi bi-xbox"></i>
                                        <span>Sports</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'admin.calendar' ? 'active' : '' }}">
                                    <a href="{{ route('admin.calendar') }}">
                                        <i class="bi bi-calendar2-week"></i>
                                        <span>Calendar</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'admin.users' ? 'active' : '' }}">
                                    <a href="{{ route('admin.users') }}">
                                        <i class="bi bi-people"></i>
                                        <span>All Users</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'admin.teams' ? 'active' : '' }}">
                                    <a href="{{ route('admin.teams') }}">
                                        <svg width="25" height="25" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2594_5589)">
                                                <path d="M0 14.4482C0 13.8156 0 13.183 0 12.5497C0.057078 12.1341 0.100063 11.7163 0.173348 11.3042C0.784294 7.84048 2.46915 5.01072 5.23497 2.83751C6.98959 1.4582 8.97604 0.57835 11.1809 0.204289C11.6369 0.1268 12.0963 0.0676268 12.5536 0C13.1864 0 13.8192 0 14.4527 0C14.7494 0.0845335 15.0587 0.0746713 15.3603 0.119051C17.9782 0.505088 20.3268 1.51526 22.3027 3.2792C26.024 6.60066 27.5623 10.7682 26.8161 15.6958C26.2953 19.1363 24.5774 21.9505 21.8411 24.1012C18.8491 26.4526 15.4294 27.3621 11.6629 26.8725C8.97252 26.5231 6.59991 25.4157 4.57188 23.6123C2.23661 21.5356 0.772314 18.9552 0.212105 15.874C0.126135 15.4013 0.069762 14.9237 0 14.4482ZM10.6785 12.6561C11.2669 12.6561 11.856 12.6497 12.4444 12.6603C12.6171 12.6631 12.6657 12.6124 12.6643 12.4405C12.6558 11.6149 12.6565 10.7893 12.6643 9.96368C12.6657 9.81011 12.6213 9.76362 12.4698 9.73474C11.603 9.56919 10.8251 9.21415 10.1542 8.63017C9.02678 7.64746 8.70897 6.13361 9.39039 4.87829C9.95553 3.83641 10.8836 3.26018 11.98 2.91077C12.2006 2.84033 12.5205 2.89457 12.6276 2.71141C12.7319 2.53389 12.6417 2.2493 12.6657 2.01472C12.6903 1.77661 12.6107 1.70899 12.3775 1.74139C11.7433 1.82945 11.1091 1.91609 10.4911 2.08868C7.20381 3.00657 4.73254 4.9593 3.08996 7.94897C2.33315 9.32686 1.91317 10.8118 1.74123 12.3715C1.71657 12.5983 1.76801 12.6744 2.01182 12.6645C2.53821 12.6434 3.066 12.6617 3.59309 12.6568C3.83057 12.6547 4.01942 12.7498 4.17585 12.9139C4.37527 13.1231 4.42601 13.3852 4.42883 13.6655C4.43658 14.3489 4.63248 14.9765 5.03202 15.5316C5.72612 16.496 6.79933 16.4953 7.50188 15.5366C7.93666 14.9427 8.1093 14.2657 8.12481 13.5416C8.13608 13.0055 8.48207 12.6596 9.01832 12.6589C9.57078 12.6561 10.1246 12.6561 10.6785 12.6561ZM14.3463 10.6907C14.3463 11.2704 14.3541 11.8502 14.3414 12.4299C14.3371 12.6194 14.397 12.6624 14.5781 12.6603C15.3948 12.6511 16.2123 12.654 17.0297 12.6582C17.1671 12.6589 17.234 12.6441 17.2657 12.4743C17.4299 11.6086 17.783 10.8287 18.3664 10.1567C19.5143 8.83586 21.2725 8.64848 22.643 9.7284C23.5232 10.4216 23.9861 11.3719 24.1997 12.4497C24.2342 12.6244 24.2976 12.6645 24.454 12.6575C24.6732 12.6483 24.8938 12.649 25.1129 12.6575C25.2447 12.6624 25.2841 12.6117 25.2686 12.4877C25.2285 12.1749 25.2087 11.8579 25.151 11.548C24.5224 8.14762 22.7748 5.47636 19.8815 3.57295C18.2924 2.52755 16.5322 1.94568 14.643 1.74069C14.3999 1.71462 14.3308 1.78084 14.34 2.02669C14.3597 2.54446 14.3442 3.06293 14.3463 3.5814C14.3477 3.89065 14.2047 4.11467 13.951 4.2781C13.7502 4.40772 13.5254 4.4211 13.2956 4.42744C12.6227 4.44576 12.0033 4.64089 11.4586 5.03961C10.5094 5.73348 10.5122 6.79297 11.4572 7.49319C12.0258 7.91445 12.677 8.0969 13.3718 8.11874C14.032 8.13917 14.3456 8.44419 14.3456 9.10989C14.3463 9.63682 14.3463 10.1637 14.3463 10.6907ZM16.3285 14.3418C15.731 14.3418 15.1334 14.346 14.5359 14.339C14.3865 14.3369 14.3421 14.3813 14.3428 14.5313C14.3491 15.3745 14.3477 16.2178 14.3435 17.061C14.3428 17.1871 14.3745 17.2293 14.5112 17.2561C15.3857 17.4245 16.1742 17.7774 16.8528 18.3677C18.0909 19.4448 18.3368 21.1052 17.4222 22.4338C16.7274 23.4425 15.7141 23.9603 14.5408 24.1949C14.3808 24.2266 14.3364 24.283 14.3428 24.4309C14.3512 24.65 14.3519 24.8705 14.3428 25.0895C14.3364 25.229 14.3837 25.2804 14.5225 25.2614C14.8353 25.2199 15.1531 25.2015 15.4625 25.1438C19.0246 24.4739 21.7686 22.605 23.6571 19.5082C24.5703 18.0106 25.0734 16.3699 25.2644 14.6285C25.2891 14.401 25.2376 14.3256 24.9945 14.3355C24.4681 14.3566 23.9403 14.3397 23.4132 14.3425C23.1349 14.3439 22.9256 14.2164 22.7628 14.0044C22.5994 13.7909 22.5832 13.5394 22.5761 13.2816C22.5578 12.618 22.364 12.0073 21.9743 11.4684C21.2774 10.5047 20.2091 10.5054 19.5052 11.4627C19.069 12.0559 18.8963 12.7329 18.8815 13.457C18.8703 13.9924 18.5229 14.3404 17.988 14.3411C17.4356 14.3425 16.8817 14.3418 16.3285 14.3418ZM12.66 16.3248C12.66 15.7275 12.6558 15.1301 12.6629 14.5327C12.665 14.3855 12.6248 14.3369 12.4719 14.3383C11.6284 14.3453 10.7849 14.3432 9.94144 14.3397C9.81741 14.339 9.77091 14.3672 9.74413 14.5059C9.57642 15.3802 9.22268 16.1691 8.63287 16.8475C7.54275 18.1014 5.80152 18.3353 4.49859 17.3773C3.53954 16.6721 3.02795 15.6852 2.80387 14.5384C2.77286 14.3784 2.71578 14.3334 2.5671 14.3404C2.37402 14.3496 2.17883 14.3601 1.98786 14.3383C1.74194 14.3101 1.70811 14.4249 1.74123 14.625C1.81874 15.092 1.86032 15.5668 1.96884 16.0261C2.79823 19.5336 4.78962 22.1696 7.94864 23.9096C9.33331 24.6725 10.8286 25.0902 12.3972 25.2593C12.5959 25.2804 12.6713 25.2354 12.6643 25.0163C12.6474 24.4809 12.66 23.9448 12.6586 23.4087C12.6579 23.0875 12.8144 22.8586 13.0807 22.7008C13.2837 22.5803 13.5127 22.5789 13.7424 22.5704C14.4048 22.5444 15.0171 22.3514 15.552 21.9548C16.4991 21.2517 16.4906 20.2 15.5407 19.5019C14.9474 19.0651 14.2702 18.8939 13.5458 18.8777C13.0117 18.8665 12.66 18.5171 12.6593 17.9866C12.66 17.4322 12.66 16.8785 12.66 16.3248Z" fill="#333333" fill-opacity="0.7"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2594_5589">
                                                    <rect width="27" height="27" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span>Teams</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'admin.events' ? 'active' : '' }}">
                                    <a href="{{ route('admin.events') }}">
                                        <i class="bi bi-calendar-month"></i>
                                        <span>Events</span>
                                    </a>
                                </li>
                                <hr class="p-0 mt-2 mb-3">
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
                        {{--<div class="row">
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
                        </div>--}}
                        
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
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    @livewireScripts
    <!-- Toastr.js -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    @if(!Route::is('player.chat'))
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

    <div class="modal" id="call_receive_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Incoming Call</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center call-text">
                            Someone is calling ...
                        </div>
                        <audio id="ring" autoplay hidden></audio>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <button class="btn btn-success btn-lg m-2" id="call_accept">Accept</button>
                            <button class="btn btn-danger btn-lg m-2" id="call_decline">Decline</buttion>
                        </div>
                    </div>
                    <input type="text" id="partner_name" hidden>
                    <input type="text" id="partner_id" hidden>
                    <input type="text" id="signal" hidden>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="video_call_receive_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center">Incoming Video Call</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3 text-center video-call-text">
                            Someone is calling ...
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <button class="btn btn-success btn-lg m-2" id="video_call_accept">Accept</button>
                            <button class="btn btn-danger btn-lg m-2" id="video_call_decline">Decline</buttion>
                        </div>
                    </div>
                    <input type="text" id="video_partner_name" hidden>
                    <input type="text" id="video_partner_id" hidden>
                    <input type="text" id="video_signal" hidden>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function(){
        //Incoming audio call
        var channel = window.Echo.join("presence-call-channel");
        channel.listen("StartAudioChat", ( data ) => {
          if (data.type === "incomingCall" && data.userToCall == '{{Auth::user()->id}}') {
            // add a new line to the sdp to take care of error
            const updatedSignal = {
              ...data.signalData,
              sdp: `${data.signalData.sdp}\n`,
            };
            
            var partner_name = data.partnerName;
            var partner_id = data.from;
            var signal = JSON.stringify(updatedSignal);

            $('#partner_name').val(partner_name);
            $('#partner_id').val(partner_id);
            $('#signal').val(signal);

            $('.call-text').text(partner_name+" is calling ...");

            $('#call_receive_modal').modal('show');
          }
        });

        $('#call_decline').click(function(){
            $('#call_receive_modal').modal('hide');
        });
        $('#call_accept').click(function(){
            var partner_name = $('#partner_name').val();
            var partner_id = $('#partner_id').val();
            var signal = JSON.stringify($('#signal').val());

            var words = CryptoJS.enc.Utf8.parse(signal); 
            var base64 = CryptoJS.enc.Base64.stringify(words);


            $('#call_receive_modal').modal('hide');
            window.open('/call?partner_id='+partner_id+'&partner_name='+partner_name+'&action=accept_call&signal='+base64,'Aritae Call','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600');
        });

        $('#call_receive_modal').on('show.bs.modal', function(){
            var ring = $('#ring');
            ring.attr("src", "{{asset('audio/ring.mp3')}}");
            ring.trigger("play");
        });
        $('#call_receive_modal').on('hide.bs.modal', function(){
            var ring = $('#ring');
            ring.attr("src", "");
        });

        //Incoming video call
        var video_channel = window.Echo.join("presence-video-channel");
        video_channel.listen("StartVideoChat", ( data ) => {
          if (data.type === "incomingCall" && data.userToCall == '{{Auth::user()->id}}') {
            // add a new line to the sdp to take care of error
            const updatedSignal = {
              ...data.signalData,
              sdp: `${data.signalData.sdp}\n`,
            };
            
            var partner_name = data.partnerName;
            var partner_id = data.from;
            var signal = JSON.stringify(updatedSignal);

            $('#video_partner_name').val(partner_name);
            $('#video_partner_id').val(partner_id);
            $('#video_signal').val(signal);

            $('.video_call-text').text(partner_name+" is calling ...");

            $('#video_call_receive_modal').modal('show');
          }
        });

        $('#video_call_decline').click(function(){
            $('#video_call_receive_modal').modal('hide');
        });
        $('#video_call_accept').click(function(){
            var partner_name = $('#video_partner_name').val();
            var partner_id = $('#video_partner_id').val();
            var signal = JSON.stringify($('#video_signal').val());

            var words = CryptoJS.enc.Utf8.parse(signal); 
            var base64 = CryptoJS.enc.Base64.stringify(words);


            $('#video_call_receive_modal').modal('hide');
            //window.open('/video_call?partner_id='+partner_id+'&partner_name='+partner_name+'&action=accept_call&signal='+base64,'Aritae Call','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600');
            openWindowWithPost("/video_call", "AritaeVideoCall", {
                partner_id: partner_id,
                partner_name: partner_name,
                action: 'accept_call',
                signal: base64
            });
        });

        $('#video_call_receive_modal').on('show.bs.modal', function(){
            var ring = $('#ring');
            ring.attr("src", "{{asset('audio/ring.mp3')}}");
            ring.trigger("play");
        });
        $('#video_call_receive_modal').on('hide.bs.modal', function(){
            var ring = $('#ring');
            ring.attr("src", "");
        });

        //Fix autoplay block problem
        $(document).on('click', function(){
            var ring = $('#ring');
            ring[0].play();
        });
    });

    function openWindowWithPost(url, title, data) {
        var form = document.createElement("form");
        form.target = title;
        form.method = "POST";
        form.action = url;
        form.style.display = "none";

        for (var key in data) {
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = key;
            input.value = data[key];
            form.appendChild(input);
        }
        
        //CSRF token
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = '_token';
        input.value = csrf;
        form.appendChild(input);

        document.body.appendChild(form);
        window.open(url, title,'directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=600');
        form.submit();
        document.body.removeChild(form);
    }
    </script>--}}
</body>
</html>
