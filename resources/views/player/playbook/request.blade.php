@extends('player.layouts.app')

@section('content')

<div class="playbook-page">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">Playbook</h3>
                </div>
            </div>
            @foreach($playbooks as $playbook)
            <div class="row mx-0 my-3">
                <div class="col-12 px-3 py-2 request-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mt-2 mb-0"><strong>Requested By: </strong>{{$playbook->coach->name}}</h5>
                        <p class="text-secondary mb-2">{{$playbook->created_at->diffForHumans()}}</p>
                    </div>
                    <a href="{{route('player.playbook', ['id' => $playbook->id])}}" class="btn btn-theme">View Playbook</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection