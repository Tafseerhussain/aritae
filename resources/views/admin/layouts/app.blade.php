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

    <!-- FullCalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.1/index.global.min.js'></script>
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
                                                    <a href="{{ route('admin.profile') }}" class="link-dark rounded">
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
                                        <svg width="25" height="25" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_2638_5851)">
                                                <path d="M24.2332 5.30803H24.2496L23.9804 4.98414L23.9461 4.94398C23.4689 4.36203 22.9369 3.81432 22.3655 3.31598C22.3366 3.29096 22.3076 3.26595 22.2786 3.24093L22.2128 3.18432C22.1977 3.17115 22.1825 3.15798 22.1674 3.14547L22.1529 3.13428C21.9988 3.0046 21.8678 2.89795 21.7421 2.79986L21.7046 2.7709C21.671 2.74456 21.6374 2.71823 21.6039 2.69321L21.5788 2.67412C20.9186 2.1771 20.2089 1.74195 19.4703 1.3812C19.1102 1.20543 18.7283 1.04151 18.3347 0.892732C18.3228 0.886149 18.311 0.879566 18.2985 0.873641L18.2807 0.865741C17.1886 0.452321 16.0464 0.182414 14.8831 0.0639175C13.766 -0.0381208 12.6706 -0.0177131 11.6271 0.123166L11.5758 0.130407C11.535 0.135674 11.4935 0.141598 11.4533 0.147523L11.4231 0.152131C10.6061 0.275894 9.79901 0.477996 9.02417 0.753828C8.09925 1.08298 7.19209 1.52537 6.32839 2.06848C5.63387 2.5056 4.9828 2.99604 4.39427 3.52532C3.19153 4.60495 2.2146 5.88076 1.48782 7.31917L1.46873 7.35735C1.45293 7.38829 1.43779 7.41858 1.42331 7.4482L1.4108 7.47322C1.05268 8.20526 0.751169 8.99194 0.516152 9.81088C-0.041438 11.7536 -0.149401 13.8391 0.204771 15.8417C0.552359 17.8054 1.34365 19.7014 2.49372 21.3241C3.30279 22.465 4.2784 23.4662 5.39424 24.2983C5.45678 24.3451 5.51932 24.3912 5.58318 24.4373C5.91233 24.6736 6.25531 24.8994 6.60422 25.1087L6.64569 25.1337C6.68914 25.1594 6.73259 25.1858 6.77604 25.2108C8.81154 26.3812 11.136 27.0001 13.4974 27.0001C20.9429 27.0001 27.0007 20.9423 27.0007 13.4968C27 10.5416 26.0205 7.64964 24.2332 5.30803ZM25.3464 13.7581C25.3483 13.8424 25.351 13.9352 25.351 14.0392C25.2522 16.6119 24.3358 18.9845 22.6275 21.0904C22.5018 21.2451 22.4603 21.2543 22.4557 21.255C22.4537 21.255 22.4077 21.253 22.2661 21.1101C19.9034 18.7244 17.4058 16.2294 14.8423 13.6949C14.7034 13.5573 14.6929 13.508 14.6929 13.4961C14.6929 13.4843 14.7041 13.4362 14.8397 13.3072C15.7179 12.4738 16.5632 11.614 17.2735 10.8826C17.3505 10.8036 17.392 10.7654 17.4381 10.7654C17.4795 10.7654 17.5243 10.7977 17.6026 10.8596C19.808 12.6192 22.299 13.346 25.0073 13.0195C25.2535 12.9899 25.318 13.0241 25.3338 13.0406C25.3562 13.0629 25.3747 13.1406 25.3562 13.2887C25.3385 13.4375 25.3417 13.5863 25.3464 13.7581ZM10.9346 17.6909C10.7358 17.4368 10.7364 17.3913 10.9366 17.2024C11.7344 16.4519 12.529 15.6587 13.2973 14.845C13.423 14.712 13.4737 14.7048 13.4829 14.7048C13.4829 14.7048 13.4829 14.7048 13.4836 14.7048C13.5073 14.7048 13.5639 14.7331 13.6956 14.8661C16.236 17.4229 18.7356 19.9173 21.1253 22.2806C21.251 22.405 21.2582 22.4485 21.2589 22.4511C21.2582 22.4551 21.2464 22.4959 21.1108 22.6052C18.9726 24.3319 16.527 25.2516 13.8463 25.3391H13.8377C13.4619 25.3444 13.1373 25.349 13.0781 25.2865C13.0234 25.2285 13.0412 24.9409 13.0616 24.6084L13.0682 24.4998C13.2196 21.987 12.502 19.6968 10.9346 17.6909ZM1.59842 13.3987C1.5971 13.3421 1.59578 13.2776 1.59578 13.2012C1.68795 10.4573 2.61814 7.99921 4.35938 5.89393C4.4759 5.75305 4.51737 5.7491 4.51803 5.74844C4.52066 5.74844 4.56214 5.75041 4.69643 5.88537C7.36325 8.56733 9.7944 10.9926 12.1294 13.2993C12.2624 13.4303 12.2762 13.4856 12.2762 13.5027C12.2762 13.5238 12.2558 13.5777 12.1222 13.7048C11.246 14.5395 10.4738 15.3104 9.76148 16.0609C9.58308 16.2485 9.54951 16.2492 9.31317 16.0668C7.44752 14.6238 5.39161 13.8964 3.18626 13.8964C2.7735 13.8964 2.35548 13.922 1.93284 13.9727C1.69058 14.0017 1.6287 13.9622 1.61619 13.949C1.605 13.9378 1.56945 13.8852 1.59249 13.6883C1.60302 13.5981 1.60105 13.5099 1.59842 13.3987ZM16.18 9.45473C16.2669 9.56072 16.2669 9.56072 16.1649 9.66144C15.2867 10.5251 14.4289 11.3717 13.5929 12.2341C13.5244 12.3046 13.4921 12.3144 13.4928 12.3158C13.4625 12.3079 13.3829 12.2282 13.3447 12.19C12.2479 11.088 11.1295 9.97151 10.0472 8.89122L9.01298 7.85899C8.72332 7.56999 8.43498 7.27967 8.14664 6.98936C7.40999 6.2481 6.64833 5.48182 5.87942 4.74649C5.7313 4.60495 5.72932 4.55229 5.72932 4.54636C5.72998 4.53122 5.74907 4.48251 5.91431 4.35084C8.1473 2.5655 10.6686 1.6623 13.4145 1.6623C13.5251 1.6623 13.637 1.66362 13.7482 1.66691C13.8246 1.66888 13.922 1.67151 13.9813 1.6781C13.9793 1.71694 13.974 1.7696 13.9694 1.81766C13.637 4.69119 14.3809 7.26058 16.18 9.45473ZM25.1265 11.3316C25.1133 11.348 25.0593 11.3875 24.8474 11.3882C24.6018 11.3895 24.3602 11.4086 24.1667 11.4244C24.0995 11.4297 24.0383 11.4349 23.9863 11.4382C22.0107 11.4244 20.3076 10.8543 18.779 9.69502C18.7376 9.66342 18.6428 9.59166 18.6217 9.55612C18.627 9.54229 18.648 9.50016 18.7283 9.42248C20.0055 8.18551 21.2694 6.90904 22.3366 5.82349C22.4004 5.75831 22.4346 5.73593 22.4498 5.72803C22.4636 5.73659 22.4952 5.76161 22.5525 5.83007C23.8099 7.32839 24.6742 9.08279 25.1206 11.0452C25.1693 11.2572 25.1377 11.3184 25.1265 11.3316ZM21.2029 4.63523C19.7119 6.10722 18.5783 7.24017 17.5256 8.30861C17.4815 8.35338 17.4539 8.37313 17.4394 8.38103C17.4249 8.36918 17.3979 8.34285 17.3492 8.27965C15.9101 6.41728 15.3288 4.2883 15.6211 1.9513C15.6277 1.89797 15.6369 1.87098 15.6422 1.85979C15.6573 1.85782 15.6929 1.85716 15.7745 1.87164C16.284 1.96117 16.8298 2.10863 17.4927 2.33641C17.5566 2.35813 17.6204 2.37657 17.6829 2.39171C19.0009 2.88676 20.2076 3.61551 21.2707 4.56019C21.2589 4.57664 21.2385 4.60034 21.2029 4.63523ZM1.80973 15.6448C1.80973 15.6448 1.83673 15.6192 1.95654 15.6132C2.23566 15.5994 2.51742 15.5705 2.74454 15.5474C2.82814 15.5389 2.90582 15.531 2.97561 15.5244C4.99662 15.5626 6.70889 16.1379 8.21116 17.2847C8.33755 17.3815 8.35994 17.4177 8.36257 17.4236C8.36257 17.4243 8.35533 17.4664 8.24868 17.5704C6.92284 18.8567 5.64506 20.1464 4.67997 21.1259C4.56214 21.2458 4.52264 21.2556 4.51737 21.2569C4.51605 21.2569 4.4759 21.2484 4.37847 21.1299C3.10003 19.5829 2.23895 17.7929 1.81763 15.8094C1.79064 15.6797 1.80973 15.6455 1.80973 15.6448ZM5.84387 22.2925C7.17168 20.991 8.33755 19.8264 9.40797 18.7323C9.49947 18.6388 9.54161 18.6184 9.55477 18.6138C9.56662 18.6198 9.6048 18.6454 9.68314 18.7488C10.8622 20.2984 11.4349 21.985 11.4349 23.9047C11.4145 24.1746 11.4053 24.401 11.3974 24.5834C11.3869 24.8368 11.3757 25.0989 11.3375 25.1581C11.2611 25.1798 10.9662 25.0969 10.6548 25.0087C10.5041 24.9659 10.3289 24.9165 10.1268 24.8625C8.62326 24.4616 7.18222 23.6947 5.84453 22.5821C5.73261 22.4887 5.71747 22.4492 5.71616 22.4492C5.71813 22.4399 5.73327 22.4011 5.84387 22.2925Z" fill="#333333" fill-opacity="0.7"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2638_5851">
                                                    <rect width="27" height="27" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
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
                                <li class="list-group-item {{ $route == 'admin.blog' ? 'active' : '' }}">
                                    <a href="{{ route('admin.blog') }}">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Blogs</span>
                                    </a>
                                </li>
                                <li class="list-group-item {{ $route == 'admin.contact' ? 'active' : '' }}">
                                    <a href="{{ route('admin.contact') }}">
                                        <i class="bi bi-envelope"></i>
                                        <span>Contact</span>
                                    </a>
                                </li>
                                <hr class="p-0 mt-2 mb-3">
                                @if($coach_count)
                                <li class="list-group-item {{ $route == 'admin.coach_approval' ? 'active' : '' }}">
                                    <a href="{{ route('admin.coach_approval') }}">
                                        <i class="bi bi-person-plus"></i>
                                        <span>Coach Applications <span class="badge text-bg-secondary rounded-circle">{{ $coach_count }}</span></span>
                                    </a>
                                </li>
                                @endif
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
                                
                                <livewire:navbar-notification />
                                
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
                                                @if(auth()->user()->admin->profile_img)
                                                    <img class="profile-image" src="{{asset(auth()->user()->admin->profile_img)}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'" alt="Profile Photo">
                                                @else
                                                    <img class="profile-image" src="{{asset('assets/img/default/default-profile-pic.jpg')}}" alt="Profile Photo">
                                                @endif
                                                <div>
                                                    <h6 class="m-0 text-dark profile-name">{{auth()->user()->full_name}}</h6>
                                                    <span class="text-secondary profile-focus">Admin Account</span>
                                                </div>
                                            </div>
                                            <hr class="dropdown-divider">
                                            <a class="dropdown-item text-dark" href="{{ route('admin.dashboard') }}">
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
                                            <a class="dropdown-item text-dark" href="{{ route('admin.profile') }}">
                                                <i class="bi bi-person-fill icon"></i> {{__('My Profile')}}
                                            </a>
                                            <a class="dropdown-item text-dark" href="{{ route('admin.settings') }}">
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
    <script src="{{ asset('assets/js/adminSidebar.js') }}"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    @livewireScripts

    @include('components.notification-script')

    @stack('custom-script')
</body>
</html>
