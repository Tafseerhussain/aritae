<div class="all-events position-relative pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end align-items-center">
                <div class="d-flex justify-content-between">
                    <div class="sorting d-flex">
                        <span class="text-nowrap">Sort by </span>
                        <select class="form-select" wire:model="sort" wire:change="sortEvents">
                            <option value="name">{{ __('Name') }}</option>
                            <option value="date">{{ __('Date') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="row loading-state my-5" wire:loading>
                    <div class="col-12 text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="event-cards" wire:loading.remove>
                    @if ($events->isEmpty())
                    <div class="mt-5 text-center nothing-found">
                        <img src="{{ asset('assets/icons/not-found.svg') }}" alt="nothing found">
                        <h3 class="mt-5">No Records Found </h3>
                    </div>
                    @else
                    <div class="row g-3">
                        @foreach ($events as $event)
                        
                        <div class="col-lg-4 col-md-6">
                            <div class="event-card h-100">
                                <div class="card-cover">
                                    @if($event->cover_image == '')
                                        <img src="{{ asset('assets/img/default/default-cover.jpg') }}" alt="">
                                    @else
                                        <img src="{{ asset('storage/images/event_cover/'.$event->cover_image) }}" alt="">
                                    @endif
                                </div>
                                <div class="event-card-body p-3">
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
                                    <a class="text-decoration-none" href="{{route('event-detail', ['id' => $event->id])}}">
                                        <h5 class="card-title mt-2 mb-3">{{$event->name}}</h5>
                                    </a>
                                    <p class="card-text">{{(strlen($event->description) > 150) ? substr($event->description, 0, 150) . '...' : $event->description}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            {{-- 
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
            --}}
        </div>
    </div>
</div>
