@extends('player.layouts.app')

@section('content')

    @if (session()->has('success_message'))
        <div class="border-0 shadow alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="hire-requests-page">
        <h2 class="mb-3 mt-3 fs-2" id="info">
            <i class="bi bi-people-fill"></i>
            <span>Team Requests</span>
        </h2>

        <div class="requests-table table-design mb-5 mt-4">

            <table class="table align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Team</th>
                  <th scope="col">Sport</th>
                  <th scope="col">Position</th>
                  <th scope="col">Jersey</th>
                  <th scope="col" class="text-center">View</th>
                </tr>
              </thead>
              <tbody>
                @if (count($team_requests) == 0)
                    <tr>
                        <td colspan="5" class="text-center">
                            No Requests!
                        </td>
                    </tr>
                @else
                    @foreach ($team_requests as $key => $req)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>
                                <span>{{ $req->team->name }} <br>
                            </td>
                            <td>
                                {{ $req->team->sport }}
                            </td>
                            <td>
                                {{ $req->position }}
                            </td>
                            <td>
                                {{ $req->jersey }}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-theme px-3 py-1" href="{{route('player.team_request_accept', ['team_id' => $req->team->id])}}" title="Acceipt"><i class="bi bi-check2"></i></a>
                                <a class="btn btn-danger text-light px-3 py-1" href="{{route('player.team_request_decline', ['team_id' => $req->team->id])}}" title="Decline"><i class="bi bi-x-lg"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>

            
        </div>

    </div>
    
@endsection
