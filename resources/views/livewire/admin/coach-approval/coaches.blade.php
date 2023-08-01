<div class="coach-approval">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">Coach Applications</h3>
                    <div class="search-filter">
                        <div class="d-flex">
                            <div class="input-group input-group-sm mx-2 search-input">
                                <input type="text" class="form-control form-control-sm" placeholder="Search" wire:model="search">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($coaches as $coach)
            <div class="row coach-body mx-0 my-3">
                <div class="col-12 p-3 d-flex justify-content-between align-items-center">
                    <div class="user-info d-flex justify-content-start align-items-center">
                        
                        @if($coach->user->user_type_id == 2 && $coach->user->coach->profile_img)
                        <img class="coach-image me-2" src="{{asset($coach->user->coach->profile_img)}}" alt="{{$coach->user->full_name}}" onerror="this.src='{{asset('assets/img/default/default-profile-pic.jpg')}}'">
                        @else
                        <img class="coach-image me-2" src="{{asset('assets/img/default/default-profile-pic.jpg')}}" alt="{{$user->full_name}}">
                        @endif

                        <div>
                            <h5 class="fs-6 fw-bold m-0">{{$coach->name}}</h5>
                            <span class="text-secondary">{{$coach->user->email}}</span>
                            <p class="text-secondary m-0">
                                Sport: 
                                <span class="text-dark text-capitalize">
                                    @if($coach->user->user_type_id == 2)
                                    {{$coach->user->area_of_focus." Coach"}}
                                    @endif
                                </span>
                            </p>
                        </div>
                    </div>
                    <button class="btn btn-theme" wire:click="showDetails({{$coach->id}})">View Details</button>
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
