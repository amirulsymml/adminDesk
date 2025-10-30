<div class="attachments-list">
    @forelse($attachments as $attachment)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="text-reset">{{ $attachment->file_name }}</a>
                <span class="text-muted">{{ round($attachment->file_size / 1024, 2) }} KB</span>
            </div>
        </div>
    @empty
        <p class="text-muted">No attachments yet.</p>
    @endforelse
</div>