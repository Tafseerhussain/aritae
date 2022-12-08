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
                        @if ($this->getChatUserInstance($conversation)->player->profile_img == '')
                            <img src="{{ asset( 'assets/img/default/default-profile-pic.jpg' ) }}" class="w-100 h-100" alt="profile image">
                        @else
                        <img src="{{ asset( $this->getChatUserInstance($conversation)->player->profile_img ) }}" class="w-100 h-100" alt="profile image">
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
                    <span class="position-absolute new-messages">
                        <span class="badge rounded-pill text-bg-primary text-white">2</span>
                    </span>
                </a>
            @endforeach
        
        @else
            <a href="#" class="list-item d-flex text-dark">
                Select a player to start chat with...
            </a>
        @endif

    </div>

</div>
