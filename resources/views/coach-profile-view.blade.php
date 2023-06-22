@extends('layouts.app')

@section('content')
    @if($user->coach->cover_img == '')
    <div class="coaches-hero"></div>
    @else
    <div class="coaches-hero" style="background-image: url('{{ asset($user->coach->cover_img) }}'); background-size: cover; background-position: center;"></div>
    @endif

    <div class="profile-preview-page">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-3 mb-3">
                    <div class="profile-meta">
                        <div class="profile">
                            @if($user->coach->profile_img == '')
                                <img src="{{ asset('assets/img/default/default-profile-pic.jpg') }}" alt="profile image">
                            @else
                                <img src="{{ asset($user->coach->profile_img) }}" alt="profile image">
                            @endif
                        </div>
                        <div class="text-center profile-title">
                            <h2 class="title">
                                {{ $user->full_name }}
                            </h2>
                            <small class="text-secondary">
                                @foreach ($user->sports as $sport)
                                    {{ $sport->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                Coach
                            </small>
                        </div>

                        {{-- <hr class="my-4"> --}}

                        <div class="metas mt-5">
                            <h2 class="certified-since">Certified Since 2019</h2>
                            <a href="#" class="text-secondary">
                                <i class="bi bi-mortarboard-fill"></i>
                                <span>
                                    IFC accredited
                                </span>
                            </a>
                            <a href="#" class="text-secondary">
                                <i class="bi bi-skype"></i>
                                <span>
                                    Go to workbook
                                </span>
                            </a>
                            <a href="#" class="text-secondary">
                                <i class="bi bi-geo-alt"></i>
                                <span>
                                    {{ $user->country }}
                                </span>
                            </a>
                            {{--<a href="#" class="text-secondary">
                                <i class="bi bi-cash"></i>
                                <span>
                                    ${{ $user->coach->hourly_rate }} / Hour
                                </span>
                            </a>--}}
                            <a href="#" class="text-secondary">
                                <i class="bi bi-camera-video"></i>
                                <span>
                                    Watch training sessions
                                </span>
                            </a>
                        </div>

                        <div class="sessions">
                            <div>
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
                    <div class="profile-content ms-lg-4">
                        <h2>
                            About {{ $user->first_name }}
                        </h2>
                        <p>
                            @if ($user->coach->about == '')
                                No description available!
                            @else
                                {{ $user->coach->about }}
                            @endif
                        </p>
                        
                        @if($user->userType->id == 2)
                            @if (Auth::user())
                                @if (Auth::user()->userType->type == 'player')
                                    @livewire('coach.request.form', ['coach_id' => $id])
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-theme hire-coach icon-right-full">
                                    <span class="me-2">Send Request</span>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            @endif
                        @endif
                        

                        <h2 class="mt-3 mb-2 pt-3">
                            Coaching Experience
                        </h2>
                        <div class="row">
                            <div class="col-12">
                                @if($user->coach->experiences && count($user->coach->experiences) > 0)
                                @foreach($user->coach->experiences as $experience)
                                <div class="experience-container my-3">
                                    <h4 class="experience-title"><strong>{{$experience->club_name}}</strong></h4>
                                    <div class="experience-meta d-flex align-items-center">
                                        <div class="club-logo">
                                            <img src="{{asset('assets/img/club-logo.jpg')}}" alt="Club Logo">
                                        </div>
                                        <div class="meta-description ms-2">
                                            <strong>Title:</strong> <span class="text-secondary">{{$experience->position}}</span> </br>
                                            <strong>Time Period:</strong> <span class="text-secondary">{{$experience->start_month . " " . $experience->start_year . " - " . $experience->end_month . " " . $experience->end_year}}</span>
                                        </div>
                                    </div>
                                    <p class="mt-3">
                                        {{$experience->description}}
                                    </p>
                                </div>
                                @endforeach
                                @else
                                <div class="experience-container my-3 d-flex flex-column justify-content-center align-items-center">
                                    <h4 class="fw-bold">No experience posted yet...</h4>
                                    <p>Let coach get to know you better by showing them your coaching experiences.</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <h2 class="mt-3 mb-2 pt-3">
                            Certifications
                        </h2>
                        <div class="row">
                            <div class="col-12">
                                @if($user->coach->certificates && count($user->coach->certificates) > 0)
                                @foreach($user->coach->certificates as $certificate)
                                <div class="certificate-container my-3">
                                    <h4 class="certificate-title"><strong>{{$certificate->certificate_name}}</strong></h4>
                                    <p class="m-0"><span class="text-secondary">{{$certificate->club_college}}</span></p>
                                    <p class="m-0"><span class="text-secondary">{{$certificate->certification_year}}</span></p>
                                </div>
                                @endforeach
                                @else
                                <div class="certificate-container my-3 d-flex flex-column justify-content-center align-items-center">
                                    <h4 class="fw-bold">No certificate posted yet...</h4>
                                    <p>Let coach get to know you better by showing them your certifications.</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <h2 class="mt-3 mb-2 pt-3">
                            Education
                        </h2>
                        <div class="row">
                            <div class="col-12">
                                @if($user->coach->educations && count($user->coach->educations) > 0)
                                @foreach($user->coach->educations as $education)
                                <div class="education-container my-3">
                                    <h4 class="education-title"><strong>{{$education->degree}}</strong></h4>
                                    <p class="m-0"><span class="text-secondary">{{$education->institute_name}}</span></p>
                                    <p class="m-0"><span class="text-secondary">{{$education->start_month . " " . $education->start_year . " - " . $education->end_month . " " . $education->end_year}}</span></p>
                                </div>
                                @endforeach
                                @else
                                <div class="education-container my-3 d-flex flex-column justify-content-center align-items-center">
                                    <h4 class="fw-bold">No education posted yet...</h4>
                                    <p>Let coach get to know you better by showing them your education.</p>
                                </div>
                                @endif
                            </div>
                        </div>

                        <h2 class="mt-3 mb-4 pt-3">
                            Active Training
                        </h2>
                        <div class="row">
                            <div class="col-12 d-flex flex-wrap justify-content-start">
                                <div class="training-container me-3 mb-3">
                                    <div class="training-meta d-flex align-items-center">
                                        <div class="training-logo">
                                            <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Training Logo">
                                        </div>
                                        <div class="meta-description ms-2">
                                            <h5 class="meta-title m-0">Soccer Training</h5>
                                            <small class="text-secondary">June 22, 2022 - July 22, 2022</small><br>
                                            <small class="text-secondary me-3"><i class="bi bi-camera-video"></i> Video Session</small> <small class="text-secondary me-3"><i class="bi bi-telephone-plus"></i> +92332541782</small>
                                        </div>
                                    </div>
                                    <p class="mt-2 mb-0">
                                        <strong>Sport: </strong>Baseball<br>
                                        <strong>Coach: </strong>Micheal Henry<br>
                                        <strong>Duration: </strong>30 days
                                    </p>
                                </div>
                                <div class="training-container me-3 mb-3">
                                    <div class="training-meta d-flex align-items-center">
                                        <div class="training-logo">
                                            <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Training Logo">
                                        </div>
                                        <div class="meta-description ms-2">
                                            <h5 class="meta-title m-0">Soccer Training</h5>
                                            <small class="text-secondary">June 22, 2022 - July 22, 2022</small><br>
                                            <small class="text-secondary me-3"><i class="bi bi-camera-video"></i> Video Session</small> <small class="text-secondary me-3"><i class="bi bi-telephone-plus"></i> +92332541782</small>
                                        </div>
                                    </div>
                                    <p class="mt-2 mb-0">
                                        <strong>Sport: </strong>Baseball<br>
                                        <strong>Coach: </strong>Micheal Henry<br>
                                        <strong>Duration: </strong>30 days
                                    </p>
                                </div>
                            </div>
                        </div>
                        <h2 class="mt-3 mb-4 pt-3">
                            Training Session
                        </h2>
                        <div class="row">
                        <div class="col-12 d-flex flex-wrap justify-content-start">
                            <div class="session-container me-3 mb-3">
                                <img class="session-video" src="{{asset('assets/img/session-placeholder.jpg')}}">
                                {{--<video class="session-video" controls>
                                    <source src="{{asset('assets/videos/sample1.mp4')}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>--}} 
                            </div>
                            <div class="session-container me-3 mb-3">
                                <img class="session-video" src="{{asset('assets/img/session-placeholder.jpg')}}">
                                {{--<video class="session-video" controls>
                                    <source src="{{asset('assets/videos/sample1.mp4')}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>--}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
