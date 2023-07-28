<div class="row modules-form">
    <div class="col-12">
        <div class="card p-md-4 p-3 position-relative">
            <div class="card-ribbon">
                <img src="{{ asset('assets/img/playbook/form-ribbon-module4.svg') }}" class="bg" alt="ribbon">
                <div class="ribbon-content text-center text-white">
                    <img src="{{ asset('assets/icons/strategy.svg') }}" class="icon" alt="discovery">
                    <h6 class="text-uppercase font-oswald fw-light">Strategy</h6>
                </div>
            </div>
            <div class="card-head text-center">
                <div class="head text-uppercase font-oswald text-primary">
                    <h5 class="fw-light">Playsheet #{{$playsheet}}</h5>
                    <h4>Assessment</h4>
                </div>
                <p>
                    Now it's time to reflect on the exercises you went through in Module 4. Answer the questions below to assess your progress in the program.
                </p>
            </div>
            <div class="card-body p-0">
                <form action="#" class="form">
                    <div class="row">
                        <div class="col-6 col-lg-9"></div>
                        <div class="col-6 col-lg-3">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Today's Date</label>
                                <input type="date" class="form-control" wire:model="date">
                                @error('date')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">What was my objective for this step?</label>
                        <input type="text" class="form-control" wire:model="objective">
                        @error('objective')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">Did I meet my objective? If so, in what way(s)?</label>
                        <input type="text" class="form-control" wire:model="requirement"></textarea>
                        @error('requirement')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">What is something I learned during this step?</label>
                        <input type="text" class="form-control" wire:model="learning"></textarea>
                        @error('learning')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-1">What is something I am still unclear about and need to work on in the next Module?</label>
                        <input type="text" class="form-control" wire:model="work_need"></textarea>
                        @error('work_need')
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
                        <span class="dot complete"></span>
                        <span class="dot complete"></span>
                        <span class="dot active"></span>
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
