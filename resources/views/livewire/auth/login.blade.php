<div class="register-page">
    <div class="row justify-content-center registration-form">
        <div class="row">
            <div class="col-md-4 img-portion">
                <img src="{{ asset('assets/img/auth/login-img.jpg') }}" alt="player register">
            </div>
            <div class="col-md-8">
                <nav>
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <a href="/" class="navbar-brand"><img src="{{ asset('assets/img/logo.svg') }}" alt="logo"></a>
                                </div>
                            </div>  
                        </div>
                    </div>
                </nav>
                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-4">
                        <div class="card">
                            
                            <div class="card-head text-center">
                                <h2>
                                    Log in to your account
                                </h2>
                                <p class="my-4">
                                    Welcome Back to Aritae!
                                </p>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-12 mb-3">
                                            <label for="name" class="col-form-label">Your Email</label>
                                            <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" placeholder="email@gmail.com">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="name" class="col-form-label">{{ __('Your Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="*********">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            @if (Route::has('password.request'))
                                                <a class="btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-theme d-block w-100">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center mt-4">
                                            <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
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
</div>