<div class="create-chat-page">
    
    <div class="create-chat-table table-design mb-5 mt-4">

            <table class="table align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Player</th>
                  <th scope="col">Sports</th>
                  <th scope="col" class="text-center">Chat</th>
                </tr>
              </thead>
              <tbody>
                @if (count($players) == 0)
                    <tr>
                        <td colspan="5" class="text-center">
                            No Players Added!
                        </td>
                    </tr>
                @else
                    @foreach ($players as $key => $player)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>
                                <span>{{ $player->name }} <br>
                                <small class="opacity-75">{{ $player->user->email }}</small></span>
                            </td>
                            <td>
                                @foreach ($player->user->sports as $sport)
                                    <span class="badge text-bg-warning fw-400">{{ $sport->name }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="#" wire:click="startChat({{ $player->user_id }})" class="btn btn-theme btn-sm">
                                    Start Chat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>

            
        </div>

</div>
