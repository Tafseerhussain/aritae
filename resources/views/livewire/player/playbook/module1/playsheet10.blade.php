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
                    <h4>GRATITUDE</h4>
                </div>
                <p>
                    Gratitude is one of the most important virtues that helps us live lives filled with Love, Happiness, Significance, and Success. Find a quiet place to think deeply about the wonderful things you have in your life (family, friends, school, sports, vacations, animals, etc.). Feel in your heart how important they are to you and how sad it would be if you did not have them.
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
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot active"></span>
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
