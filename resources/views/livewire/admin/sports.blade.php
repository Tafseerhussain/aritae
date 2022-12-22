<div>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success float-end m-2" data-bs-toggle="modal" data-bs-target="#createSportModal">Create New Sport</button>
            <table class="table table-striped m-2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sports as $sport)
                    <tr>
                        <td>{{$sport->id}}</td>
                        <td>{{$sport->name}}</td>
                        <td>{{$sport->category}}</td>
                        <td>{{date("Y-m-d", strtotime($sport->created_at))}}</td>
                        <td>
                            <button class="btn btn-sm btn-secondary" wire:click="openEditSport({{$sport->id}})"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-danger" wire:click="deleteSport({{$sport->id}})"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="createSportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="createNewSport">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create new sport</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="new_sport_name">Name</label>
                            <input type="text" class="form-control" id="new_sport_name" placeholder="Enter name" wire:model="new_name">
                            @error('new_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_sport_category">Category</label>
                            <input type="text" class="form-control" id="new_sport_category" value="sport" wire:model="new_category">
                            @error('new_category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editSportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="saveSport">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit sport</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_sport_name">Name</label>
                            <input type="text" class="form-control" id="edit_sport_name" placeholder="Enter name" wire:model="edit_name">
                            @error('edit_name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_sport_category">Category</label>
                            <input type="text" class="form-control" id="edit_sport_category" value="sport" wire:model="edit_category">
                            @error('edit_category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <input type="text" wire:model="edit_id" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('hideCreateModal', event => {
            $("#createSportModal").modal('hide');
        })
        
        window.addEventListener('openEditModal', event => {
            $("#editSportModal").modal('show');
        })

        window.addEventListener('hideEditModal', event => {
            $("#editSportModal").modal('hide');
        })
    </script>
</div>
