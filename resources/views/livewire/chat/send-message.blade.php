<div class="send-message-area">
    @if ($selectConversation)
    
    <div class="upload-progress">
        <div class="upload-progress-active"></div>
    </div>

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
        <div class="input-group standard-search w-100">
            <input type="text" class="form-control bg-white" placeholder="Type message..." wire:model="body">
            <button type="submit" class="input-group-text send-message"><i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </form>

    <form method="post">
        <input type="file" name="image" id="imageUpload" wire:model="image" hidden>
    </form>
    <form method="post">
        <input type="file" name="document" id="documentUpload" wire:model="document" hidden>
    </form>
    @endif

    <script>
        window.addEventListener('livewire-upload-start', event => {
            $('.upload-progress').css('display', 'block');
            $('#attachmentDropdown').prop('disabled', true);
        });
        window.addEventListener('livewire-upload-finish', event => {
            $('.upload-progress').css('display', 'none');
            $('#attachmentDropdown').prop('disabled', false);
        });
        window.addEventListener('livewire-upload-error', event => {
            $('.upload-progress').css('display', 'none');
            $('#attachmentDropdown').prop('disabled', false);
        });
        window.addEventListener('livewire-upload-progress', event => {
            $('.upload-progress').css('display', 'block');
            $('#attachmentDropdown').prop('disabled', true);
            $('.upload-progress-active').css('width', event.detail.progress+"%");
        });
    </script>
</div>
