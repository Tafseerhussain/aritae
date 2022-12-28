<div class="send-message-area">
    @if ($selectConversation)
    <form wire:submit.prevent="sendMessage" class="chatbox-footer d-flex align-items-center">
        <div class="dropdown">
            <a href="javascript:void(0)" class="me-2" id="attachmentDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-circle-plus"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="attachmentDropdown">
                <a class="dropdown-item" href="javascript:void(0)" onclick="$('#imageUpload').click()"><i class="bi bi-image"></i> Image</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="$('#documentUpload').click()"><i class="bi bi-file-earmark-plus"></i> Document</a>
            </div>
        </div>
        <input type="file" name="document" id="documentUpload" wire:change="documentUpload" wire:model="document" hidden>
        <div class="input-group standard-search w-100">
            <input type="text" class="form-control bg-white" placeholder="Type message..." wire:model="body">
            <button type="submit" class="input-group-text send-message"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </form>

    <form wire:submit.prevent="imageUpload" method="post">
        <input type="file" name="image" id="imageUpload" wire:model="image" hidden>
        <input type="submit" id="imageSubmit" hidden>
    </form>
    @endif
</div>
