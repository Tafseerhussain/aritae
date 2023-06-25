<div class="admin-contact-response">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">Contact Responses</h3>
                    <div class="search-filter">
                        <div class="d-flex">
                            <div class="input-group input-group-sm mx-2 search-input">
                                <input type="text" class="form-control form-control-sm" placeholder="Search">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($responses as $response)
            <div class="row response-body mx-0 my-3">
                <div class="col-12 p-3 response-body">
                    <p class="m-0">
                        <strong>{{ $response->first_name . " " . $response->last_name}}</strong><br>
                        <small class="text-secondary"><strong>Email: </strong>{{$response->email}}</small><br>
                        <small class="text-secondary"><strong>Phone: </strong>{{$response->phone}}</small>
                        <small class="text-secondary"><strong>Role: </strong>{{$response->user_type}}</small><br>
                        <small class="text-secondary"><strong>Time: </strong>{{$response->created_at->diffForHumans()}}</small>
                    </p>
                    <h5 class="mt-3 mb-2"><strong>Subject: </strong>{{$response->subject}}</h5>
                    <p>{{$response->message}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <button class="btn btn-theme m-2 px-2 py-1" {{($current_page <= 1) ? 'disabled' : ''}} wire:click="changePage({{$current_page - 1}})"><i class="bi bi-chevron-left"></i></button>
            <span class="m-2">Page {{$current_page}} of {{$total_page}}</span>
            <button class="btn btn-theme m-2 px-2 py-1" {{($current_page >= $total_page) ? 'disabled' : ''}} wire:click="changePage({{$current_page + 1}})"><i class="bi bi-chevron-right"></i></button>
        </div>
    </div>
</div>
