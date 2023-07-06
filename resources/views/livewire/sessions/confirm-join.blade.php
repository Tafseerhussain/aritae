<div class="session-join-page">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 h-100 my-2 p-4">
                <div class="row">
                    <div class="col-12 mt-0 session-info">
                        <h4 class="fw-bold">{{__('Session Details')}}</h4>
                        <div class="session-details">
                            <h6 class="fw-bold m-0">{{$session_data->name}}</h6>
                            <div class="mt-3 d-flex justify-content-start">
                                <div class="pe-3">
                                    <strong>Location: </strong><br>
                                    <strong>Sport: </strong><br>
                                    <strong>Time and Date: </strong><br>
                                </div>
                                <div>
                                    {{($session_data->video_session) ? 'Video Session' : $session_data->location.' (On Site)';}}<br>
                                    {{$session_data->sport->name}}<br>
                                    {{date('M d, Y', $session_data->date) . " " . $this->getTimeRange(json_decode($session_data->time_slot, true))}}

                                </div>
                            </div>
                            <p class="mt-3">
                                <strong>Description</strong><br>
                                {{$session_data['description']}}
                            </p>
                        </div>
                        <div class="session-athlete">
                            <div class="d-flex justify-content-start align-items-center flex-wrap">
                                <h4 class="fw-bold me-2">{{__('Host')}}</h4>
                                <span class="badge rounded-pill bg-light text-secondary fw-normal">{{__('Session Organizer')}}</span>
                            </div>
                            <div class="p-3 d-flex justify-content-start align-items-center bg-light athlete-container">
                                <div class="athlete-image">
                                    @if($session_data->user->user_type_id == 4 && $session_data->user->player->profile_img)
                                    <img src="{{asset($session_data->user->player->profile_img)}}" alt="Athlete image">
                                    @elseif($session_data->user->user_type_id == 2 && $session_data->user->coach->profile_img)
                                    <img src="{{asset($session_data->user->coach->profile_img)}}" alt="Athlete image">
                                    @else
                                    <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Athlete image">
                                    @endif
                                </div>
                                <div class="ms-3 athlete-details">
                                    <h6 class="fw-bold m-0 athlete-name">{{$session_data->user->full_name}}</h6>
                                    <strong>Location: </strong><span class="text-secondary">{{$session_data->user->city . ', ' . $session_data->user->country}}</span><br>
                                    @if($session_data->user->user_type_id == 4)
                                    <strong>Contact No: </strong><a href="tel:{{$session_data->user->player->phone}}">{{$session_data->user->player->phone}}</a>
                                    @elseif($session_data->user->user_type_id == 2)
                                    <strong>Contact No: </strong><a href="tel:{{$session_data->user->coach->phone}}">{{$session_data->user->coach->phone}}</a>
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
            <button class="btn btn-dark" wire:click="confirmJoin">{{__('Confirm Joining')}}</button>
        </div>
    </div>
</div>
