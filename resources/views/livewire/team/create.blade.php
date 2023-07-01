<div class="card w-100 mt-3 pb-2">
    <form method="POST" wire:submit.prevent="submitTeam">
        <div class="team-cover position-relative w-100 py-5 d-flex flex-column justify-content-center align-items-center" style="background-image: url('{{$cover_background}}')">
            <h2 class="text-light">No cover photo yet</h2>
            <p class="text-light">
                Aritae gives you every college program and coach in the country. Get started now!
            </p>
            <a href="javascript:void(0)" class="btn btn-theme" onclick="$('#cover-photo').click()">Upload Cover Photo</a>

            <div class="team-logo" style="background-image: url('{{$logo_background}}')">
                <a href="javascript:void(0)" class="btn btn-theme btn-sm team-logo-button" onclick="$('#logo').click()">+</a>
            </div>
            <input type="file" name="cover_photo" id="cover-photo" wire:model="cover_photo" hidden>
            <input type="file" name="logo" id="logo" wire:model="logo" hidden>
        </div>

        <div class="row team-info p-2 g-3 px-3">
            <div class="col-12">
                <div class="upload-progress">
                    <div class="upload-progress-active"></div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="name" class="col-form-label fw-bold">{{ __('Team Name') }}</label>
                <input id="name" type="text" class="form-control @error('team_name') is-invalid @enderror" placeholder="Lorem Team" autofocus wire:model="team_name">

                @error('team_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="sport" class="col-form-label fw-bold">{{ __('Sport') }}</label>
                <select id="sport" class="form-control @error('sport') is-invalid @enderror" wire:model="sport">
                    @foreach($sports as $sport)
                    <option value="{{$sport->name}}">{{$sport->name}}</option>
                    @endforeach
                </select>

                @error('sport')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3 p-2 px-3 g-3">
            <div class="col-12">
                <label class="col-form-label fs-5 fw-bold">{{ __('Team Players') }}</label>
                <div class="team-create-players">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        @if(count($players))
                        <div class="row w-100 player-header">
                            <div class="col-md-4">{{ __('Name') }}</div>
                            <div class="col-md-3">{{ __('Email') }}</div>
                            <div class="col-md-2">{{ __('Position') }}</div>
                            <div class="col-md-2">{{ __('Jersey') }}</div>
                            <div class="col-md-1">...</div>
                        </div>
                        @foreach($players as $player)
                        <div class="row w-100 player-body">
                            <div class="col-md-4">{{$player['name']}}</div>
                            <div class="col-md-3">{{$player['email']}}</div>
                            <div class="col-md-2">{{$player['position']}}</div>
                            <div class="col-md-2">{{$player['jersey']}}</div>
                            <div class="col-md-1">
                                <span class="text-danger fw-bold" wire:click="deletePlayer({{$player['id']}})"><i class="bi bi-trash"></i></span>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="mt-3">{{ __('No players added yet.')}}</p>
                        @endif
                        <a href="javascript:void(0)" class="btn btn-theme my-3" wire:click="openPlayerModal">+ Add Player</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 p-2 px-3 g-3">
            <div class="col-12">
                <label class="col-form-label fs-5 fw-bold">{{ __('Team Coaches') }}</label>
                <div class="team-create-coaches">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        @if(count($coaches))
                        <div class="row w-100 coach-header">
                            <div class="col-md-5">{{ __('Name') }}</div>
                            <div class="col-md-6">{{ __('Email') }}</div>
                            <div class="col-md-1">...</div>
                        </div>
                        @foreach($coaches as $coach)
                        <div class="row w-100 coach-body">
                            <div class="col-md-5">{{$coach['name']}}</div>
                            <div class="col-md-6">{{$coach['email']}}</div>
                            <div class="col-md-1">
                                <span class="text-danger fw-bold" wire:click="deleteCoach({{$coach['id']}})"><i class="bi bi-trash"></i></span>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="mt-3">{{ __('No coaches added yet.')}}</p>
                        @endif
                        <a href="javascript:void(0)" class="btn btn-theme my-3" wire:click="openCoachModal">+ Add Coach</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-12">
                @error('cover_photo')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span></br/>
                @enderror
                @error('logo')
                <span class="text-danger">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" id="team-submit-btn" class="btn btn-theme">Create Team</a>
            </div>
        </div>
    </form>

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
        window.addEventListener('livewire-upload-start', event => {
            $('.upload-progress').css('display', 'block');
            $('#team-submit-button').prop('disabled', true);
        });
        window.addEventListener('livewire-upload-finish', event => {
            $('.upload-progress').css('display', 'none');
            $('#team-submit-button').prop('disabled', false);
        });
        window.addEventListener('livewire-upload-error', event => {
            $('.upload-progress').css('display', 'none');
            $('#team-submit-button').prop('disabled', false);
        });
        window.addEventListener('livewire-upload-progress', event => {
            $('.upload-progress').css('display', 'block');
            $('#team-submit-button').prop('disabled', true);
            $('.upload-progress-active').css('width', event.detail.progress+"%");
        });

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
