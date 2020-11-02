@foreach($notifications as $notification)
    <!-- item-->
    <a href="{{ $notification->url }}" class="dropdown-item notify-item border-bottom">
        <div class="notify-icon bg-{{ $notification->bg_class ?? '' }}">
            @if($notification->type == 'info')
                <i class="{{ $notification->infoClass }}"></i>
            @elseif($notification->type == 'user')
                <img src="{{ userPhoto($notification->user->photo) }}" class="img-fluid rounded-circle" alt="{{ $notification->user->name }}" />
            @endif
        </div>

        @if($notification->type == 'info')
        <p class="notify-details">{{ $notification->detail }}<small class="text-muted">{{ $notification->time }}</small></p>
        @elseif($notification->type == 'user')
            <p class="notify-details">{{ $notification->detail }}</p>
            <p class="text-muted mb-0 user-msg">
                <small>{{ $notification->msg }}</small>
            </p>
        @endif
    </a>
@endforeach
