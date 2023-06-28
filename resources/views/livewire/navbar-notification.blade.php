<li class="list-group-item dropdown notifications">
    <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown" aria-expanded="false" wire:click="read_notification">
        <i class="fa-regular fa-bell"></i>
        @if($new_notification_count > 0)
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger notification-badge">
            {{$new_notification_count > 99 ? '99+' : $new_notification_count}}
            <span class="visually-hidden">unread messages</span>
        </span>
        @endif
    </a>

    <div wire:ignore class="dropdown-menu">
        @foreach($notifications as $notification)
        <div class="notification-body">
            <h5><strong>{{$notification->title}}</strong></h5>
            <p>{{$notification->description}}</p>
            <span class="text-secondary"><i class="bi bi-clock"></i> {{$notification->created_at->diffForHumans()}}</span>
        </div>
        @endforeach
        
        <div class="px-3 py-2">
            <a class="fw-bold text-primary" href="{{route('admin.notification')}}">See All Notifications</a>
        </div>
    </div>

</li>
