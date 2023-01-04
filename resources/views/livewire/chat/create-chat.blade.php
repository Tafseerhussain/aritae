<div class="create-chat-page">
    
<div class="create-chat-table table-design mb-5 mt-4">

        <table class="table align-middle">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Sports</th>
                <th scope="col" class="text-center">Chat</th>
            </tr>
            </thead>
            <tbody>
            @if (count($users) == 0)
                <tr>
                    <td colspan="5" class="text-center">
                        No Users Added!
                    </td>
                </tr>
            @else
                @foreach ($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>
                            <span>{{ $user->name }} <br>
                            <small class="opacity-75">{{ $user->user->email }}</small></span>
                        </td>
                        <td>
                            @foreach ($user->user->sports as $sport)
                                <span class="badge text-bg-warning fw-400">{{ $sport->name }}</span>
                            @endforeach
                        </td>
                        <td class="text-center">
                            @php
                            $conversationStarted = App\Models\Chat\Conversation::where('receiver_id', Auth::user()->id)->where('sender_id', $user->user_id)
                                        ->orWhere('receiver_id', $user->user_id)->where('sender_id', Auth::user()->id)->first();
                            @endphp
                            @if(!$conversationStarted)
                            <a href="#" wire:click="openMessageModal({{ $user->user_id }})" class="btn btn-theme btn-sm">
                                Start Chat
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div wire:ignore.self class="modal fade" id="newMessageModal" tabindex="-1" aria-labelledby="newMessageModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="startChat">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send new message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new_message" class="mb-2">Message</label>
                            <textarea class="form-control" id="new_message" style="resize:none" placeholder="Type first message" wire:model="message"></textarea>
                            @error('new_message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <input type="text" wire:model="receiver_id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    window.addEventListener('openNewMessageModal', event => {
        $("#newMessageModal").modal('show');
    });
    window.addEventListener('hideNewMessageModal', event => {
        $("#newMessageModal").modal('hide');
    });
    </script>
</div>
