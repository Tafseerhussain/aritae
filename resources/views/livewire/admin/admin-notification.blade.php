<div class="admin-notifications">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">Notifications</h3>
                </div>
            </div>
            @foreach($notifications as $notification)
            <div class="row mx-0 my-3">
                <div class="col-12 px-3 py-2 notification-body">
                    <div>
                        <h5 class="mt-2 mb-2"><strong>{{$notification->title}}</strong></h5>
                        <p>{{$notification->description}}</p>
                    </div>
                    <p class="text-secondary"><i class="bi bi-clock"></i> {{$notification->created_at->diffForHumans()}}</p>
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
