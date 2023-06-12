<div class="register-page">
    
        @if ($step == 1)
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo.svg') }}" alt="logo"></a>
                    </div>
                </div>
            </div>
        </nav>
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
                                        <div class="register-type" wire:click="changeStep(4)">
                                            <img src="{{ asset('assets/icons/player.svg') }}" alt="player">
                                            <h2>
                                                Join as a Player
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="register-type" wire:click="changeStep(2)">
                                            <img src="{{ asset('assets/icons/coach.svg') }}" alt="player">
                                            <h2>
                                                Join as a Coach
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="register-type" wire:click="changeStep(3)">
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

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="d-flex footer-links justify-content-center">
                            <a href="#">
                                Privacy Policy
                            </a>
                            <a href="#">
                                Terms of Use
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        @endif

        @if ($step == 4 || $step == 2 || $step == 3)
        {{-- STEP 2 --}}
        <div class="row justify-content-center registration-form">
            <div class="row">
                <div class="col-md-4 img-portion">
                    @if ($step == 2)
                        <img src="{{ asset('assets/img/auth/coach-register.jpg') }}" alt="coach register">
                    @elseif ($step == 3)
                        <img src="{{ asset('assets/img/auth/parent-register.jpg') }}" alt="player register">
                    @elseif ($step == 4)
                        <img src="{{ asset('assets/img/auth/player-register.jpg') }}" alt="player register">
                    @endif
                </div>
                <div class="col-md-8">
                    <nav>
                        <div class="row">
                            <div class="col-md-10 offset-md-1 mt-5">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo.svg') }}" alt="logo"></a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="#" wire:click="changeStep(1)" class="btn btn-theme">
                                            <i class="fa-solid fa-arrow-left"></i>
                                            <span> Back</span>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-4">
                            <div class="card">
                                
                                <div class="card-head text-center">
                                    <h2>
                                        @if ($step == 2)
                                            Coach Registration
                                        @elseif($step == 3)
                                            Parent Registration
                                        @elseif($step == 4)
                                            Player Registration
                                        @endif  
                                    </h2>
                                    <p class="my-4">
                                        It only takes two minutes to set up your Aritae account. Get started below!
                                    </p>
                                </div>

                                <div class="card-body">
                                    <form method="POST" wire:submit.prevent="submitPlayer">
                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label">{{ __('First Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="Mike" autofocus wire:model="firstName">

                                                @error('firstName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label">{{ __('Last Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('lastName') is-invalid @enderror" placeholder="Clery" wire:model="lastName">

                                                @error('lastName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="name" class="col-form-label">Email Address</label>
                                                <input id="name" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@gmail.com" wire:model="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name" class="col-form-label">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********" wire:model="password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="password" class="col-form-label">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="password_confirmation"  placeholder="*********" wire:model="confirmPassword">
                                                @error('confirmPassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            @if($step == 2 || $step == 4)
                                            <div class="col-12 mb-3">
                                                <div wire:ignore>
                                                    <label for="areaOfFocus" class="col-form-label">{{ __('Area of Focus') }}</label>
                                                    <select id="sports-selection" class="form-control form-select @error('areaOfFocus') is-invalid @enderror" wire:model="areaOfFocus" autocomplete="off" multiple>
                                                        <option value=" " disabled selected>Please Select...</option>
                                                        @foreach ($sports as $sport)
                                                            <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <script>
                                                        new TomSelect('#sports-selection', {
                                                            render: {
                                                                item: function(data, escape){
                                                                    var item = document.createElement('div');
                                                                    item.classList.add('item', 'sports-ts-item');
                                                                    item.dataset.value = data.value;
                                                                    item.dataset.tsItem = "";
                                                                    item.textContent = data.text;

                                                                    var close = document.createElement('i');
                                                                    close.classList.add('fas', 'fa-times', 'ps-2');
                                                                    close.onclick = function(event){
                                                                        var value = event.target.parentNode.dataset.value;
                                                                        var sports_select = document.getElementById('sports-selection').tomselect;
                                                                        sports_select.removeItem(value, false);
                                                                    }
                                                                    item.append(close);
                                                                    return item;
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                    <style>
                                                        .ts-wrapper{
                                                            padding: 5px 10px !important;
                                                        }
                                                        .ts-control{
                                                            border: none !important;
                                                            background-color: transparent !important;
                                                        }
                                                        .ts-control .item{
                                                            padding: 5px 15px !important;
                                                            background-color: #475569 !important;
                                                            color: white !important;
                                                            border-radius: 50px !important;
                                                            font-size: 1rem !important;
                                                        }
                                                        .ts-dropdown .option{
                                                            font-size: 1rem !important;
                                                        }
                                                    </style>
                                                </div>
                                                @error('areaOfFocus')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            @elseif($step == 3)
                                            <div class="col-12 mb-3">
                                                <div wire:ignore>
                                                    <label for="parentRelation" class="col-form-label">{{ __('Relation with') }}</label>
                                                    <select id="player-selection" class="form-control form-select @error('parentRelation') is-invalid @enderror" wire:model="parentRelation" autocomplete="off">
                                                        <option value="" selected>Please Select...</option>
                                                        @foreach ($players as $player)
                                                            <option value="{{ $player->player->id }}">{{ $player->full_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <script>
                                                        new TomSelect('#player-selection', {});
                                                    </script>
                                                    <style>
                                                        .ts-wrapper{
                                                            padding: 7px 20px !important;
                                                        }
                                                        .ts-control{
                                                            border: none !important;
                                                            background-color: transparent !important;
                                                        }
                                                        .ts-control .item{
                                                            font-size: 1rem !important;
                                                        }
                                                        .ts-dropdown .option{
                                                            font-size: 1rem !important;
                                                        }
                                                    </style>
                                                </div>
                                                @error('parentRelation')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            @endif

                                            <div class="col-12 mb-3">
                                                <label for="gender" class="col-form-label">Gender</label>
                                                <div class="filter d-flex">
                                                    <div class="d-flex gender-preference flex-fill">
                                                        <input class="form-check-input mt-0" @error('gender') is-invalid @enderror type="radio" name="gender" value="male" id="male-coach" wire:model="gender">
                                                        <label for="male-coach">Male</label>
                                                    </div>
                                                    <div class="d-flex gender-preference flex-fill">
                                                        <input class="form-check-input mt-0 @error('gender') is-invalid @enderror" type="radio" name="gender" value="female" id="female-coach" wire:model="gender">
                                                        <label for="female-coach">Female</label>
                                                    </div>
                                                </div>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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

        {{--@if ($step == 2)--}}
        {{-- STEP 2 --}}
        {{-- <div class="row justify-content-center registration-form">
            <div class="row">
                <div class="col-md-4 img-portion">
                    <img src="{{ asset('assets/img/auth/coach-register.jpg') }}" alt="coach register">
                </div>
                <div class="col-md-8">
                    <nav>
                        <div class="row">
                            <div class="col-md-10 offset-md-1 mt-5">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo.svg') }}" alt="logo"></a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="#" wire:click="changeStep(1)" class="btn btn-theme">
                                            <i class="fa-solid fa-arrow-left"></i>
                                            <span> Back</span>
                                        </a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-4">
                            <div class="card">
                                
                                <div class="card-head text-center">
                                    <h2>
                                        Coach Registration
                                    </h2>
                                    <p class="my-4">
                                        It only takes two minutes to set up your Aritae account. Get started below!
                                    </p>
                                </div>

                                <div class="card-body">
                                    <form method="POST" wire:submit.prevent="submitPlayer">
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
        </div> --}}
        {{-- STEP 2 END --}}
        {{-- @endif --}}
</div>