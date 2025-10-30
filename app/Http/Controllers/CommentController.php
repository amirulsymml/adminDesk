<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with(['user', 'ticket'])
            ->latest()
            ->paginate(20);

        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tickets = Ticket::all();
        $users = User::all();

        return view('comments.create', compact('tickets', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, Ticket $ticket)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['ticket_id'] = $ticket->id;
        $validated['is_internal'] = $request->has('is_internal');

        Comment::create($validated);

        return redirect()->route('tickets.show', $ticket->id)
            ->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment->load(['user', 'ticket']);

        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $tickets = Ticket::all();
        $users = User::all();

        return view('comments.edit', compact('comment', 'tickets', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $validated = $request->validated();

        $comment->update($validated);

        return redirect()->route('comments.index')
            ->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully.');
    }
}
