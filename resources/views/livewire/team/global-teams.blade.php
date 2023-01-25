<div class="w-100">
    @foreach($teams as $team)
    <div class="mt-3 mb-1 w-100 d-flex justify-content-between">
        <h4 class="mt-3">{{$team->name}} <span class="badge team-sport-badge text-dark">{{$team->sport}}</span></h4>
    </div>
    <div class="card w-100 pb-2">
        <div class="team-cover position-relative w-100 py-5 d-flex flex-column justify-content-center align-items-center" style="background-image: url('{{asset('storage/images/team/cover/'.$team->cover)}}')">
            <div class="team-logo" style="background-image: url('{{asset('storage/images/team/logo/'.$team->logo)}}')"></div>
        </div>
        <div class="row team-detail">
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
                    <div class="col-3 d-flex align-items-center">{{ $player->user->first_name }}</div>
                    <div class="col-3 d-flex align-items-center">{{ $player->user->last_name }}</div>
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
                    <div class="coach-body d-flex align-items-center">
                        @if($team->creator->profile_img)
                        <div class="profile-image" style="background-image: url('{{asset($team->creator->profile_img)}}')"></div>
                        @else
                        <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                        @endif
                        <div class="ms-2">
                            <h4 class="fs-5">{{$team->creator->name}}</h4>
                            <p class="mb-0">
                                <strong>Sport: </strong>{{$team->creator->sport}}
                            </p>
                        </div>
                    </div>
                </div>
                @endauth
                @foreach($team->coaches as $coach)
                <div class="col-sm-6 col-xl-4">
                    <div class="coach-body">
                        <div class="row">
                            <div class="col-4 d-flex align-items-center">
                                @if($coach->profile_img)
                                <div class="profile-image" style="background-image: url('{{asset($coach->profile_img)}}')"></div>
                                @else
                                <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                                @endif
                            </div>
                            <div class="col-8">
                                <h4 class="fs-5">{{$coach->user->full_name}}</h4>
                                <p>
                                    <strong>Sport: </strong>{{$coach->sport}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>