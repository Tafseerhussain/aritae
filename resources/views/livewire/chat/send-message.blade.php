<div class="send-message-area">
    @if ($selectConversation)
        <form wire:submit.prevent="sendMessage" class="chatbox-footer d-flex align-items-center">
            <a href="#" class="me-2">
                <i class="fa-solid fa-circle-plus"></i>
            </a>
            <div class="input-group standard-search w-100">
                <input type="text" class="form-control bg-white" placeholder="Type message..." wire:model="body">
                <button type="submit" class="input-group-text send-message"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </form>
    @endif
</div>
