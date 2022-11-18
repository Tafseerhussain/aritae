@extends('coach.layouts.app')

@section('content')

    <div class="dashboard-base">
        <div class="cover-img">
            <h1>
                No Cover Photo Added
            </h1>
            <p>
                Aritae gives you every college program and coach in the country. Get started now!
            </p>
            <a href="#" class="btn btn-theme">
                Upload Cover Photo
            </a>
        </div>
        <div class="profile-bar">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="left">
                        <div class="d-flex">
                        <img src="{{ asset('assets/img/players/1.jpg') }}" alt="">
                        <p>
                            <b>John Doe</b>
                            <span>
                                Football Coach
                            </span>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right text-end">
                        <div class="">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="ms-1">
                                <strong>Joined: </strong> 20 Sep, 2022
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-cards">
        <div class="row">
            <div class="col-md-7">
                <div class="profile-info">
                    <div class="card">
                        <div class="icon">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </div>
                        <h5>Profile Information</h5>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <p>
                        <strong>Full Name: </strong> {{ Auth::user()->full_name }}
                    </p>
                    <p>
                        <strong>Mobile: </strong> +42 234 2341
                    </p>
                    <p>
                        <strong>Email: </strong> {{ Auth::user()->email }}
                    </p>
                    <p>
                        <strong>Location: </strong>
                        @if (Auth::user()->country == 0)
                            ---
                        @else
                            {{ Auth::user()->country }}
                        @endif 
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="icon">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <h5>Conversations</h5>
                    <div class="conversations">


                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat1.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#">
                                        Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat2.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#">
                                        Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat3.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#">
                                        Reply
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="icon">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <h5>
                        Your Players
                    </h5>

                    <div class="conversations players">

                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat1.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#" class="btn btn-theme">
                                        Footballer
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat2.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#" class="btn btn-theme">
                                        Footballer
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat3.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#" class="btn btn-theme">
                                        Footballer
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="conversation">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/img/default/chat1.jpg') }}" alt="user image">
                                        <div class="meta">
                                            <h6>Peterson</h6>
                                            <small>Example Chat...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="#" class="btn btn-theme">
                                        Footballer
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="icon">
                        <i class="fa-regular fa-eye"></i>
                    </div>
                    <h5>
                        Your Videos
                    </h5>
                    <div class="row videos">
                        <div class="col-md-4">
                            <div class="video">
                                <iframe width="100%" height="270" src="https://www.youtube.com/embed/06C-XxqYXT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="video">
                                <iframe width="100%" height="270" src="https://www.youtube.com/embed/06C-XxqYXT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="video">
                                <iframe width="100%" height="270" src="https://www.youtube.com/embed/06C-XxqYXT8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>

@endsection
