<div>
    <div class="container">
        <div class="row events-page">
            <div class="col-12">
                <div class="d-flex justify-content-between w-100 px-2">
                    <h2 class="fs-2 text-black">Add New Event</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 pl-2">
                <form method="POST" wire:submit.prevent="submitEvent">
                    <div class="card px-2 mb-3 ms-2">
                        <div class="row mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="event_name" class="col-form-label">{{ __('Event Name') }}</label>
                                <input id="event_name" type="text" class="form-control @error('eventName') is-invalid @enderror" placeholder="Event name" autofocus wire:model="eventName">

                                @error('eventName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="event_start" class="col-form-label">{{ __('Event Start Date') }}</label>
                                <input id="event_start" type="date" class="form-control @error('eventStart') is-invalid @enderror" wire:model="eventStart">

                                @error('eventStart')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="event_end" class="col-form-label">{{ __('Event End Date') }}</label>
                                <input id="event_end" type="date" class="form-control @error('eventEnd') is-invalid @enderror" wire:model="eventEnd">

                                @error('eventEnd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="event_city" class="col-form-label">{{ __('City') }}</label>
                                <input id="event_city" type="text" class="form-control @error('eventCity') is-invalid @enderror" wire:model="eventCity">

                                @error('eventCity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="event_state" class="col-form-label">{{ __('State/Province') }}</label>
                                <input id="event_state" type="text" class="form-control @error('eventState') is-invalid @enderror" wire:model="eventState">

                                @error('eventState')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="event_url" class="col-form-label">{{ __('Event Website URL (optional)') }}</label>
                                <input id="event_url" type="text" class="form-control @error('eventURL') is-invalid @enderror" wire:model="eventURL" placeholder="https://aritae.com">

                                @error('eventURL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="event_type" class="col-form-label">{{ __('Event Joining') }}</label>
                                <select id="event_type" type="text" class="form-control @error('eventType') is-invalid @enderror" wire:model="eventType">
                                    <option value="paid">{{ __('Paid') }}</option>
                                    <option value="free">{{ __('Free') }}</option>
                                </select>

                                @error('eventType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            @if($eventType == 'paid')
                            <div class="col-md-6 mb-3">
                                <label for="event_price" class="col-form-label">&nbsp</label>
                                <input id="event_price" type="text" class="form-control @error('eventPrice') is-invalid @enderror" wire:model="eventPrice" placeholder="$$">

                                @error('eventPrice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @endif

                            <div class="col-md-12 mb-3">
                                <label for="event_description" class="col-form-label">{{ __('Description') }}</label>
                                <textarea id="event_description" class="form-control @error('eventDescription') is-invalid @enderror" wire:model="eventDescription" placeholder="Write here..."></textarea>

                                @error('eventDescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="event_cover" class="col-form-label">{{__('Event Cover Photo')}}</label><br>
                                <input id="event_cover" type="file" class="form-control @error('eventCover') is-invalid @enderror" wire:model="eventCover" hidden>
                                <button type="button" class="btn btn-light btn-block w-100" onclick="$('#event_cover').click()">
                                    <i class="bi bi-camera"></i> Upload Photo
                                </button>

                                @error('eventCover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="event_cover" class="col-form-label">{{__('Teams Joining')}}</label><br>
                                
                                @foreach($teams as $team)
                                <div class="event-team my-2 w-100 d-flex justify-content-between align-items-center">
                                    <div class="team-name d-flex justify-content-start align-items-center">
                                        <div class="team-logo d-flex align-items-center">
                                            <img src="{{asset('storage/images/team/logo/'.$team['logo'])}}" alt="Team Logo">
                                        </div>
                                        <h5 class="fw-bold fs-6">{{$team['name']}}</h5>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-light text-danger" wire:click="deleteTeam({{$team['id']}})">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                @endforeach
                                <div class="w-100 d-flex justify-content-center mt-3">
                                    <button type="button" class="btn btn-theme" wire:click="openTeamModal">
                                        + Add Team
                                    </button>
                                </div>

                                @error('eventCover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="upload-progress">
                            <div class="upload-progress-active"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-light m-2" wire:click="cancelEvent">Cancel</button>
                            <button type="submit" id="event-submit-button" class="btn btn-theme m-2">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card tip-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-info-circle-fill"></i>
                            Pro Tip
                        </h5>
                        <p class="card-text">
                            It's important that your event schedule is up to date so that coaches know where to find you. 
                            Add past events too; these events can be an indication that you are competing at a high level.
                        </p>
                    </div>
                </div>

                <div class="feature-card my-4" style="background-image: url({{asset('assets/img/events/feature-card.jpg')}})">
                    <h4 class="feature-card-title">
                        How many coaches have discovered you today?
                    </h4>
                    <p class="feature-card-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <a href="" class="btn btn-block btn-default btn-sm d-flex align-items-center justify-content-between feature-card-button">
                        <span>Ready for the next level?</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Modal -->
    <div wire:ignore.self class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="playerModalLabel">Add Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control" id="team-name" name="team_name" placeholder="Search Team" wire:model="teamName" wire:keyup="teamSuggestion">
                        </div>
                    </div>
                    <div class="row team-suggestions">
                        <div class="col-12">
                            @foreach($teamSuggestion as $team)
                            <div class="team-suggestion w-100 my-2 d-flex justify-content-start align-items-center" wire:click="addTeam('{{$team['name']}}', '{{$team['logo']}}', {{$team['id']}})">
                                <div class="team-logo d-flex align-items-center">
                                    <img src="{{asset('storage/images/team/logo/'.$team['logo'])}}" alt="Team Logo">
                                </div>
                                <h5 class="m-0">{{$team['name']}}</h5>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
            $('#event-submit-button').prop('disabled', true);
        });
        window.addEventListener('livewire-upload-finish', event => {
            $('.upload-progress').css('display', 'none');
            $('#event-submit-button').prop('disabled', false);
        });
        window.addEventListener('livewire-upload-error', event => {
            $('.upload-progress').css('display', 'none');
            $('#event-submit-button').prop('disabled', false);
        });
        window.addEventListener('livewire-upload-progress', event => {
            $('.upload-progress').css('display', 'block');
            $('#event-submit-button').prop('disabled', true);
            $('.upload-progress-active').css('width', event.detail.progress+"%");
        });

        window.addEventListener('openTeamModal', event => {
            $('#teamModal').modal('show');
        });
        window.addEventListener('closeTeamModal', event => {
            $('#teamModal').modal('hide');
        });
    </script>
</div>
