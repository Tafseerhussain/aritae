@extends('coach.layouts.app')

@section('content')

    <div class="hire-requests-page">
        <h2 class="mb-3 mt-3 fs-2" id="info">
            <i class="bi bi-person-plus-fill"></i>
            <span>Hire Requests</span>
        </h2>

        <div class="requests-table table-design my-5">
            <div class="table-head">
                <div class="row fw-bold border-bottom pb-3">
                    <div class="col-md-1">
                        <div class="fst-italic">#</div>
                    </div>
                    <div class="col-md-2">
                        Player
                    </div>
                    <div class="col-md-2">
                        Status
                    </div>
                    <div class="col-md-2">
                        Titled
                    </div>
                    <div class="col-md-3">
                        Description
                    </div>
                    <div class="col-md-2">
                        Requested
                    </div>
                </div>
            </div>
            @if (count($requests) == 0)
                <div class="row">
                    <div class="col-12 text-center pt-3">
                        No Requests!
                    </div>
                </div>
            @else
                @foreach ($requests as $key => $req)
                    <a href="{{ route('coach.requests.single', $req->player_id) }}" class="row align-middle py-2">
                        <div class="col-md-1 align-middle">
                            <span class="align-middle">{{ $key+1 }}</span>
                        </div>
                        <div class="col-md-2">
                            <span>{{ $req->name }}
                            <small>{{ $req->email }}</small></span>
                        </div>
                        <div class="col-md-2">
                            <span class="badge text-bg-warning text-uppercase">Pending</span>
                        </div>
                        <div class="col-md-2">
                            <span>
                                {{ $req->title }}
                            </span>
                        </div>
                        <div class="col-md-3">
                            <span>
                                {{ $req->message }}
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span>
                                {{ $req->created_at->format('d M, Y') }}
                            </span>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>

    </div>
    
@endsection
