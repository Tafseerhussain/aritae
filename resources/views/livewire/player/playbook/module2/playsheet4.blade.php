<div class="row modules-form">
    <div class="col-12">
        <div class="card p-md-4 p-3 position-relative">
            <div class="card-ribbon">
                <img src="{{ asset('assets/img/playbook/form-ribbon-module2.svg') }}" class="bg" alt="ribbon">
                <div class="ribbon-content text-center text-white">
                    <img src="{{ asset('assets/icons/focus.svg') }}" class="icon" alt="discovery">
                    <h6 class="text-uppercase font-oswald fw-light">Focus</h6>
                </div>
            </div>
            <div class="card-head text-center">
                <div class="head text-uppercase font-oswald text-primary">
                    <h5 class="fw-light">Playsheet #{{$playsheet}}</h5>
                    <h4>Developing Your Purpose Statement</h4>
                </div>
                <p>
                    Nicely done! By creating your final Purpose Statement and Vision Statement, you have taken a huge step forward in your path to a life filled with Love, Happiness, Significance, and Success.. Please review your statements and make any final edits, if necessary.
                </p>
            </div>
            <div class="card-body p-0">
                <form action="#" class="form">
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">Final Purpose Statement</label>
                        <textarea class="form-control" wire:model="purpose"></textarea>
                        @error('purpose')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">Final Vision Statement</label>
                        <textarea class="form-control" wire:model="vision"></textarea>
                        @error('vision')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="dots text-center">
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