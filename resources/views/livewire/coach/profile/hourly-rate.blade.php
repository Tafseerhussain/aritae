<div class="card p-3 hourly-rate">

    <div class="loader-bg" style="z-index: 10" wire:loading>
        <div class="loader-self">
            <span class="loader"></span>
        </div>
    </div>

    @if (session()->has('success_message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast d-block border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header text-white bg-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Hourly Rate</strong>
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
                <div class="col-12 mb-3">
                    <label for="hourlyRate" class="col-form-label">Hourly Rate</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input id="hourlyRate" type="number" min="0" class="form-control @error('hourlyRate') is-invalid @enderror" placeholder="0" wire:model.defer="hourlyRate">
                        <span class="input-group-text">USD / Hour</span>
                    </div>
                    @error('hourlyRate')
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