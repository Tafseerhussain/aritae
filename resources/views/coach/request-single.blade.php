@extends('coach.layouts.app')

@section('content')

    <div class="hire-requests-page">
        <h2 class="mb-3 mt-3 fs-2" id="info">
            <span class="text-capitalize">{{ $player->full_name }}</span>
        </h2>

        <div class="row">
            <div class="col-6">
                <div class="card p-3">
                    <p><strong>Full Name:</strong> {{ $player->full_name }}</p>
                    <p><strong>Email:</strong> {{ $player->email }}</p>
                    <p><strong>Sports:</strong>
                    @foreach ($player->sports as $sport)
                        {{ $sport->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach</p>
                    <p>
                        <a href="#" class="btn btn-theme btn-sm">Accept</a>
                        <a href="#" class="btn btn-danger text-white btn-sm">Decline</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    
@endsection
