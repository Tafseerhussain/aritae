<div class="card p-3 profile-info">

    @if (session()->has('success_message'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast d-block border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header text-white bg-success">
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong class="me-auto">Personal Info</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" wire:click="hideMessage"></button>
          </div>
          <div class="toast-body">
            {{ session('success_message') }}
          </div>
        </div>
    </div>
    @endif

    <div class="card-head">
        <div class="cover-image">
            <div class="changeImage">
                <i class="fa-solid fa-pencil"></i>
            </div>
            <img src="{{ asset('/assets/img/default/default-cover.jpg') }}" alt="cover image" class="w-100">
        </div>
        <div class="d-flex profile-meta-bar justify-content-between">
            <div class="profile-image">
                <div class="changeImage">
                    <i class="fa-solid fa-pencil"></i>
                </div>
                <img src="{{ asset('assets/img/players/1.jpg') }}" class="rounded-circle w-100 shadow" alt="">
            </div>
            <div class="profile-completion text-end">
                    <small>Your Profile is 25% complete</small>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
            </div>  
        </div>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="submit">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="firstName" class="col-form-label">First Name</label>
                    <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" value="{{ Auth::user()->first_name }}" wire:model="firstName">
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="lastName" class="col-form-label">Last Name</label>
                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ Auth::user()->last_name }}" wire:model="lastName">
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="dateOfBirth" class="col-form-label">Date Of Birth</label>
                    <input id="dateOfBirth" type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" placeholder="09 Sep, 1994" wire:model="dateOfBirth">
                    @error('dateOfBirth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="phoneNumber" class="col-form-label">Phone Number</label>
                    <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="+23 234 234" wire:model="phoneNumber">
                    @error('phoneNumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="address" class="col-form-label">Home Address</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Start typing your address..." wire:model="address">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="city" class="col-form-label">City</label>
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City Name" wire:model="city">
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="zip" class="col-form-label">Zip</label>
                    <input id="zip" type="text" class="form-control @error('zipCode') is-invalid @enderror" placeholder="Zip Code" wire:model="zipCode">
                    @error('zipCode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="country" class="col-form-label">Country</label>
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" placeholder="Country Name" wire:model="country">
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <label for="about" class="col-form-label">About Me</label>
                    <textarea rows="3" class="form-control @error('aboutMe') is-invalid @enderror" placeholder="Start typing about yourself here..." wire:model="about"></textarea>
                    @error('aboutMe')
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