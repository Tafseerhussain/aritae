<div class="admin-users">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">All Users</h3>
                    <div class="search-filter">
                        <div class="d-flex">
                            <div class="input-group input-group-sm mx-2 search-input">
                                <input type="text" class="form-control form-control-sm" placeholder="Search">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                            </div>
                            <div class="dropdown mx-2 filter-sport">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="sportsFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$sport}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sportsFilter">
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="sportFilter('Sport')">All</a></li>
                                    @foreach($sports as $sport)
                                    <li><a class="dropdown-item text-capitalize" href="javascript:void(0)" wire:click="sportFilter('{{$sport->name}}')">{{$sport->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dropdown mx-2 filter-status">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="statusFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$status}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="statusFilter">
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('All')">All</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('Active')">Active</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="statusFilter('Suspended')">Suspended</a></li>
                                </ul>
                            </div>
                            <div class="dropdown mx-2 filter-type">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="typeFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{$type}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="statusFilter">
                                    <li><a class="dropdown-item" href="javascript:void(0)" wire:click="typeFilter('All')">All</a></li>
                                    <li><a class="dropdown-item text-capitalize" href="javascript:void(0)" wire:click="typeFilter('Coach')">Coach</a></li>
                                    <li><a class="dropdown-item text-capitalize" href="javascript:void(0)" wire:click="typeFilter('Parent')">Parent</a></li>
                                    <li><a class="dropdown-item text-capitalize" href="javascript:void(0)" wire:click="typeFilter('Player')">Player</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($users as $user)
            <div class="row user-body mx-0 my-3">
                <div class="col-12 p-3 d-flex justify-content-between align-items-center">
                    <div class="user-info d-flex justify-content-start align-items-center">
                        
                        @if($user->user_type_id == 2 && $user->coach->profile_img)
                        <img class="user-image me-2" src="{{asset($user->coach->profile_img)}}" alt="{{$user->full_name}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'">
                        @elseif($user->user_type_id == 3 && $user->parent->profile_img)
                        <img class="user-image me-2" src="{{asset($user->parent->profile_img)}}" alt="{{$user->full_name}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'">
                        @elseif($user->user_type_id == 4 && $user->player->profile_img)
                        <img class="user-image me-2" src="{{asset($user->player->profile_img)}}" alt="{{$user->full_name}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'">
                        @else
                        <img class="user-image me-2" src="{{asset('assets/img/default/default-profile-pic.jpg')}}" alt="{{$user->full_name}}">
                        @endif

                        <div>
                            <h5 class="fs-6 fw-bold m-0">{{$user->full_name}}</h5>
                            <span class="text-secondary">{{$user->email}}</span>
                            <p class="text-secondary m-0">
                                User Type: 
                                <span class="text-dark text-capitalize">
                                    @if($user->user_type_id == 2)
                                    {{$user->area_of_focus." Coach"}}
                                    @elseif($user->user_type_id == 3)
                                    Parent
                                    @elseif($user->user_type_id == 4)
                                    {{$user->area_of_focus." Player"}}
                                    @endif
                                </span> 
                                | 
                                <span class="user-status">Active</span>
                            </p>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right"></i>
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
