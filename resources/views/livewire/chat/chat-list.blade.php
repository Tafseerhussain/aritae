<div class="chat-list">
    
    <div class="chatlist-header">
        <div class="input-group standard-search w-100">
            <input type="text" class="form-control" placeholder="Search Users...">
            <span class="input-group-text"><img src="{{ asset('assets/img/search.svg') }}" alt=""></span>
        </div>
    </div>

    <div class="chatlist-body">

        @if (count($conversations) != 0) 
            
            @foreach ($conversations as $conversation)
                <a href="#!" wire:key='{{ $conversation->id }}' class="list-item d-flex text-dark" wire:click="$emit('chatUserSelected', {{ $conversation }}, {{ $this->getChatUserInstance($conversation)->id }})">
                    <div class="profile_img shadow position-relative">
                        @if (Auth::user()->user_type_id == 4)
                            @if ($this->getChatUserInstance($conversation)->coach->profile_img == '')
                                <img src="{{ asset( 'assets/img/default/default-profile-pic.jpg' ) }}" class="w-100 h-100" alt="profile image">
                            @else
                                <img src="{{ asset( $this->getChatUserInstance($conversation)->coach->profile_img ) }}" class="w-100 h-100" alt="profile image">
                            @endif
                        @elseif (Auth::user()->user_type_id == 2)
                            @if ($this->getChatUserInstance($conversation)->player->profile_img == '')
                                <img src="{{ asset( 'assets/img/default/default-profile-pic.jpg' ) }}" class="w-100 h-100" alt="profile image">
                            @else
                                <img src="{{ asset( $this->getChatUserInstance($conversation)->player->profile_img ) }}" class="w-100 h-100" alt="profile image">
                            @endif
                        @endif
                        
                        <div class="status online shadow"></div>
                    </div>
                    <div class="profile-meta">
                        <div class="name text-capitalize">
                            {{ $this->getChatUserInstance($conversation)->full_name }}
                        </div>
                        <div class="chat text-truncate">
                            {{ $conversation->messages->last()->body }}
                        </div>
                    </div>
                    <span class="position-absolute last-chat">
                        {{ $conversation->messages->last()->created_at->shortAbsoluteDiffForHumans() }} ago
                    </span>
                    @if (count($conversation->messages->where('read', 0)->where('receiver_id', Auth::user()->id)))
                        <span class="position-absolute new-messages">
                            <span class="badge rounded-pill text-bg-primary text-white">
                                {{ count($conversation->messages->where('read', 0)->where('receiver_id', Auth::user()->id)) }}
                            </span>
                        </span>
                    @endif
                </a>
            @endforeach
        
        @else
            <a href="#" class="list-item d-flex text-dark">
                Select a user to start chat with...
            </a>
        @endif

    </div>

</div>
