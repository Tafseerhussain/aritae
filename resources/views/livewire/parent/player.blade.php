<div>
    <div class="d-flex justify-content-end align-items-center">
        <button class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#addPlayerModal">Add Player</button>
    </div>
    <table class="table table-stripped m-1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Area of focus</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
            <tr>
                <td>{{$player->name}}</td>
                <td>{{$player->user->email}}</td>
                <td>{{$player->gender}}</td>
                <td>{{$player->user->area_of_focus}}</td>
                <td>
                    <button class="btn btn-danger text-white btn-sm" wire:click="removePlayer({{$player->id}})"><i class="bi bi-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="addPlayerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPlayerModalLabel">Add Player</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="player_search_name" class="form-control" wire:model="player_search_name" wire:keyup="updateSuggestion" placeholder="Type player name or email">

                    @foreach($player_search_suggestion as $suggestion)
                    <div class="m-1 p-1" style="border: 1px solid #eee; background-color: #fafafa; cursor: pointer;" wire:click="attachPlayer('{{$suggestion->email}}')">
                        {{$suggestion->full_name}} <small>({{$suggestion->email}})</small>    
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('hideAddPlayerModal', function(){
            $('#addPlayerModal').modal('hide');
        });
    </script>
</div>
