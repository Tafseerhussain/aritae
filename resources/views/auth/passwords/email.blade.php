@extends('layouts.registration-app')

@section('content')
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
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="reset-form registration-form">
                <div class="card">
                                
                    <div class="card-head text-center">
                        <h2>
                            Forgot Password
                        </h2>
                        <p class="my-4">
                            Enter your email for the verification porcess. We will send 4 digit code to your email.
                        </p>
                    </div>

                    @if (session()->has('registered'))
                    <span class="alert alert-success font-weight-bold d-block text-center">
                        <strong class="text-success text-center">
                            {{ session('registered') }}
                        </strong>
                    </span>
                    @endif

                    @if (session()->has('error'))
                        <strong class="text-danger text-center">
                            {{ session('error') }}
                        </strong>
                    @endif
                    
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="name" class="col-form-label">Your Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email@example.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-theme w-100">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
