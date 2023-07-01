<div>
    @if($activeComponent == 'sessions')
        @livewire('sessions.sessions')
    {{-- @elseif($activeComponent == 'create_event')
        @livewire('event.create-event')
    @elseif($activeComponent == 'event_detail')
        @livewire('event.event-detail', ['event' => $event]) --}}
    @endif
</div>
