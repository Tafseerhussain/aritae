<div>
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
    <div class="container p-0">
        <div class="row event-join">
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
        <div class="row mx-2 my-4">
            <div class="col-md-6 justify-content-center text-center">
                <img class="img-fluid m-3 w-75" src="{{asset('storage/images/event_cover/'.$event->cover_image)}}">
            </div>
            <div class="col-md-6 justify-content-center">
                {{$event->description}}
            </div>
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
