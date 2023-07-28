<div class="row modules-form">
    <div class="col-12">
        <div class="card p-md-4 p-3 position-relative">
            <div class="card-ribbon">
                <img src="{{ asset('assets/img/playbook/form-ribbon.svg') }}" class="bg" alt="ribbon">
                <div class="ribbon-content text-center text-white">
                    <img src="{{ asset('assets/icons/discovery.svg') }}" class="icon" alt="discovery">
                    <h6 class="text-uppercase font-oswald fw-light">discovery</h6>
                </div>
            </div>
            <div class="card-head text-center">
                <div class="head text-uppercase font-oswald text-primary">
                    <h5 class="fw-light">Playsheet #{{$playsheet}}</h5>
                    <h4>PRIORITIES</h4>
                </div>
                <p>
                    Recognizing your priorities and understanding how to arrange them in your daily life is a powerful skill. Review the interests, activities, and responsibilities you listed above in the various areas of your life and rank them in order of importance.
                </p>
            </div>
            <div class="card-body p-0">
                <form action="#" class="form">
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">Home</label>
                        <input type="text" class="form-control" wire:model="home">
                        @error('home')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">School</label>
                        <input type="text" class="form-control" wire:model="school">
                        @error('school')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">Arts, music, athletics, etc.</label>
                        <input type="text" class="form-control" wire:model="activity">
                        @error('activity')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">Other (work, social settings, etc.)</label>
                        <input type="text" class="form-control" wire:model="other">
                        @error('other')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="dots text-center">
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                    <div class="form-group text-end">
                        <button type="button" class="btn btn-light border" wire:click="previous">
                            Previous
                        </button>
                        <button type="button" class="btn icon-right-full btn-dark border-0" wire:click="save">
                            <span>Save & Next</span>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
