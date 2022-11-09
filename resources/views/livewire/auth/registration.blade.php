<div class="register-page">
    
        @if ($step == 1)
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" wire:loading>
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            {{-- STEP 1 START --}}
            <div class="get-started">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head text-center">
                                <h2>
                                    Get Started For Free
                                </h2>
                                <p class="my-4">
                                    Aritae gives you access to high quality coaches and players. Get started now!
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="register-type" wire:click="changeStep(2)">
                                            <img src="{{ asset('assets/icons/player.svg') }}" alt="player">
                                            <h2>
                                                Join as a Player
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="register-type">
                                            <img src="{{ asset('assets/icons/coach.svg') }}" alt="player">
                                            <h2>
                                                Join as a Coach
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="register-type">
                                            <img src="{{ asset('assets/icons/parent.svg') }}" alt="player">
                                            <h2>
                                                Join as a Parent
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- STEP 1 END --}}

        </div>
        @endif

        @if ($step == 2)
        {{-- STEP 2 --}}
        <div class="row justify-content-center registration-form">
            
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-4">
                            <a href="#" wire:click="changeStep(1)" class="btn btn-theme">
                                <i class="fa-solid fa-arrow-left"></i>
                                <span> Back</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-4">
                            <div class="card">
                                
                                <div class="card-head text-center">
                                    <h2>
                                        Player Registration
                                    </h2>
                                    <p class="my-4">
                                        It only takes two minutes to set up your Aritae account. Get started below!
                                    </p>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label">{{ __('First Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Mike" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label">{{ __('Last Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Clery">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="name" class="col-form-label">Email Address</label>
                                                <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" placeholder="email@gmail.com">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="col-form-label">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="*********">
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="password" class="col-form-label">{{ __('Area of Focus') }}</label>
                                                <select class="form-control form-select">
                                                    <option value=" " disabled selected>Please Select...</option>
                                                    <option value="one">one</option>
                                                    <option value="two">two</option>
                                                    <option value="three">three</option>
                                                </select>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="gender" class="col-form-label">Gender</label>
                                                <div class="filter d-flex">
                                                    <div class="d-flex gender-preference flex-fill">
                                                        <input class="form-check-input mt-0" type="radio" name="gender" value="male" id="male-coach">
                                                        <label for="male-coach">Male</label>
                                                    </div>
                                                    <div class="d-flex gender-preference flex-fill">
                                                        <input class="form-check-input mt-0" type="radio" name="gender" value="female" id="female-coach">
                                                        <label for="female-coach">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-theme d-block w-100">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center mt-4">
                                                <p>Already have an account? <a href="{{ route('login') }}">Login Here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- STEP 2 END --}}
        @endif
</div>