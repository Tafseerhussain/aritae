<div>
    <div class="row my-2">
        <div class="col-12 d-flex justify-content-end align-items-center event-sort">
            Sort By
            <select class="form-control form-control-sm mx-2" wire:change="sortEvents" wire:model="sort">
                <option value="name">{{__('Name')}}</option>
                <option value="date">{{__('Date')}}</option>
            </select>
        </div>
    </div>
    <div class="row p-5 pt-2">
        @foreach($events as $event)
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card event-card mb-3">
                <img src="{{asset('storage/images/event_cover/'.$event->cover_image)}}" class="card-img-top" alt="{{$event->name}}">
                <div class="card-body">
                    @if(strtotime($event->end) < time())
                    <div class="event-progress complete">{{ __('Complete') }}</div>
                    @elseif(strtotime($event->start) < time() && strtotime($event->end) > time())
                    <div class="event-progress progress">{{ __('In Progress') }}</div>
                    @elseif(strtotime($event->start) > time())
                    <div class="event-progress upcoming">{{ __('Up Coming') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <a class="coach-link" href="{{route('coach.profile.preview', ['id' => $event->coach->id])}}"><i class="bi bi-person"></i> {{$event->coach->name}}</a>
                            &nbsp;<i class="bi bi-dot"></i>&nbsp;
                            <span class="text-secondary"><i class="bi bi-calendar3"></i> {{date("M j, Y", strtotime($event->start))}}</span>

                        </div>
                    </div>
                    <a class="text-decoration-none" href="{{route('event-detail', ['id' => $event->id])}}"><h5 class="card-title">{{$event->name}}</h5></a>
                    <p class="card-text">{{(strlen($event->description) > 150) ? substr($event->description, 0, 150) . '...' : $event->description}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
