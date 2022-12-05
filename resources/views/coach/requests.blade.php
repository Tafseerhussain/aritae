@extends('coach.layouts.app')

@section('content')

    @if (session()->has('success_message'))
        <div class="border-0 shadow alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="hire-requests-page">
        <h2 class="mb-3 mt-3 fs-2" id="info">
            <i class="bi bi-person-plus-fill"></i>
            <span>Hire Requests</span>
        </h2>

        <div class="requests-table table-design mb-5 mt-4">

            <table class="table align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Player</th>
                  <th scope="col">Status</th>
                  <th scope="col">Requested</th>
                  <th scope="col" class="text-center">View</th>
                </tr>
              </thead>
              <tbody>
                @if (count($requests) == 0)
                    <tr>
                        <td colspan="5" class="text-center">
                            No Requests!
                        </td>
                    </tr>
                @else
                    @foreach ($requests as $key => $req)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>
                                <span>{{ $req->name }} <br>
                                <small class="opacity-75">{{ $req->email }}</small></span>
                            </td>
                            <td><span class="badge text-bg-warning text-uppercase">Pending</span></td>
                            <td>
                                {{ $req->created_at->format('d M, Y') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('coach.requests.single', $req->player_id) }}" class="text-primary">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
              </tbody>
            </table>

            
        </div>

    </div>
    
@endsection
