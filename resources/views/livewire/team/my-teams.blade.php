<div class="w-100">
    @foreach($teams as $team)
    <h4 class="mt-3">{{$team->name}} <span class="badge team-sport-badge text-dark">{{$team->sport}}</span></h4>
    <div class="card w-100 pb-2">
        <div class="team-cover position-relative w-100 py-5 d-flex flex-column justify-content-center align-items-center" style="background-image: url('{{asset('storage/images/team/cover/'.$team->cover)}}')">
            <div class="team-logo" style="background-image: url('{{asset('storage/images/team/logo/'.$team->logo)}}')"></div>
        </div>
        <div class="row team-detail">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="fs-5 fw-bold m-0">{{ __('Team Players') }}</h4>
                @if(auth()->user()->user_type_id == 2)
                <button class="btn btn-theme" wire:click="openPlayerModal({{$team->id}})">+ Add Player</button>
                @endif
            </div>
            <div class="team-players mt-2">
                @if(count($team->players) > 0)
                <div class="row player-header">
                    <div class="col-2"></div>
                    <div class="col-2 fw-bold">{{ __('First Name') }}</div>
                    <div class="col-2 fw-bold">{{ __('Last Name') }}</div>
                    <div class="col-2 fw-bold">{{ __('Position') }}</div>
                    <div class="col-2 fw-bold">{{ __('Jersey') }}</div>
                    <div class="col-2 fw-bold">{{ __('Action') }}</div>
                </div>
                @foreach($team->players as $player)
                    @if($player->user->user_type_id == 4)
                    <div class="row player-body">
                        <div class="col-2 d-flex align-items-center">
                            @if($player->profile_img)
                            <div class="profile-image" style="background-image: url('{{asset($player->profile_img)}}')"></div>
                            @else
                            <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                            @endif
                        </div>
                        <div class="col-2 d-flex align-items-center">{{ $player->user->first_name }}</div>
                        <div class="col-2 d-flex align-items-center">{{ $player->user->last_name }}</div>
                        <div class="col-2 d-flex align-items-center">{{ $player->pivot->position }}</div>
                        <div class="col-2 d-flex align-items-center">{{ $player->pivot->jersey }}</div>
                        <div class="col-2 d-flex align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu bg-white" aria-labelledby="dropdownMenuButton1">
                                    @if(auth()->user()->user_type_id == 4)
                                    <li><a class="dropdown-item text-dark" href="#">View profile</a></li>
                                    @elseif(auth()->user()->user_type_id == 2)
                                    <li><a class="dropdown-item text-dark" href="#">View profile</a></li>
                                    <li><a class="dropdown-item text-dark" href="#">Send message</a></li>
                                    <li><a class="dropdown-item text-danger" href="javascript:void(0)" wire:click="removePlayer({{$player->id}}, {{$team->id}})">Remove this player</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @else
                <p class="text-center">{{ __('No players available') }}</p>
                @endif
            </div>
        </div>
        <div class="row team-detail mt-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="fs-5 fw-bold m-0">{{ __('Team Coaches') }}</h4>
                @if(auth()->user()->user_type_id == 2)
                <button class="btn btn-theme" wire:click="openCoachModal({{$team->id}})">+ Add Coach</button>
                @endif
            </div>
            <div class="row team-coaches mt-2">
                @auth
                <div class="col-sm-6 col-xl-4">
                    <div class="coach-body">
                        <div class="row">
                            <div class="col-4 d-flex align-items-center">
                                @if($team->creator->profile_img)
                                <div class="profile-image" style="background-image: url('{{asset($team->creator->profile_img)}}')"></div>
                                @else
                                <div class="profile-image" style="background-image: url('{{asset('assets/img/default/default-profile-pic.jpg')}}')"></div>
                                @endif
                            </div>
                            <div class="col-8 position-relative">
                                <h4 class="fs-5">{{$team->creator->name}}</h4>
                                <p>
                                    <strong>Sport: </strong>{{$team->creator->sport}}
                                </p>
                                <div class="dropdown position-absolute top-0 end-0">
                                    <button class="btn btn-light btn-sm px-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-white" aria-labelledby="dropdownMenuButton1">
                                        @if(auth()->user()->user_type_id == 4)
                                        <li><a class="dropdown-item text-dark" href="{{route('coach.profile.preview', ['id' => $team->creator->id])}}">View profile</a></li>
                                        <li><a class="dropdown-item text-dark" href="#">Send message</a></li>
                                        @elseif(auth()->user()->user_type_id == 2)
                                        <li><a class="dropdown-item text-dark" href="{{route('coach.profile.preview', ['id' => $team->creator->id])}}">View profile</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endauth
                @foreach($team->coaches as $coach)
                    @if($coach->user->user_type_id == 2)
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
                                <div class="col-8 position-relative">
                                    <h4 class="fs-5">{{$coach->name}}</h4>
                                    <p>
                                        <strong>Sport: </strong>{{$coach->sport}}
                                    </p>

                                    <div class="dropdown position-absolute top-0 end-0">
                                        <button class="btn btn-light btn-sm px-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu bg-white" aria-labelledby="dropdownMenuButton1">
                                            @if(auth()->user()->user_type_id == 4)
                                            <li><a class="dropdown-item text-dark" href="{{route('coach.profile.preview', ['id' => $coach->id])}}">View profile</a></li>
                                            <li><a class="dropdown-item text-dark" href="#">Send message</a></li>
                                            @elseif(auth()->user()->user_type_id == 2)
                                            <li><a class="dropdown-item text-dark" href="{{route('coach.profile.preview', ['id' => $coach->id])}}">View profile</a></li>
                                            <li><a class="dropdown-item text-dark" href="#">Send message</a></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)" wire:click="removeCoach({{$coach->id}}, {{$team->id}})">Remove this player</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <!-- Player Modal -->
    <div wire:ignore.self class="modal fade" id="playerModal" tabindex="-1" aria-labelledby="playerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="playerModalLabel">Add Player</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" id="player-name" name="player_name" placeholder="Search Player" wire:model="player_name" wire:keyup="playerSuggestion">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" id="player-position" name="player_position" placeholder="Position" wire:model="player_position">
                        </div>
                        <div class="col-3">
                            <input type="number" class="form-control" id="player-jersey" name="player_jersey" placeholder="Jersey Number" wire:model="player_jersey">
                        </div>
                    </div>
                    <div class="row player-suggestions">
                        <div class="col-12">
                            @foreach($player_suggestion as $player)
                            <div class="player-suggestion" wire:click="selectPlayer('{{$player['name']}}', '{{$player['email']}}', {{$player['id']}}, {{$player['user_id']}})">
                                <h5 class="m-0">{{$player['name']}}</h5>
                                <small>Email: {{$player['email']}}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="text" name="player_email" wire:model="player_email" hidden>
                    <input type="text" name="player_id" wire:model="player_id" hidden>
                    <input type="text" name="player_user_id" wire:model="player_user_id" hidden>
                    @if('player_error_message')
                        <span class="text-danger">
                            <strong>{{ $player_error_message }}</strong>
                        </span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-theme" wire:click="addPlayer">Add Player</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Coach Modal -->
    <div wire:ignore.self class="modal fade" id="coachModal" tabindex="-1" aria-labelledby="coachModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="playerModalLabel">Add Coach</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control" id="coach-name" name="coach_name" placeholder="Search Coach" wire:model="coach_name" wire:keyup="coachSuggestion">
                        </div>
                    </div>
                    <div class="row coach-suggestions">
                        <div class="col-12">
                            @foreach($coach_suggestion as $coach)
                            <div class="coach-suggestion" wire:click="addCoach('{{$coach['name']}}', '{{$coach['email']}}', {{$coach['id']}}, {{$coach['user_id']}})">
                                <h5 class="m-0">{{$coach['name']}}</h5>
                                <small>Email: {{$coach['email']}}</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <input type="text" name="coach_email" wire:model="coach_email" hidden>
                    <input type="text" name="coach_id" wire:model="coach_id" hidden>
                    <input type="text" name="coach_user_id" wire:model="coach_user_id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openPlayerModal', event => {
            $('#playerModal').modal('show');
        });
        window.addEventListener('closePlayerModal', event => {
            $('#playerModal').modal('hide');
        });

        window.addEventListener('openCoachModal', event => {
            $('#coachModal').modal('show');
        });
        window.addEventListener('closeCoachModal', event => {
            $('#coachModal').modal('hide');
        });
    </script>
</div>
