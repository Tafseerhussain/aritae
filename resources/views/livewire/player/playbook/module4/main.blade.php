<div>
    <div class="row form-completion-progress align-items-end">
        <div class="col-md-6">
            <h5 class="text-primary font-oswald text-uppercase m-0">Module # 4</h5>
        </div>
        <div class="col-md-6">
            <div class="form-completion">
                <small>Your <b>Form</b> is {{$completeness}}% Completed.</small>
                <div class="progress mt-1">
                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: {{$completeness}}%;" aria-valuenow="{{$completeness}}" aria-valuemin="0" aria-valuemax="100">{{$completeness}}%</div>
                </div>
            </div>
        </div>
    </div>
    @if($playsheet == 1)
        @livewire('player.playbook.module4.playsheet1', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 2)
        @livewire('player.playbook.module4.playsheet2', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 3)
        @livewire('player.playbook.module4.playsheet3', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 4)
        @livewire('player.playbook.module4.playsheet4', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 5)
        @livewire('player.playbook.module4.playsheet5', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 6)
        @livewire('player.playbook.module4.playsheet6', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 7)
        @livewire('player.playbook.module4.playsheet7', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 8)
        @livewire('player.playbook.module4.playsheet8', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 9)
        @livewire('player.playbook.module4.playsheet9', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 10)
        @livewire('player.playbook.module4.playsheet10', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 11)
        @livewire('player.playbook.module4.playsheet11', ['playbook_id' => $playbook_id])
    @elseif($playsheet == 12)
        @livewire('player.playbook.module4.playsheet12', ['playbook_id' => $playbook_id])

    @endif
</div>
