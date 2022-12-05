@extends('coach.layouts.app')

@section('content')

    <div class="modal fade" id="acceptRequestModal" tabindex="-1" aria-labelledby="acceptRequestModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="acceptRequestModalLabel">Accept Request</h1>
            <button type="button" class="btn-close btn-close-2" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="#">
                <div class="">
                    <label for="profileImage" class="form-label">Do you want to add {{ $player->first_name }} to your players list?
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="{{ route('coach.requests.single.accept', $player->id) }}" type="button" class="btn btn-success text-white" onclick="hideModal2()">Accept</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="declineRequestModal" tabindex="-1" aria-labelledby="declineRequestModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="declineRequestModalLabel">Decline Request</h1>
            <button type="button" class="btn-close btn-close-2" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="#">
                <div class="">
                    <label for="profileImage" class="form-label">Do you want to decline {{ $player->first_name }}'s request?
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <a href="{{ route('coach.requests.single.delete', $player->id) }}" type="button" class="btn btn-danger text-white" onclick="hideModal2()">Decline</a>
          </div>
        </div>
      </div>
    </div>

    <div class="hire-requests-page">
        <h2 class="mb-3 mt-3 fs-2 text-center" id="info">
            <span class="text-capitalize">Requested by {{ $player->full_name }}</span>
        </h2>
        <div class="row">
            <div class="col-xxl-8 col-xl-9 col-md-11 mx-auto">
                <div class="card">
                    <div class="cover">
                        @if ($player->player->cover_img == '')
                            <img src="{{ asset('/assets/img/default/default-cover.jpg') }}" alt="cover image" class="w-100">
                        @else
                            <img src="{{ asset($player->player->cover_img) }}" class="card-img-top" alt="cover image">
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="profile-img rounded-circle mx-auto shadow">
                            @if ($player->player->profile_img == '')
                                <img src="{{ asset('assets/img/default/default-profile-pic.jpg') }}" class="rounded-circle w-100" alt="">
                            @else
                                <img src="{{ asset($player->player->profile_img) }}" class="card-img-top" alt="cover image">
                            @endif
                        </div>
                        <div class="text-center">
                            <h5 class="card-title fw-bold text-capitalize my-3">{{ $player->full_name }}</h5>
                            <p class="card-text">{{ $player->player->about }}</p>
                            @foreach ($player->sports as $sport)
                                <span class="badge rounded-pill text-bg-secondary">{{ $sport->name }}</span>
                            @endforeach
                        </div>
                        <hr>
                        <p class="fw-bold text-start card-title text-capitalize">PROPOSAL:</p>
                        <p class="mb-2">
                            <strong>Title: </strong>{{ $req->title }}
                        </p>
                        <p>
                            <strong>Message: </strong>{{ $req->message }}
                        </p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#" class="btn btn-theme">View Profile</a>
                            </div>
                            <div>
                                <a href="#" class="btn btn-theme"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#acceptRequestModal"
                                    >Accept</a>
                                <a href="#" class="btn btn-danger text-white"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#declineRequestModal"
                                    >Decline</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center text-muted border-top-0">
                         {{ \Carbon\Carbon::parse($req->created_at)->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection