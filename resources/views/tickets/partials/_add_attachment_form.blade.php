<form action="{{ route('tickets.attachments.store', $ticket->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="input-group">
        <input type="file" name="attachment" class="form-control @error('attachment') is-invalid @enderror">
        <button type="submit" class="btn btn-primary">Upload Attachment</button>
        @error('attachment')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</form>