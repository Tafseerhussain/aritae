<div>
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Aritae Calendar</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <h5 id="calendar-title" class="calendar-title m-2"></h5>
                <button class="btn btn-sm btn-outline-secondary m-2 calendar-navigation" onclick="aritaeCalendarInit.prev()">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary m-2 calendar-navigation" onclick="aritaeCalendarInit.next()">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="calendar-type" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu bg-light" aria-labelledby="calendar-type">
                    <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="aritaeCalendarInit.changeView('timeGridWeek')">Week</a></li>
                    <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="aritaeCalendarInit.changeView('dayGridMonth')">Month</a></li>
                    <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="aritaeCalendarInit.changeView('timeGridDay')">Day</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="aritae-calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="eventDetailModal" tabindex="-1" aria-labelledby="eventDetailModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-body position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row">
                        <div class="col-4 event-detail-title">Session Name: </div>
                        <div class="col-8" id="eventName"></div>
                    </div>
                    <div class="row">
                        <div class="col-4 event-detail-title">Coach: </div>
                        <div class="col-8" id="eventCoach"></div>
                    </div>
                    <div class="row">
                        <div class="col-4 event-detail-title">Participants: </div>
                        <div class="col-8" id="eventPlayers">
                            <div class="event-player-head">
                                <img src="{{asset('assets/img/players/1.jpeg')}}">
                                <img src="{{asset('assets/img/players/2.jpeg')}}">
                                <img src="{{asset('assets/img/players/3.jpeg')}}"> 
                                <img src="{{asset('assets/img/players/4.jpeg')}}">
                            </div>
                        </div>
                    </div>            
                    <div class="row">
                        <div class="col-4 event-detail-title">Location: </div>
                        <div class="col-8" id="eventLocation"></div>
                    </div>
                    <div class="row">
                        <div class="col-4 event-detail-title">Time and Date: </div>
                        <div class="col-8" id="eventTime"></div>
                    </div>
                    <div class="row">
                        <div class="col-4 event-detail-title">Session Rate: </div>
                        <div class="col-8" id="eventPrice"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 event-detail-title">Description: </div>
                        <div class="col-12" id="eventDescription"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <form wire:submit.prevent="deleteEvent(Object.fromEntries(new FormData($event.target)))">
                                <input type="text" id="eventId" name="event_id" wire:model="eventId" hidden>
                                <button type="submit" class="btn btn-danger text-light" id="eventDelete">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

var aritaeCalendarInit;
document.addEventListener('livewire:load', function() {

    var aritaeCalendar = document.getElementById('aritae-calendar');

    // Initialize
    if(aritaeCalendar) {
        aritaeCalendarInit = new FullCalendar.Calendar(aritaeCalendar, {
            headerToolbar: false,
            initialView: 'timeGridWeek',
            timeZone: 'local',
            eventDisplay: 'block',
            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,
            weekNumberCalculation: 'ISO',
            eventConstraint: {
                start: new Date(),
                end: '2100-01-01',
            },
            editable: false,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: JSON.parse(@this.events),
            eventDisplay: 'auto',
            allDaySlot: false,
            /*eventDataTransform: function(event) {
                if (event.start < new Date()) {
                    event.editable = false;
                }
                return event;
            },
            eventDidMount: function(info) {
                $(info.el).tooltip({ 
                    title: "Name: "+info.event.title +"\nDescription: "+ info.event.extendedProps.description,
                    placement: "right",
                    trigger: "hover",
                    container: "body",
                });
            },*/
            eventClassNames: ['aritae-event', 'event-primary'],
            eventContent: function(info){
                console.log(info.event);
                return { html: `
                    <h5 class="fs-6 event-title text-dark">${info.event.title}</h5>
                    <h6 class="fs-6 coach-name text-dark">
                        <img class="coach-image" width="15" height="15" src="${info.event.extendedProps.coach_image}">
                        ${info.event.extendedProps.coach}
                        <span class="badge coach-badge">Coach</span>
                    </h6>
                    <span class="event-time"><i class="bi bi-clock"></i> ${info.timeText}</span>
                ` };
            },
            eventClick: function(prop){
                $('#eventId').val(prop.event.id);
                $('#eventName').text(prop.event.title);
                $('#eventCoach').html(`<a class="text-decoration-none" href="${prop.event.extendedProps.coach_url}">${prop.event.extendedProps.coach}</a>`);
                //$('#eventName').text(prop.event.title);
                $('#eventLocation').text(prop.event.extendedProps.city+", "+prop.event.extendedProps.state);
                $('#eventTime').text(prop.event.start.toLocaleString()+" - "+prop.event.end.toLocaleString());
                $('#eventPrice').text(prop.event.extendedProps.type == 'free' ? 'Free' : '$'+prop.event.extendedProps.price);
                $('#eventDescription').text(prop.event.extendedProps.description);
                $('#eventDetailModal').modal('show');
            },

            datesSet: function(data){
                document.getElementById('calendar-title').textContent = aritaeCalendarInit.currentData.viewTitle;
                
                if(aritaeCalendarInit.currentData.currentViewType == 'timeGridWeek')
                    document.getElementById('calendar-type').textContent = "Week";
                if(aritaeCalendarInit.currentData.currentViewType == 'dayGridMonth')
                    document.getElementById('calendar-type').textContent = "Month";
                if(aritaeCalendarInit.currentData.currentViewType == 'timeGridDay')
                    document.getElementById('calendar-type').textContent = "Day";
            }
        });

        // Init
        aritaeCalendarInit.render();


        //Change calendar title
        document.getElementById('calendar-title').textContent = aritaeCalendarInit.currentData.viewTitle;
    }
});

