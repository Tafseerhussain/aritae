<div class="coach-sessions-page multi-option-page">
    <div class="team">
        <div class="row">
            {{-- PAGE HEADING --}}
            <div class="col-12">
                <div class="d-flex justify-content-between w-100 page-heading">
                    <h2 class="fs-2 text-black">Sessions</h2>
                    @if(auth()->user()->user_type_id == 2)
                        <a href="javascript:void(0)" class="btn btn-theme"> + Start New Session </a>
                    @endif
                </div>
            </div>

            {{-- PAGE CONTENT --}}
            <div class="col-12">
                <ul class="multi-option-pages-nav">
                    @auth
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'my_sessions') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('my_sessions')">{{__('My Sessions')}}</a></li>
                    @if(auth()->user()->user_type_id == 2)
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'upcoming_sessions') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('upcoming_sessions')">{{__('Upcoming Sessions')}}</a></li>
                    @endif
                    @if(auth()->user()->user_type_id == 2)
                    <li class="multi-option-pages-nav-item {{($activeComponent == 'create_session') ? 'active' : ''}}"><a href="javascript:void(0)" wire:click="changeComponent('create_session')">{{__('Create Your Sessions')}}</a></li>
                    @endif
                    @endauth
                </ul>

                @if($activeComponent == 'my_sessions')
                    @livewire('sessions.sessions')
                @elseif($activeComponent == 'upcoming_sessions')
                    @livewire('sessions.upcoming-sessions')
                @elseif($activeComponent == 'create_session')
                    @livewire('sessions.create-session')
                @elseif($activeComponent == 'schedule_session')
                    @livewire('sessions.schedule-session', ['session_data' => $session_data])
                @elseif($activeComponent == 'confirm_schedule')
                    @livewire('sessions.confirm-schedule', ['session_data' => $confirm_session_data])
                @elseif($activeComponent == 'confirm_join')
                    @livewire('sessions.confirm-join', ['session_id' => $session_id])
                @elseif($activeComponent == 'edit_session')
                    @livewire('sessions.edit-session', ['session_id' => $session_id])
                @elseif($activeComponent == 'edit_schedule')
                    @livewire('sessions.edit-schedule', ['session_id' => $session_id])
                @endif

            </div>
        </div>
    </div>
</div>
