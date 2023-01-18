<div>
    @if($activeComponent == 'events')
        @livewire('event.events')
    @elseif($activeComponent == 'create_event')
        @livewire('event.create-event')
    @elseif($activeComponent == 'event_detail')
        @livewire('event.event-detail', ['event' => $event])
    @endif
</div>
