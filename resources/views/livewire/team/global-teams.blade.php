<div class="w-100">
    @if (count($teams) == 0)
        <div class="row mt-4">
            <div class="col-12">
                <p class="text-center alert">
                    No Teams Found!
                </p>
            </div>
        </div>
    @endif
    @foreach($teams as $team)
    <div class="card w-100 mt-3">
        <div class="px-4 py-2 w-100 d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <div class="global-team-logo" style="background-image: url('{{asset('storage/images/team/logo/'.$team->logo)}}')"></div>
                <h5 class="global-team-title mx-2 my-0" wire:click="openDetail({{$team->id}})">{{$team->name}}</h5><span class="global-team-stats text-secondary fs-6">{{count($team->players)}} Athletes <i class="bi bi-dot"></i> {{count($team->coaches)+1}} Coaches</span>
            </div>
            <div>
                <i class="bi bi-chevron-down global-team-collapse" data-bs-toggle="collapse" data-bs-target="#team-detail-{{$team->id}}"></i>
            </div>
        </div>
        <div class="collapse" id="team-detail-{{$team->id}}">
            <div class="row team-detail global-team-detail mt-0">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="fs-5 fw-bold m-0">{{ __('Team Players') }}</h4>
                </div>
                <div class="team-players mt-2">
                    @if(count($team->players) > 0)
                    <div class="row player-header">
                        <div class="col-2"></div>
                        <div class="col-3 fw-bold">{{ __('First Name') }}</div>
                        <div class="col-3 fw-bold">{{ __('Last Name') }}</div>
                        <div class="col-2 fw-bold">{{ __('Position') }}</div>
                        <div class="col-2 fw-bold">{{ __('Jersey') }}</div>
                    </div>
                    @foreach($team->players as $player)
                    <div class="row player-body">
                        <div class="col-2 d-flex align-items-center">
                            @if($player->profile_img)
                            <div class="profile-image" style="background-image: url('{{asset($player->profile_img)}}')"></div>
                            @else
                            <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                            @endif
                        </div>
                        <div class="col-3 d-flex align-items-center name">{{ $player->user->first_name }}</div>
                        <div class="col-3 d-flex align-items-center name">{{ $player->user->last_name }}</div>
                        <div class="col-2 d-flex align-items-center">{{ $player->pivot->position }}</div>
                        <div class="col-2 d-flex align-items-center">{{ $player->pivot->jersey }}</div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center">{{ __('No players added') }}</p>
                    @endif
                </div>
            </div>
            <div class="row team-detail mt-3">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="fs-5 fw-bold m-0">{{ __('Team Coaches') }}</h4>
                </div>
                <div class="row team-coaches mt-2">
                    @auth
                    <div class="col-sm-6 col-xl-4">
                        <div class="coach-body d-flex align-items-center position-relative">
                            @if($team->creator->profile_img)
                            <div class="profile-image" style="background-image: url('{{asset($team->creator->profile_img)}}')"></div>
                            @else
                            <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                            @endif
                            <div class="ms-2 flex-grow-1">
                                <h4 class="title">{{$team->creator->name}} <i class="bi bi-patch-check-fill verified"></i></h4>
                                <p class="mb-0">
                                    <strong>Sport: </strong>{{$team->creator->sport}}
                                </p>
                            </div>
                            <div class="seal">
                                <img src="{{asset('assets/img/default/coach-seal.png')}}" width="50" height="50">
                            </div>
                        </div>
                    </div>
                    @endauth
                    @foreach($team->coaches as $coach)
                    <div class="col-sm-6 col-xl-4">
                        <div class="coach-body d-flex align-items-center position-relative">
                            @if($coach->profile_img)
                            <div class="profile-image" style="background-image: url('{{asset($coach->profile_img)}}')"></div>
                            @else
                            <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                            @endif
                            <div class="ms-2 flex-grow-1">
                                <h4 class="title">{{$coach->name}} <i class="bi bi-patch-check-fill verified"></i></h4>
                                <p class="mb-0">
                                    <strong>Sport: </strong>{{$coach->sport}}
                                </p>
                            </div>
                            <div class="seal">
                                <img src="{{asset('assets/img/default/coach-seal.png')}}" width="50" height="50">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>