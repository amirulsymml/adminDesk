@extends('layouts.app')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Ticket #{{ $ticket->id }} - {{ $ticket->subject }}
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Ticket Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
                        <p><strong>Description:</strong> {{ $ticket->description }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-{{ strtolower($ticket->status->name) }}">{{ $ticket->status->name }}</span></p>
                        <p><strong>Priority:</strong> <span class="badge bg-{{ strtolower($ticket->priority->name) }}">{{ $ticket->priority->name }}</span></p>
                        <p><strong>Type:</strong> <span class="badge bg-{{ strtolower($ticket->type->name) }}">{{ $ticket->type->name }}</span></p>
                        <p><strong>Department:</strong> {{ $ticket->department->name }}</p>
                        <p><strong>Category:</strong> {{ $ticket->category->name }}</p>
                        <p><strong>Customer:</strong> {{ $ticket->customer->first_name }} {{ $ticket->customer->last_name }}</p>
                        <p><strong>Created At:</strong> {{ $ticket->created_at->format('M d, Y H:i A') }}</p>
                        <p><strong>Last Updated:</strong> {{ $ticket->updated_at->format('M d, Y H:i A') }}</p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Comments</h3>
                    </div>
                    <div class="card-body">
                        @include('tickets.partials._comments', ['comments' => $ticket->comments])
                        @include('tickets.partials._add_comment_form', ['ticket' => $ticket])
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Attachments</h3>
                    </div>
                    <div class="card-body">
                        @include('tickets.partials._attachments')
                        @include('tickets.partials._add_attachment_form')
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-between">
                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back to Tickets</a>
                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Ticket</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection