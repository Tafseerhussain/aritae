<div>
    <div class="container events-page">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center w-100 px-2">
                    <h2 class="fs-2 text-black">{{$event['name']}}</h2>
                    <a href="javascript:void(0)" class="btn btn-light btn-dark" wire:click="closeEvent"> Back </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="event-cover">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10 event-join d-flex justify-content-around align-items-center">
                            <div class="event-join-text text-light">
                                <h4 class="fw-bold m-0">The event starts soon</h4>
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
                                <button class="btn btn-dark py-0 btn-sm d-flex align-items-center justify-content-between">Join the competition <i class="bi fs-2 ps-2 bi-arrow-right-circle-fill"></i></button>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
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
                        <div class="col-12 d-flex justify-content-center flex-wrap">
                            <a class="text-light mx-3 coach-link" href="{{route('coach.profile.preview', ['id' => $event['coach']['id']])}}">
                                <i class="bi bi-person"></i> {{$event['coach']['name']}}
                            </a>
                            <div class="text-light mx-3">
                                <i class="bi bi-calendar3"></i> {{date("M d, Y", strtotime($event['start'])).' - '.date("M d, Y", strtotime($event['end']))}}
                            </div>
                            <div class="text-light mx-3">
                                <i class="bi bi-clock"></i> {{date("h:i A", strtotime($event['start']))}}
                            </div>
                            <div class="text-light mx-3">
                                <i class="bi bi-geo-alt-fill"></i> {{$event['city'].', '.$event['state']}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 my-3">
                {{$event['description']}}
            </div>
            <div class="col-lg-4 my-3">
                <div class="event-fee-card">
                    <h5 class="title">Event Fee</h5>
                    <h2 class="price">{{($event['type'] == 'paid') ? '$'.$event['price'] : 'Free'}}</h2>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                    <a class="btn btn-light btn-block join-button">Join the event <i class="bi bi-arrow-right"></i><a>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{$event['start']}}").getTime();

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
