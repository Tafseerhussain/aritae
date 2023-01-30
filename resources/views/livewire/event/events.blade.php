<div>
    <div class="row events-page">
        <div class="col-12">
            <div class="d-flex justify-content-between w-100 px-2">
                <h2 class="fs-2 text-black">All Events</h2>
                @if(auth()->user()->user_type_id == 2)
                <a href="javascript:void(0)" class="btn btn-theme" wire:click="showCreateEvent"> + Add Event </a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <ul class="event-filter-list p-2">
                <li class="{{($filter == 'all') ? 'active' : ''}}" wire:click="applyFilter('all')">{{ __('All') }}</li>
                @if(auth()->user()->user_type_id == 2)
                <li class="{{($filter == 'my-events') ? 'active' : ''}}" wire:click="applyFilter('my-events')">{{ __('My Events') }}</li>
                @endif
                <li class="{{($filter == 'upcoming') ? 'active' : ''}}" wire:click="applyFilter('upcoming')">{{ __('Upcoming') }}</li>
                <li class="{{($filter == 'past') ? 'active' : ''}}" wire:click="applyFilter('past')">{{ __('Past') }}</li>
                <li class="{{($filter == 'pending') ? 'active' : ''}}" wire:click="applyFilter('pending')">{{ __('Pending') }}</li>
            </ul>
            <div class="event-sort">
                <label>Sort by</label>
                <select class="form-control form-control-sm" wire:model="sort" wire:change="applySort">
                    <option value="name">{{ __('Name') }}</option>
                    <option value="start">{{ __('Date') }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($events as $event)
        <div class="col-md-6 col-xl-4 mb-3">
            <div class="card event-card">
                <div class="dropdown event-action">
                    <button class="btn btn-light btn-sm" type="button" style="padding: 5px 10px;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="javascript:void(0)">Report</a></li>
                        @if(auth()->user()->user_type_id == 2)
                            @if($event->coach->id == auth()->user()->coach->id)
                            <li><a class="dropdown-item text-danger" href="javascript:void(0)" wire:click="deleteEvent({{$event->id}})">Delete</a></li>
                            @endif
                        @elseif(auth()->user()->user_type_id == 1)
                            @if($event->status == 'pending')
                            <li><a class="dropdown-item approve" href="javascript:void(0)" wire:click="approveEvent({{$event->id}})">Approve</a></li>
                            @endif
                            <li><a class="dropdown-item text-danger" href="javascript:void(0)" wire:click="deleteEvent({{$event->id}})">Delete</a></li>
                        @endif
                    </ul>
                </div>
                <div class="card-cover">
                    <img src="{{asset('storage/images/event_cover/'.$event->cover_image)}}" class="card-img-top" alt="{{$event->name}}">
                </div>
                <div class="card-body">
                    <a href="javascript:void(0)" wire:click="showDetail({{$event}})">
                        <h5 class="event-title">{{$event->name}}</h5>
                    </a>
                    <div class="event-date text-gray">
                        <i class="bi bi-calendar-check"></i>
                        {{date("M j, Y", strtotime($event->start))}} - 
                        {{date("M j, Y", strtotime($event->end))}}
                    </div>
                </div>
                <p class="event-text px-3">
                    {{(strlen($event->description) > 75) ? substr($event->description, 0, 75) . '...' : $event->description}}
                </p>
                <div class="event-coach px-3">
                    <i class="bi bi-person"></i>
                    {{$event->coach->name}}
                </div>
                @if($event->url)
                <div class="event-url px-3">
                    <a href="{{$event->url}}">
                        <i class="bi bi-globe"></i>
                        {{$event->url}}
                    </a>
                </div>
                @endif
                <div class="event-location px-3">
                    <i class="bi bi-geo-alt-fill"></i>
                    {{$event->city . ', ' . $event->state}}
                </div>
                <div class="event-price px-3">
                    <i class="bi bi-ticket"></i>
                    {{($event->type == 'paid') ? '$'.$event->price : 'Free'}}
                </div>
                <button type="button" class="btn btn-theme btn-block m-3">Book Ticket</button>
            </div>
        </div> 
        @endforeach
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete the event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="confirmDelete">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openDeleteModal', function(){
            $('#deleteModal').modal('show');
        });
        window.addEventListener('closeDeleteModal', function(){
            $('#deleteModal').modal('hide');
        });
    </script>
</div>
