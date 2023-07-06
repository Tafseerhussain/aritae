<div class="sessions-page">
    <div class="row">
        @if($sessions && count($sessions) > 0)
        @foreach($sessions as $session)
        <div class="col-12">
            <div class="card w-100 p-3 my-2">
                <div class="row">
                    <div class="col-12 d-flex justify-content-start align-items-start position-relative">
                        @if($session->user_id == auth()->user()->id)
                        <div class="dropdown position-absolute top-0 end-0">
                            <button class="btn btn-light px-2 py-1" type="button" id="session-action" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu session-action-menu" aria-labelledby="session-action">
                                <li><a class="dropdown-item text-dark" href="javascript:void(0)" wire:click="editSession({{$session->id}})">Edit</a></li>
                                <li><a class="dropdown-item text-dark" href="javascript:void(0)" wire:click="rescheduleSession({{$session->id}})">Reschedule</a></li>
                                <li><a class="dropdown-item text-danger" href="javascript:void(0)" wire:click="confirmCancel({{$session->id}})">Cancel</a></li>
                            </ul>
                        </div>
                        @endif

                        <div class="session-logo">
                            @if($session->user && $session->user->user_type_id == 4 && $session->user->player->profile_img)
                            <img src="{{asset($session->user->player->profile_img)}}" alt="Session Logo">
                            @elseif($session->user && $session->user->user_type_id == 2 && $session->user->coach->profile_img)
                            <img src="{{asset($session->user->coach->profile_img)}}" alt="Session Logo">
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

                            @if($session->user_id != auth()->user()->id)
                                @if($session->user->user_type_id == 4)
                                <span class="text-secondary me-3"><i class="bi bi-person me-2"></i> <a href="{{route('player.profile.preview', ['id' => $session->user->id])}}">{{$session->user->full_name}}</a></span>
                                @elseif($session->user->user_type_id == 2)
                                <span class="text-secondary me-3"><i class="bi bi-person me-2"></i> <a href="{{route('coach.profile.preview', ['id' => $session->user->id])}}">{{$session->user->full_name}}</a></span>
                                @endif    
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
                            @if($session->user_id != auth()->user()->id)
                            <strong>{{__('Hosting By')}}</strong><br>
                            @endif
                            <strong>{{__('Coach')}}: </strong><br>
                            <strong>{{__('Duration')}}: </strong>
                        </div>
                        <div class="ms-2">
                            <span>{{$session->sport->name}}</span><br>
                            @if($session->user_id != auth()->user()->id)
                                @if($session->user->user_type_id == 4)
                                <a href="{{route('player.profile.preview', ['id' => $session->user->id])}}">{{$session->user->full_name}}</a><br>
                                @elseif($session->user->user_type_id == 2)
                                <a href="{{route('coach.profile.preview', ['id' => $session->user->id])}}">{{$session->user->full_name}}</a><br>
                                @endif 
                            @endif
                            @if($session->coaches()->first())
                            <a href="{{route('coach.profile.preview', ['id' => $session->coaches()->first()->id])}}">{{$session->coaches()->first()->name}}</a><br>
                            @else
                            <br>
                            @endif
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
                @if($session->user_id != auth()->user()->id)
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-danger text-white" wire:click="leaveSession({{$session->id}})">{{__('Leave Session')}}</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
        @endif
    </div>   
    
    <div wire:ignore.self class="modal fade" id="cancelSessionModal" tabindex="-1" aria-labelledby="cancelSessionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="cancelSession">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelSessionModalLabel">{{__('Cancel Session')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel this session? All data related to this session will be lost.
                        <input type="text" wire:model="cancel_id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger text-white">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openCancelSessionModal', event => {
            $("#cancelSessionModal").modal('show');
        })

        window.addEventListener('hideCancelSessionModal', event => {
            $("#cancelSessionModal").modal('hide');
        })
    </script>
</div>
