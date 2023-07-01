<div class="coach-teams-page multi-option-page">
    <div class="team">
        <div class="row">
            {{-- PAGE HEADING --}}
            <div class="col-12">
                <div class="d-flex justify-content-between w-100 page-heading">
                    <h2 class="fs-2 text-black">Teams</h2>
                </div>
            </div>

            {{-- PAGE CONTENT --}}
            <div class="col-12">
                <ul class="multi-option-pages-nav">
                    @auth
                    @if(auth()->user()->user_type_id == 2 || auth()->user()->user_type_id == 4)
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'my_teams') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('my_teams')">{{__('My Team')}}</a></li>
                    @endif
                    @if(auth()->user()->user_type_id == 2)
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'create_team') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('create_team')">{{__('Create Team')}}</a></li>
                    @endif
                    @if(auth()->user()->user_type_id == 1 || auth()->user()->user_type_id == 2 || auth()->user()->user_type_id == 4)
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'global_teams') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('global_teams')">{{__('Global Teams')}}</a></li>
                    @endif
                    @if(auth()->user()->user_type_id == 1 || auth()->user()->user_type_id == 2)
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'pending_teams') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('pending_teams')">{{__('Pending Teams')}}</a></li>
                    @endif
                    @endauth
                </ul>

                @if($activeComponent == 'create_team')
                    @livewire('team.create')
                @elseif($activeComponent == 'my_teams')
                    @livewire('team.my-teams')
                @elseif($activeComponent == 'pending_teams')
                    @livewire('team.pending-teams')
                @elseif($activeComponent == 'global_teams')
                    @livewire('team.global-teams')
                @elseif($activeComponent == 'global_team_detail')
                    @livewire('team.global-teams-single', ['team' => $team]);
                @endif
            </div>
        </div>
    </div>
</div>
