<div class="row modules-form">
    <div class="col-12">
        <div class="card p-md-4 p-3 position-relative">
            <div class="card-ribbon">
                <img src="{{ asset('assets/img/playbook/form-ribbon-module5.svg') }}" class="bg" alt="ribbon">
                <div class="ribbon-content text-center text-white">
                    <img src="{{ asset('assets/icons/personal-plan.svg') }}" class="icon" alt="discovery">
                    <h6 class="text-uppercase font-oswald fw-light">Personal Plan</h6>
                </div>
            </div>
            <div class="card-head text-center">
                <div class="head text-uppercase font-oswald text-primary">
                    <h5 class="fw-light">Playsheet #{{$playsheet}}</h5>
                    <h4>Microplan - 12</h4>
                </div>
                <p></p>
            </div>
            <div class="card-body p-0">
                <form action="#" class="form">
                    <div class="row">
                        <div class="col-lg-9 col-6">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Area of life</label>
                                <input type="text" class="form-control" wire:model="area">
                                @error('area')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Completion date</label>
                                <input type="date" class="form-control" wire:model="date">
                                @error('date')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Action #1</label>
                                <input type="text" class="form-control" wire:model="action1">
                                @error('action1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Action #2</label>
                                <input type="text" class="form-control" wire:model="action2">
                                @error('action2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Action #3</label>
                                <input type="text" class="form-control" wire:model="action3">
                                @error('action3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Obstacle #1</label>
                                <input type="text" class="form-control" wire:model="obstacle1">
                                @error('obstacle1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Obstacle #2</label>
                                <input type="text" class="form-control" wire:model="obstacle2">
                                @error('obstacle2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Obstacle #3</label>
                                <input type="text" class="form-control" wire:model="obstacle3">
                                @error('obstacle3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Solution #1</label>
                                <input type="text" class="form-control" wire:model="solution1">
                                @error('solution1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Solution #2</label>
                                <input type="text" class="form-control" wire:model="solution2">
                                @error('solution2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Solution #3</label>
                                <input type="text" class="form-control" wire:model="solution3">
                                @error('solution3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Goal</label>
                                <input type="text" class="form-control" wire:model="goal">
                                @error('goal')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Reward (feeling)</label>
                                <input type="text" class="form-control" wire:model="reward">
                                @error('reward')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="dots text-center">
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot active"></span>
                    </div>
                    <div class="form-group d-flex justify-content-end align-items-center">
                        <button type="button" class="btn btn-light border" wire:click="previous">
                            Previous
                        </button>
                        <button type="button" class="btn icon-right-full btn-dark border-0 fw-bold" wire:click="confirm" style="transform: scale(1.2); margin: 30px;">
                            <span>Confirm and Submit</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="submitPlaybookModal" tabindex="-1" aria-labelledby="submitPlaybookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="save">
                    <div class="modal-header">
                        <h5 class="modal-title" id="submitPlaybookModalLabel">Submit Playbook</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to submit the playbook?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-theme text-white">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openSubmitModal', event => {
            $("#submitPlaybookModal").modal('show');
        })

        window.addEventListener('hideSubmitModal', event => {
            $("#submitPlaybookModal").modal('hide');
        })
    </script>
</div>
