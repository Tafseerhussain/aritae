<div class="schedule-session-page">
    <div class="row">
        <div class="col-xl-6">
            <div class="card w-100 h-100 my-2 p-3">
                <h4 class="fw-bold">{{__('Session Information')}}</h4>
                <div class="session-details">
                    <h6 class="fw-bold m-0">{{$session_data->name}}</h6>
                    <p class="mb-2">
                        <span class="text-secondary me-3"><i class="fas fa-basketball-ball"></i> {{$session_data->sport->name}}</span>
                        @if($session_data->video_session)
                        <span class="text-secondary me-3"><i class="bi bi-camera-video"></i> Video Session</span>
                        @else
                        <span class="text-secondary me-3"><i class="bi bi-geo-alt-fill"></i> On Site</span>
                        @endif
                    </p>
                    <p>{{$session_data->description}}</p>
                </div>
                <div class="session-athlete">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <h4 class="fw-bold me-2">{{__('Host')}}</h4>
                        <span class="badge rounded-pill bg-light text-secondary fw-normal">{{__('Session Organizer')}}</span>
                    </div>
                    <div class="p-3 d-flex justify-content-start align-items-center bg-light athlete-container">
                        <div class="athlete-image">
                            @if(auth()->user()->user_type_id == 4 && auth()->user()->player->profile_img)
                            <img src="{{asset(auth()->user()->player->profile_img)}}" alt="Athlete image">
                            @else
                            <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Athlete image">
                            @endif
                        </div>
                        <div class="ms-3 athlete-details">
                            <h6 class="fw-bold m-0 athlete-name">{{auth()->user()->full_name}}</h6>
                            <strong>Location: </strong><span class="text-secondary">{{auth()->user()->city . ', ' . auth()->user()->country}}</span><br>
                            @if(auth()->user()->user_type_id == 4)
                            <strong>Contact No: </strong><a href="tel:{{auth()->user()->player->phone}}">{{auth()->user()->player->phone}}</a>
                            @elseif(auth()->user()->user_type_id == 2)
                            <strong>Contact No: </strong><a href="tel:{{auth()->user()->coach->phone}}">{{auth()->user()->coach->phone}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @if(count($coaches) > 0)
                <div class="session-coach mt-3">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <h4 class="fw-bold me-2">{{__('Coach')}}</h4>
                    </div>
                    @foreach($coaches as $coach)
                    <div class="p-3 mb-2 d-flex justify-content-start align-items-center bg-light coach-container">
                        <div class="coach-image">
                            @if($coach->profile_img)
                            <img src="{{asset($coach->profile_img)}}" alt="Coach image">
                            @else
                            <img src="{{asset('assets/img/profile-1.jpg')}}" alt="Coach image">
                            @endif
                        </div>
                        <div class="ms-3 coach-details">
                            <h6 class="fw-bold m-0 coach-name">{{$coach->user->full_name}}</h6>
                            <strong>Location: </strong><span class="text-secondary">{{$coach->city . ', ' . $coach->country}}</span><br>
                            <strong>Contact No: </strong><a href="tel:{{$coach->phone}}">{{$coach->phone}}</a><br>
                            <a href="{{route('coach.profile.preview', ['id' => $coach->user->id])}}">{{__('View Profile')}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card w-100 h-100 my-4 my-xl-2 p-3">
                <h4 class="fw-bold">Select a Date & Time</h4>
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="calendar-timezone">
                        <div class="calendar-container" id="session-schedule-calendar">
                            <header class="calendar-header">
                                <p class="calendar-current-date"></p>
                                <div class="calendar-navigation">
                                    <span id="calendar-prev" class="bi bi-chevron-left"></span>
                                    <span id="calendar-next" class="bi bi-chevron-right"></span>
                                </div>
                            </header>
                    
                            <div class="calendar-body">
                                <ul class="calendar-weekdays">
                                    <li>SUN</li>
                                    <li>MON</li>
                                    <li>TUE</li>
                                    <li>WED</li>
                                    <li>THU</li>
                                    <li>FRI</li>
                                    <li>SAT</li>
                                </ul>
                                <ul class="calendar-dates"></ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <label for="timezone" class="col-form-label fw-bold">{{ __('Time zone') }}</label>
                                <select id="timezone" class="form-control @error('timezone') is-invalid @enderror" wire:model.defer="timezone">
                                    <option value="">Select Timezone</option>
                                    @foreach($timezones as $timezone)
                                    <option value="{{$timezone}}">{{$timezone}}</option>
                                    @endforeach
                                </select>

                                @error('timezone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="time-slot-container d-flex flex-column justify-content-start align-items-center position-relative">
                        <h5 class="fw-bold selected-date position-sticky top-0 w-100 text-center bg-white">{{date("l, M d", $date)}}</h5>
                        @foreach($time_slot as $index => $slot)
                        <div class="time-slot {{in_array($index, $selected_slot) ? 'active' : ''}}"  wire:click="selectSlot({{$index}})">{{$slot}}</div>
                        @endforeach

                        @error('selected_slot')
                            <span class="invalid-feedback d-block position-sticky bottom-0 bg-white" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-dark" wire:click="submitSchedule">{{__('Update Schedule')}}</button>
        </div>
    </div>
    
    <script>
    init_calendar();
    window.addEventListener('init-calendar', () => {
        init_calendar();
    });
    
    function init_calendar(){
        let date = new Date();
        let year = date.getFullYear();
        let month = date.getMonth();
        
        const day = document.querySelector(".calendar-dates");
        
        const currdate = document
            .querySelector(".calendar-current-date");
        
        const prenexIcons = document
            .querySelectorAll(".calendar-navigation span");
        
        // Array of month names
        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        
        // Function to generate the calendar
        const manipulate = () => {
            //Clear calendar dates
            day.textContent = "";

            // Get the first day of the month
            let dayone = new Date(year, month, 1).getDay();
        
            // Get the last date of the month
            let lastdate = new Date(year, month + 1, 0).getDate();
        
            // Get the day of the last date of the month
            let dayend = new Date(year, month, lastdate).getDay();
        
            // Get the last date of the previous month
            let monthlastdate = new Date(year, month, 0).getDate();
        
            // Loop to add the last dates of the previous month
            for (let i = dayone; i > 0; i--) {
                var li = document.createElement('li');
                li.classList.add('inactive');
                li.textContent = (monthlastdate - i) + 1
                day.append(li);
            }
        
            // Loop to add the dates of the current month
            for (let i = 1; i <= lastdate; i++) {
        
                // Check if the current date is today
                let isToday = i === date.getDate()
                    && month === new Date().getMonth()
                    && year === new Date().getFullYear()
                    ? "active"
                    : "";

                var li = document.createElement('li');
                if(isToday)
                    li.classList.add(isToday);
                li.dataset.date = year+'-'+(month+1)+'-'+i;
                li.textContent = i;
                li.onclick = function(event){
                    var date = event.target.dataset.date;
                    window.livewire.emit("selectDate", date);
                }
                day.append(li);
            }
        
            // Loop to add the first dates of the next month
            for (let i = dayend; i < 6; i++) {
                var li = document.createElement('li');
                li.classList.add('inactive');
                li.textContent = (i - dayend) + 1
                day.append(li);
            }
        
            // Update the text of the current date element
            // with the formatted current month and year
            currdate.innerText = `${months[month]} ${year}`;
        }
        
        manipulate();
        
        // Attach a click event listener to each icon
        prenexIcons.forEach(icon => {
        
            // When an icon is clicked
            icon.addEventListener("click", () => {
        
                // Check if the icon is "calendar-prev"
                // or "calendar-next"
                month = icon.id === "calendar-prev" ? month - 1 : month + 1;
        
                // Check if the month is out of range
                if (month < 0 || month > 11) {
        
                    // Set the date to the first day of the
                    // month with the new year
                    date = new Date(year, month, new Date().getDate());
        
                    // Set the year to the new year
                    year = date.getFullYear();
        
                    // Set the month to the new month
                    month = date.getMonth();
                }
        
                else {
        
                    // Set the date to the current date
                    date = new Date();
                }
        
                // Call the manipulate function to
                // update the calendar display
                manipulate();
            });
        });
    }
    </script>
</div>
