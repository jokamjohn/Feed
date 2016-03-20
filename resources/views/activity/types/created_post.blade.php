{{ $event->user->name }} published a post, <a
        href="#">{{ $event->subject->name }}</a> on  {{ $event->created_at->diffForHumans() }}
