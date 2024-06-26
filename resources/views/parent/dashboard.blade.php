@extends('parent.layouts.app')

@section('content')

    <div class="dashboard-base">
        @if (Auth::user()->parent->cover_img == '')
            <div class="cover-img">
                <h1>
                    No Cover Photo Added
                </h1>
                <p>
                    Aritae gives you every college program and player in the country. Get started now!
                </p>
                <a href="{{ route('parent.profile') }}" class="btn btn-theme">
                    Upload Cover Photo
                </a>
            </div>
        @else
            <div class="cover-img cover-img-added" style="background: url({{ asset(Auth::user()->parent->cover_img) }}) no-repeat;">
            </div>
        @endif
        
        <div class="profile-bar">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="left">
                        <div class="d-flex">
                            @if (Auth::user()->parent->profile_img == '')
                                <img src="{{ asset('assets/img/default/default-profile-pic.jpg') }}" class="shadow" alt="">
                            @else
                                <img src="{{ asset(Auth::user()->parent->profile_img) }}" class="shadow" alt="">
                            @endif
                        <p class="text-capitalize">
                            <b>{{ Auth::user()->full_name }}</b>
                            {{--<span>
                                {{ Auth::user()->area_of_focus }} player
                            </span>--}}
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right text-end">
                        <div class="">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="ms-1">
                                <strong>Joined: </strong> {{ Auth::user()->created_at->format('d M, Y') }}
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
                        <a href="{{ route('parent.profile') }}" class="icon" data-bs-toggle="tooltip" data-bs-title="Edit Information">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <h5>Profile Information</h5>
                        <p>
                            @if (Auth::user()->parent->about == '')
                                ---
                            @else
                                {{ Auth::user()->parent->about }}
                            @endif
                        </p>
                        <p>
                            <strong>Full Name: </strong> {{ Auth::user()->full_name }}
                        </p>
                        <p>
                            <strong>Mobile: </strong>
                            @if (Auth::user()->parent->phone == '')
                                ---
                            @else
                                {{ Auth::user()->parent->phone }}
                            @endif
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
                        {{--<p>
                            <strong>Skills/Sports: </strong>
                            @if (Auth::user()->sports)
                                @foreach (Auth::user()->sports as $sport)
                                    {{ $sport->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                ---
                            @endif
                        </p>--}}
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

            {{--<div class="col-md-12 mt-5">
                <div class="card">
                    <div class="icon">
                        <i class="fa-regular fa-plus"></i>
                    </div>
                    <h5>
                        Your Coaches
                    </h5>

                    <div class="conversations players">

                        @if (count(Auth::user()->player->coaches) <= 0)
                            No Coaches Hired...
                        @else
                            @foreach (Auth::user()->player->coaches as $key => $coach)
                                <div class="conversation">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <div class="d-flex">
                                                <img src="{{ asset($coach->profile_img) }}" class="rounded shadow" alt="user image">
                                                <div class="meta">
                                                    <h6>{{ $coach->name }}</h6>
                                                    <small>{{ $coach->user->email }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-end">
                                            <a href="#" class="btn btn-theme">
                                                {{ $coach->sport }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        @endif

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
            </div>--}}

        </div>
        
    </div>

@endsection
