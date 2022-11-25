@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-8 pt-5">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->user_type_id == 2)
                        <strong>Redirecting...</strong>
                        <script>window.location = "/coach/dashboard";</script>
                    @elseif (Auth::user()->user_type_id == 4)
                        <strong>Redirecting...</strong>
                        <script>window.location = "/player/dashboard";</script>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
