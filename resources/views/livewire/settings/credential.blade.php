<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="saveCredential">
                <div class="row">
                    <div class="col-12">
                        <h4 class="fw-semibold m-0">Change Username / Password</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 mb-3">
                        <label for="email" class="col-form-label fw-bold">{{ __('Username/Email') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" autofocus wire:model="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label for="old-password" class="col-form-label fw-bold">{{ __('Current Password') }}</label>
                        <input id="old-password" type="password" class="form-control @error('currentPassword') is-invalid @enderror" autofocus wire:model="currentPassword">
                        @error('currentPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="new-password" class="col-form-label fw-bold">{{ __('New Password') }}</label>
                        <input id="new-password" type="password" class="form-control @error('newPassword') is-invalid @enderror" autofocus wire:model="newPassword">
                        @error('newPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="confirm-password" class="col-form-label fw-bold">{{ __('Confirm Password') }}</label>
                        <input id="confirm-password" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" autofocus wire:model="confirmPassword">
                        @error('confirmPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-start align-items-center">
                        <button class="btn btn-theme me-4">Save</button>
                        <button type="button" class="btn btn-dark me-4 text-light" wire:click="cancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
