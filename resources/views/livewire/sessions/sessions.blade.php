<div class="sessions-page">
    <div class="row">
        @if($sessions && count($sessions) > 0)
        @foreach($sessions as $session)
        <div class="col-12">
            <div class="card w-100 p-3 my-2">
                <div class="row">
                    <div class="col-12 d-flex justify-content-start align-items-start">
                        <div class="session-logo">
                            @if($session->host && $session->host->player->profile_img)
                            <img src="{{asset($session->host->player->profile_img)}}" alt="Session Logo">
                            @else
                            <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Session Logo">
                            @endif
                        </div>
                        <div class="session-info ms-2">
                            <span class="text-secondary">{{$session->created_at->diffForHumans()}}</span>
                            <h5 class="fw-bold m-0">{{$session->name}}</h5>
                            <span class="text-secondary">{{date('M, d', $session->date) . " " . $this->getTimeRange(json_decode($session->time_slot, true)) . " (" . (count(json_decode($session->time_slot, true)) * 30) . ' min)'}}</span><br>
                            @if($session->video_session)
                            <span class="text-secondary me-3"><i class="bi bi-camera-video me-2"></i> {{__('Video Session')}}</span>
                            @else
                            <span class="text-secondary me-3"><i class="bi bi-geo-alt-fill me-2"></i> {{__('On Site')}}</span>
                            @endif

                            @if($session->phone)
                            <span class="text-secondary me-3"><i class="bi bi-telephone-plus me-2"></i> {{$session->phone}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="session-player-head">
                            <img src="{{asset('assets/img/players/2.jpeg')}}">
                            <img src="{{asset('assets/img/players/3.jpeg')}}">
                            <img src="{{asset('assets/img/players/4.jpeg')}}"> 
                            <div class="count d-flex justify-content-center align-items-center bg-dark text-white"><small>20k</small></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-start">
                        <div>
                            <strong>{{__('Sport')}}: </strong><br>
                            <strong>{{__('Coach')}}: </strong><br>
                            <strong>{{__('Duration')}}: </strong>
                        </div>
                        <div class="ms-2">
                            <span>{{$session->sport->name}}</span><br>
                            <a href="{{route('coach.profile.preview', ['id' => $session->coaches()->first()->id])}}">{{$session->coaches()->first()->name}}</a><br>
                            <span>{{count(json_decode($session->time_slot, true)) * 30}} min</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <h6 class="fw-bold">{{__('Description')}}</h6>
                        <p>{{$session->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>    
</div>
