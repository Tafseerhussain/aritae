<div>
    @if($active_component == 'players')
        @livewire('coach.playbook.players')
    @elseif($active_component == 'playbook-view')
        @livewire('coach.playbook.playbook-view', ['playbook_id' => $playbook_id])
    @endif
</div>
