<div>
    @if($active_component == 'coaches')
        @livewire('admin.coach-approval.coaches')
    @elseif($active_component == 'details')
        @livewire('admin.coach-approval.details', ['coach_id' => $coach_id])
    @endif
</div>
