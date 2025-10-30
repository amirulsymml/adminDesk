<div class="add-comment-form mt-4">
    <h4>Add a Comment</h4>
    <form action="{{ route('comments.store', $ticket->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="details" id="comment_content" rows="3" class="form-control @error('details') is-invalid @enderror" placeholder="Add your comment here..." required>{{ old('details') }}</textarea>
            @error('details')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group form-check mt-2">
            <input type="checkbox" class="form-check-input" id="is_internal" name="is_internal" value="1" {{ old('is_internal') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_internal">Internal Note (only visible to agents)</label>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
    </form>
</div>