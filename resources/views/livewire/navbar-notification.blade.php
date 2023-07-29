<li class="list-group-item dropdown notifications">
    <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown" aria-expanded="false" wire:click="read_notification">
        <i class="fa-regular fa-bell"></i>
        @if($new_notification_count > 0)
        <span class="position-absolute start-100 translate-middle badge rounded-pill bg-success notification-badge">
            {{$new_notification_count > 99 ? '99+' : $new_notification_count}}
            <span class="visually-hidden">unread messages</span>
        </span>
        @endif
    </a>

    <div wire:ignore class="dropdown-menu">
        @foreach($notifications as $notification)
        <div class="notification-body d-flex justify-content-between align-items-center">
            <div>
                <h5><strong>{{$notification->title}}</strong></h5>
                <span class="text-secondary">{{$notification->created_at->diffForHumans()}}</span>
            </div>
            @if($notification->type == 'contact-form')
            <a href="{{route('admin.contact')}}" class="btn btn-secondary action-btn">View Request</a>
            @elseif($notification->type == 'playbook-request')
            <a href="{{route('player.playbook', ['id' => intval($notification->resource)])}}" class="btn btn-secondary action-btn">View Playbook</a>
            @elseif($notification->type == 'coach-hire-request')
            <a href="{{route('coach.requests.single', ['id' => intval($notification->resource)])}}" class="btn btn-secondary action-btn">View Request</a>
            @endif
        </div>
        @endforeach
        
        <div class="px-0 py-2">
            @if(auth()->user()->user_type_id == 1)
            <a class="fw-bold text-primary" href="{{route('admin.notification')}}">See All Notifications</a>
            @elseif(auth()->user()->user_type_id == 2)
            <a class="fw-bold text-primary" href="{{route('coach.notification')}}">See All Notifications</a>
            @elseif(auth()->user()->user_type_id == 4)
            <a class="fw-bold text-primary" href="{{route('player.notification')}}">See All Notifications</a>
            @endif
        </div>
    </div>

</li>
