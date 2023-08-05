<div class="playbook-players">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">All Players</h3>
                    <div class="search-filter">
                        <div class="d-flex">
                            <div class="input-group input-group-sm mx-2 search-input">
                                <input type="text" class="form-control form-control-sm px-3" placeholder="Search" wire:model="search">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                            </div>
                            <div class="dropdown mx-2 filter-status">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="statusFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$status}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="statusFilter">
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('All')">All</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('Not Requested')">Not Requested</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('Requested')">Requested</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('Submitted')">Submitted</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($players as $player)
            <div class="row player-body mx-0 my-3">
                <div class="col-12 p-3 d-flex justify-content-between align-items-center">
                    @php
                    $status = 'Not Requested';
                    if($playbook = $player->player_playbooks()->where('coach_id', $coach_id)->first()){
                        if($playbook->status == 'requested')
                            $status = 'Requested';
                        else if($playbook->status == 'submitted')
                            $status = 'Submitted';
                    }
                    @endphp
                    <div class="player-info d-flex justify-content-start align-items-center">
                        
                        @if($player->profile_img)
                        <img class="player-image me-2" src="{{asset($player->profile_img)}}" alt="{{$player->name}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'">
                        @else
                        <img class="player-image me-2" src="{{asset('assets/img/default/default-profile-pic.jpg')}}" alt="{{$player->name}}">
                        @endif

                        <div>
                            <h5 class="fs-6 fw-bold m-0">{{$player->name}}</h5>
                            <span class="text-secondary">{{$player->user->email}}</span>
                        </div>
                    </div>
                    <div>
                        @if($status == 'Requested')
                        <span class="badge bg-warning text-dark mx-2">Pending</span></h2>
                        <button class="btn btn-theme" wire:click="viewPlaybook({{$playbook->id}})">
                            <i class="bi bi-eye"></i>
                            View Playbook
                        </button>
                        @elseif($status == 'Submitted')
                        <span class="badge bg-success mx-2">Complete</span></h2>
                        <button class="btn btn-theme" wire:click="viewPlaybook({{$playbook->id}})">
                            <i class="bi bi-eye"></i>
                            View Playbook
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <button class="btn btn-theme m-2 px-2 py-1" {{($current_page <= 1) ? 'disabled' : ''}} wire:click="changePage({{$current_page - 1}})"><i class="bi bi-chevron-left"></i></button>
            <span class="m-2">Page {{$current_page}} of {{$total_page}}</span>
            <button class="btn btn-theme m-2 px-2 py-1" {{($current_page >= $total_page) ? 'disabled' : ''}} wire:click="changePage({{$current_page + 1}})"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</div>