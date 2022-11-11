@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello <strong>{{ Auth::user()->first_name }}</strong>, You are logged in as a <strong>{{ Auth::user()->userType->type }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
