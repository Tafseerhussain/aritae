<div>
    @if($activeComponent == 'events')
    <div class="row events-page">
        <div class="col-12">
            <div class="d-flex justify-content-between w-100 px-2">
                <h2 class="fs-2 text-black">All Events</h2>
                <a href="javascript:void(0)" class="btn btn-theme" wire:click="changeComponent('create_event')"> + Add Event </a>
            </div>
        </div>
    </div>
    @livewire('event.events')
    @elseif($activeComponent == 'create_event')
    <div class="row events-page">
        <div class="col-12">
            <div class="d-flex justify-content-between w-100 px-2">
                <h2 class="fs-2 text-black">Add New Event</h2>
            </div>
        </div>
    </div>
    @livewire('event.create-event')
    @endif
</div>