document.addEventListener('close_event_detail_modal', function(){
    $('#eventDetailModal').modal('hide');

    var aritaeCalendar = document.getElementById('aritae-calendar');

    // Initialize
    if(aritaeCalendar) {
        aritaeCalendarInit = new FullCalendar.Calendar(aritaeCalendar, {
            headerToolbar: false,
            initialView: 'timeGridWeek',
            timeZone: 'local',
            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,
            weekNumberCalculation: 'ISO',
            eventConstraint: {
                start: new Date(),
                end: '2100-01-01',
            },
            editable: false,
            selectable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: JSON.parse(@this.events),
            eventDisplay: 'auto',
            allDaySlot: false,
            /*eventDataTransform: function(event) {
                if (event.start < new Date()) {
                    event.editable = false;
                }
                return event;
            },
            eventDidMount: function(info) {
                $(info.el).tooltip({ 
                    title: "Name: "+info.event.title +"\nDescription: "+ info.event.extendedProps.description,
                    placement: "right",
                    trigger: "hover",
                    container: "body",
                });
            },*/
            eventClassNames: ['aritae-event', 'event-primary'],
            eventContent: function(info){
                console.log(info.event);
                return { html: `
                    <h5 class="fs-6 event-title text-dark">${info.event.title}</h5>
                    <h6 class="fs-6 coach-name text-dark">
                        <img class="coach-image" width="15" height="15" src="${info.event.extendedProps.coach_image}">
                        ${info.event.extendedProps.coach}
                        <span class="badge coach-badge">Coach</span>
                    </h6>
                    <span class="event-time"><i class="bi bi-clock"></i> ${info.timeText}</span>
                ` };
            },
            eventClick: function(prop){
                $('#eventId').val(prop.event.id);
                $('#eventName').text(prop.event.title);
                $('#eventCoach').html(`<a class="text-decoration-none" href="${prop.event.extendedProps.coach_url}">${prop.event.extendedProps.coach}</a>`);
                //$('#eventName').text(prop.event.title);
                $('#eventLocation').text(prop.event.extendedProps.city+", "+prop.event.extendedProps.state);
                $('#eventTime').text(prop.event.start.toISOString().slice(0, 19).replace('T', ' ')+" - "+prop.event.end.toISOString().slice(0, 19).replace('T', ' '));
                $('#eventPrice').text(prop.event.extendedProps.type == 'free' ? 'Free' : '$'+prop.event.extendedProps.price);
                $('#eventDescription').text(prop.event.extendedProps.description);
                $('#eventDetailModal').modal('show');
            },

            datesSet: function(data){
                document.getElementById('calendar-title').textContent = aritaeCalendarInit.currentData.viewTitle;
                
                if(aritaeCalendarInit.currentData.currentViewType == 'timeGridWeek')
                    document.getElementById('calendar-type').textContent = "Week";
                if(aritaeCalendarInit.currentData.currentViewType == 'dayGridMonth')
                    document.getElementById('calendar-type').textContent = "Month";
                if(aritaeCalendarInit.currentData.currentViewType == 'timeGridDay')
                    document.getElementById('calendar-type').textContent = "Day";
            }
        });

        // Init
        aritaeCalendarInit.render();


        //Change calendar title
        document.getElementById('calendar-title').textContent = aritaeCalendarInit.currentData.viewTitle;
    }
});
</script>
</div>
