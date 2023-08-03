<div>
    @if($active_component == 'players')
        @livewire('admin.playbook.players', ['coach_id'=>$coach_id])
    @elseif($active_component == 'playbook-view')
        @livewire('admin.playbook.playbook-view', ['playbook_id' => $playbook_id])
    @endif
</div>
