@extends('layouts.app')

@section('content')
    
    <div class="profile-preview-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cover">
                        <a href="/" class="btn btn-theme">
                            <i class="fa-solid fa-arrow-left-long"></i>
                            <span class="ms-1">Back to All Coaches</span>
                        </a>
                        <img src="{{ asset($user->coach->cover_img) }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-3">

                    <div class="profile-meta">
                        <div class="profile">
                            <img src="{{ asset($user->coach->profile_img) }}" alt="">
                        </div>
                        <div class="text-center">
                            <h2 class="title">
                                {{ $user->full_name }}
                            </h2>
                            <small>
                                @foreach ($user->sports as $sport)
                                    {{ $sport->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                Coach
                            </small>
                            <h2 class="since text-uppercase">
                                MEMBER SINCE {{ $user->created_at->format('d M, Y') }}
                            </h2>
                        </div>

                        {{-- <hr class="my-4"> --}}

                        <div class="metas mt-5">
                            <a href="#" class="text-primary">
                                <i class="bi bi-mortarboard-fill"></i>
                                <span>
                                    IFC accredited
                                </span>
                            </a>
                            <a href="#" class="text-primary">
                                <i class="bi bi-skype"></i>
                                <span class="purple">
                                    Available for new players
                                </span>
                            </a>
                            <a href="#" class="text-dark">
                                <i class="bi bi-geo-alt"></i>
                                <span>
                                    {{ $user->country }}
                                </span>
                            </a>
                            <a href="#" class="text-dark">
                                <i class="bi bi-tag"></i>
                                <span>
                                    $600 - $700/h
                                </span>
                            </a>
                            <a href="#" class="text-dark">
                                <i class="bi bi-camera-video"></i>
                                <span>
                                    Watch {{ $user->first_name }}'s Videos
                                </span>
                            </a>
                        </div>

                        <div class="sessions">
                            <div class="text-center">
                                <h5>
                                    Sessions overview
                                </h5>
                                <small>
                                    1950 total joined sessions
                                </small>
                            </div>
                            <div class="session-list">
                                <div class="session d-flex">
                                    <img src="{{ asset('assets/icons/completed-session.svg') }}" alt="completed">
                                    <div>
                                        <h6>1800</h6>
                                        <small>Completed sessions</small>
                                    </div>
                                </div>
                                <div class="session d-flex">
                                    <img src="{{ asset('assets/icons/inprogress-session.svg') }}" alt="completed">
                                    <div>
                                        <h6>30</h6>
                                        <small>Sessions in progress</small>
                                    </div>
                                </div>
                                <div class="session d-flex">
                                    <img src="{{ asset('assets/icons/cancelled-session.svg') }}" alt="completed">
                                    <div>
                                        <h6>14</h6>
                                        <small>Cancelled sessions</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="profile-review">
                        <h2>
                            About {{ $user->first_name }}
                        </h2>
                        <p>
                            @if ($user->coach->about == '')
                                No description added by the coach!
                            @else
                                {{ $user->coach->about }}
                            @endif
                            
                        </p>
                        
                        @if (Auth::user())
                            @if (Auth::user()->userType->type == 'player')
                                @livewire('coach.request.form', ['coach_id' => $id])
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-theme hire-coach icon-right-full">
                                <span>Hire this coach</span>
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        @endif
                        

                        <h2 class="mt-5 pt-3">
                            How {{ $user->first_name }} Can Help You
                        </h2>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione, voluptatibus! Quae tenetur accusantium sequi, labore temporibus doloribus consequuntur repellat laudantium suscipit dolorum voluptates dicta modi, sapiente, non aut odit perferendis.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, ipsum soluta sed sapiente, non nihil dolores modi tempore accusantium excepturi, nesciunt, laborum libero quod laboriosam delectus molestiae. Id unde, debitis?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
