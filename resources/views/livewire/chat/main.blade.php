<div class="class-chat-main">
    
    <div class="chat-container">
        <div class="chat-list-container">
            @livewire('chat.chat-list')
        </div>
        <div class="chat-box-container">
            @livewire('chat.chatbox')
            @livewire('chat.send-message')
        </div>
    </div>

</div>

@push('custom-scripts')
    
    <script>
        window.addEventListener('chatUserSelected', event=> {
            $('.chatbox-body').scrollTop($('.chatbox-body')[0].scrollHeight);
            let height = $('.chatbox-body')[0].scrollHeight;
            window.livewire.emit('updateHeight', {
                height: height,
            });
        });
        $('.chatbox-body').scroll(function() {
            var top = $('.chatbox-body').scrollTop();
            if (top <= 0) {
                window.livewire.emit('loadMore');
            }
        });
        window.addEventListener('updatedHeight', event=> {
            let old = event.detail.height;
            let newHeight = $('.chatbox-body')[0].scrollHeight;
            let height = $('.chatbox-body').scrollTop(newHeight - old);
            window.livewire.emit('updateHeight', {
                height: height,
            });
        });
        // document.addEventListener("DOMContentLoaded", function () {
        //     window.Echo.private('chat')
        //     .listen('broadcastMessageReceived', (response) => { 
        //         window.Livewire.emit('broadcastMessageReceived', response);
        //     }
        // });
    </script>

@endpush
