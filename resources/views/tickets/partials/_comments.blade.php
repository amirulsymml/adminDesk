<div class="comments-section mt-4">
    @foreach($comments as $comment)
        @if(!$comment->is_internal || (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'agent')))
            <div class="card mb-3">
                <div class="card-header d-flex align-items-center">
                    <h4 class="card-title mb-0">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h4>
                    @if($comment->is_internal)
                        <span class="badge bg-warning ms-2">Internal Note</span>
                    @endif
                    <span class="text-muted ms-auto">{{ $comment->created_at->format('M d, Y H:i A') }}</span>
                </div>
                <div class="card-body">
                    {{ $comment->details }}
                </div>
            </div>
        @endif
    @endforeach
</div>