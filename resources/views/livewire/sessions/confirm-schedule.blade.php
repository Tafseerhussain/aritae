<div class="confirm-schedule-page">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 h-100 my-2 p-4">
                <div class="row">
                    <div class="col-xl-5 session-schedule">
                        <div class="logo">
                            <img src="{{asset('assets/img/aritae-icon.png')}}" width="50" alt="Aritae Logo">
                            <p class="text-secondary">{{__('Aritae Page')}}</p>
                        </div>
                        <h4 class="fw-bold">{{__('Aritae Session Scheduling Confirmation')}}</h4>
                        <p class="m-2 session-duration text-secondary">
                            <i class="bi bi-clock-fill me-2"></i> {{(count($session_data['time_slot']) * 30) . ' min'}}
                        </p>
                        <p class="m-2 session-time text-secondary">
                            <i class="bi bi-calendar-check-fill me-2"></i> {{$this->getTimeRange($session_data['time_slot']) . ', ' . date('l, M d, Y', $session_data['date'])}}
                        </p>
                        <p class="m-2 session-timezone text-secondary">
                            <i class="bi bi-globe-americas me-2"></i> {{$session_data['timezone']}} Time
                        </p>
                    </div>
                    <div class="col-xl-7 mt-3 mt-xl-0 session-info">
                        <h4 class="fw-bold">{{__('Session Information')}}</h4>
                        <div class="session-details">
                            <h6 class="fw-bold m-0">{{$session_data['name']}}</h6>
                            <p class="mb-2">
                                <span class="text-secondary me-3"><i class="fas fa-basketball-ball"></i> {{$session_data['sport']}}</span>
                                @if($session_data['video_session'])
                                <span class="text-secondary me-3"><i class="bi bi-camera-video"></i> Video Session</span>
                                @else
                                <span class="text-secondary me-3"><i class="bi bi-geo-alt-fill"></i> On Site</span>
                                @endif
                            </p>
                            <p>{{$session_data['description']}}</p>
                        </div>
                        <div class="session-athlete">
                            <div class="d-flex justify-content-start align-items-center flex-wrap">
                                <h4 class="fw-bold me-2">{{__('Host')}}</h4>
                                <span class="badge rounded-pill bg-light text-secondary fw-normal">{{__('Session Organizer')}}</span>
                            </div>
                            <div class="p-3 d-flex justify-content-start align-items-center bg-light athlete-container">
                                <div class="athlete-image">
                                    @if(auth()->user()->user_type_id == 4 && auth()->user()->player->profile_img)
                                    <img src="{{asset(auth()->user()->player->profile_img)}}" alt="Athlete image">
                                    @elseif(auth()->user()->user_type_id == 2 && auth()->user()->coach->profile_img)
                                    <img src="{{asset(auth()->user()->coach->profile_img)}}" alt="Athlete image">
                                    @else
                                    <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Athlete image">
                                    @endif
                                </div>
                                <div class="ms-3 athlete-details">
                                    <h6 class="fw-bold m-0 athlete-name">{{auth()->user()->full_name}}</h6>
                                    <strong>Location: </strong><span class="text-secondary">{{auth()->user()->city . ', ' . auth()->user()->country}}</span><br>
                                    @if(auth()->user()->user_type_id == 4)
                                    <strong>Contact No: </strong><a href="tel:{{auth()->user()->player->phone}}">{{auth()->user()->player->phone}}</a>
                                    @elseif(auth()->user()->user_type_id == 2)
                                    <strong>Contact No: </strong><a href="tel:{{auth()->user()->coach->phone}}">{{auth()->user()->coach->phone}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(count($coaches) > 0)
                        <div class="session-coach mt-3">
                            <div class="d-flex justify-content-start align-items-center flex-wrap">
                                <h4 class="fw-bold me-2">{{__('Coach')}}</h4>
                            </div>
                            @foreach($coaches as $coach)
                            <div class="p-3 mb-2 d-flex justify-content-start align-items-center bg-light coach-container">
                                <div class="coach-image">
                                    @if($coach->profile_img)
                                    <img src="{{asset($coach->profile_img)}}" alt="Coach image">
                                    @else
                                    <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Coach image">
                                    @endif
                                </div>
                                <div class="ms-3 coach-details">
                                    <h6 class="fw-bold m-0 coach-name">{{$coach->user->full_name}}</h6>
                                    <strong>Location: </strong><span class="text-secondary">{{$coach->city . ', ' . $coach->country}}</span><br>
                                    <strong>Contact No: </strong><a href="tel:{{$coach->phone}}">{{$coach->phone}}</a><br>
                                    <a href="{{route('coach.profile.preview', ['id' => $coach->user->id])}}">{{__('View Profile')}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-dark" wire:click="confirmSession">{{__('Confirm')}}</button>
        </div>
    </div>
</div>
