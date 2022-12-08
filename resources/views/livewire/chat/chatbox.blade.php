<div class="chat-box">
    
    @if ($selectConversation)
    <div class="chatbox-header">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="status offline"></div>
                <h5 class="m-0 fw-bold text-capitalize">
                    {{ $receiverInstance->full_name }}
                </h5>
            </div>
            <div class="buttons">
                <a href="#" class="btn btn-theme btn-sm">
                    Schedule Session
                </a>
                <a href="#" class="icon">
                    <i class="fa-solid fa-phone"></i>
                </a>
                <a href="#" class="icon">
                    <i class="fa-solid fa-video"></i>
                </a>
                <a href="#" class="icon">
                    <i class="fa-solid fa-image"></i>
                </a>
            </div>
        </div>
    </div>
    @else

        <div class="chatbox-header">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    {{-- <div class="status online"></div> --}}
                    <h5 class="m-0 fw-bold">
                        <i class="bi bi-exclamation-circle-fill me-1"></i> Select a user
                    </h5>
                </div>
                <div class="buttons">
                    <a href="#" class="btn btn-theme btn-sm">
                        Schedule Session
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-solid fa-phone"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-solid fa-video"></i>
                    </a>
                    <a href="#" class="icon">
                        <i class="fa-solid fa-image"></i>
                    </a>
                </div>
            </div>
        </div>

    @endif

    <div class="chatbox-body"> 
        @if ($selectConversation)

            @foreach ($messages as $message)

                <p wire:key="{{ $message->id }}" class="message {{ auth()->id() == $message->sender_id ? 'right-message':'left-message' }}">
                    {{ $message->body }}
                    <span class="sent {{ $message->read == 0 ? '':'read' }}">
                        @if ($message->read == 0)
                            <i class="bi bi-check2"></i>
                        @elseif ($message->read == 1)
                            <i class="bi bi-check2-all"></i>
                        @endif
                        
                    </span>
                    <span class="time">{{ $message->created_at->shortAbsoluteDiffForHumans() }} ago</span>
                </p>
            @endforeach
            
            {{-- <script>
                $('.chatbox-body').scroll(function() {
                    var top = $('.chatbox-body').scrollTop();
                    if (top <= 0) {
                        window.livewire.emit('loadMore');
                    }
                });
                
            </script>   --}} 
        @else
            <div class="no-conversation">
                <img src="{{ asset('assets/icons/no-chat.svg') }}" alt="no conversation">
            </div>
        @endif
    </div>
</div>
