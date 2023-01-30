<div class="event-detail-page">

    {{-- Event Detail Hero --}}
    <div class="event-detail-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="event-player-head">
                        <img src="{{asset('assets/img/players/1.jpeg')}}">
                        <img src="{{asset('assets/img/players/2.jpeg')}}">
                        <img src="{{asset('assets/img/players/3.jpeg')}}"> 
                        <img src="{{asset('assets/img/players/4.jpeg')}}">
                        <img src="{{asset('assets/img/players/6.jpeg')}}">
                        <img src="{{asset('assets/img/players/7.jpeg')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-none col-lg-3 d-lg-block"></div>
                <div class="col-4 col-lg-2 text-light">
                    <i class="bi bi-person"></i>
                    {{$event->coach->name}}
                </div>
                <div class="col-4 col-lg-2 text-light">
                    <i class="bi bi-calendar3"></i>
                    {{date("M j, Y", strtotime($event->start))}}
                </div>
                <div class="col-4 col-lg-2 text-light">
                    <i class="bi bi-clock"></i>
                    {{date("h:i A", strtotime($event->start))}}
                </div>
                <div class="d-none col-lg-3 d-lg-block"></div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mx-5">{{$event->name}}</h2>
                    <p class="mx-5">
                        {{(strlen($event->description) > 255) ? substr($event->description, 0, 255).' ...' : $event->description}} 
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Event Join Section --}}
    <div class="event-join">
        <div class="row">
            <div class="col-12 d-flex justify-content-around align-items-center">
                <div class="event-join-text text-light">
                    <h4 class="fw-bold m-0">The competition starts soon</h4>
                    <p>Hurry up to not miss your chance</p>
                </div>
                <div class="event-join-timer text-light d-flex justify-content-around align-items-start">
                    <div class="days d-flex flex-column align-items-center">
                        <h1 id="day">00</h1>
                        <span>DAYS</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                    <div class="hours d-flex flex-column align-items-center">
                        <h1 id="hour">00</h1>
                        <span>HOURS</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                    <div class="minutes d-flex flex-column align-items-center">
                        <h1 id="minute">00</h1>
                        <span>MINUTES</span>
                    </div>
                </div>
                <div class="event-join-button">
                    @auth
                    @if(auth()->user()->user_type_id == 4)
                        @if(auth()->user()->player->events()->where('event_id', $event->id)->first())
                        <button class="btn btn-dark btn-sm" disabled>Already joined</button>
                        @else
                        <button class="btn btn-dark py-0 btn-sm d-flex align-items-center justify-content-between" wire:click="eventJoin">Join the competition <i class="bi fs-2 ps-2 bi-arrow-right-circle-fill"></i></button>
                        @endif
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>

    {{-- Event Detail Overview --}}
    <div class="event-detail-overview">
        <div class="container">
            <div class="row mx-2 g-md-5">
                <div class="col-md-6 justify-content-center text-center">
                    <img class="img-fluid w-100" src="{{asset('storage/images/event_cover/'.$event->cover_image)}}">
                    <h4 class="text-center fw-bold mt-3">Competition Overview</h4>
                </div>
                <div class="col-md-6 justify-content-center">
                    {{-- {{$event->description}} --}}
                    <div class="event-description">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Event Sponsors --}}
    <div class="sponsors">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>SPONSORING THIS <span class="text-primary">TOURNAMENT</span></h1>
                </div>
            </div>
            <div class="row sponsor-cards g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company1.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company2.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company3.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company4.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company5.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company6.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company7.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="sponsor-card">
                        <img src="{{ asset('assets/img/events/company8.svg') }}" class="sponsor-img" alt="sponsor">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Event Teams --}}
    <div class="teams">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>JOINING THIS <span class="text-primary">TOURNAMENT</span></h1>
                </div>
            </div>
            @if($event->teams && count($event->teams) > 0)
            <div class="row my-2 pb-2 upcoming-sport">
                <div class="col-6 d-flex justify-content-start">
                    <img class="leag-logo" src="{{asset('assets/img/aritae-icon.png')}}" widht="50" height="50" alt="Aritae League">
                    <div class="mx-2">
                        <h5 class="m-0 fs-5 text-primary fw-bold">Aritae League</h5>
                        <span>2022 - 2023</span>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h6 class="mb-2 fs-6 text-primary">Upcoming Match</h6>
                        <div>
                            <img class="mx-2" src="{{asset('assets/img/team-icon-2.png')}}" width="25">
                            VS
                            <img class="mx-2" src="{{asset('assets/img/team-icon-1.png')}}" width="25">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row team-header mt-5">
                <div class="col-1"><h6 class="fs-6 fw-bold text-secondary">POS</h6></div>
                <div class="col-6"><h6 class="fs-6 fw-bold text-secondary">TEAM</h6></div>
                <div class="col-1"><h6 class="fs-6 fw-bold text-secondary">PLAYED</h6></div>
                <div class="col-1"><h6 class="fs-6 fw-bold text-secondary">WON</h6></div>
                <div class="col-1"><h6 class="fs-6 fw-bold text-secondary">LOST</h6></div>
                <div class="col-2"><h6 class="fs-6 fw-bold text-dark">POINTS</h6></div>
            </div>
            @foreach($event->teams as $index => $team)
            <div class="row team-body my-2 py-3">
                <div class="col-1 d-flex align-items-center"><span>{{$index}}</span></div>
                <div class="col-6 d-flex justify-content-start align-items-center">
                    <img src="{{asset('storage/images/team/logo/'.$team->logo)}}" width="25" height="25">
                    <h6 class="fs-6 fw-bold mx-2 my-0">{{$team->name}}</h6>
                </div>
                <div class="col-1 d-flex align-items-center"><span>{{$team->pivot->played}}</span></div>
                <div class="col-1 d-flex align-items-center"><span>{{$team->pivot->won}}</span></div>
                <div class="col-1 d-flex align-items-center"><span>{{$team->pivot->lost}}</span></div>
                <div class="col-2 d-flex align-items-center"><span>{{$team->pivot->points}}</span></div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{$event->start}}").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        //var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("day").innerHTML = (days.toString().length == 1) ? '0'+days : days;
        document.getElementById("hour").innerHTML = (hours.toString().length == 1) ? '0'+hours : hours;
        document.getElementById("minute").innerHTML = (minutes.toString().length == 1) ? '0'+minutes : minutes;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("day").innerHTML = '00';
            document.getElementById("hour").innerHTML = '00';
            document.getElementById("minute").innerHTML = '00';
        }
    }, 1000);
    </script>
</div>
