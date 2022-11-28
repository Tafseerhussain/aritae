<div class="card p-3 athletic-info">

    <div class="loader-bg" wire:loading>
        <div class="loader-self">
            <span class="loader"></span>
        </div>
    </div>
    
    @if (session()->has('success_message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast d-block border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header text-white bg-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Athletic Info</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div class="card-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="height" class="col-form-label">Height (Ft - In)</label>
                    <div class="row">
                        <div class="col-6">
                            <input id="foot" type="text" class="form-control @error('foot') is-invalid @enderror" placeholder="ft" wire:model.defer="foot">
                            @error('foot')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input id="inches" type="text" class="form-control @error('inches') is-invalid @enderror" placeholder="In" wire:model.defer="inches">
                            @error('inches')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="weight" class="col-form-label">Weight (lb)</label>
                    <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" placeholder="lb" wire:model.defer="weight">
                    @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-theme">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>