<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Type;
use App\Models\Department;
use App\Models\Category;
use App\Models\Attachment;
use App\Notifications\NewTicketNotification;
use App\Notifications\TicketUpdatedNotification;
use App\Http\Requests\TicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = Ticket::with(['status', 'priority', 'type', 'department', 'category', 'customer', 'assignedUser'])
            ->when($request->status_id, fn ($query) => $query->where('status_id', $request->status_id))
            ->when($request->priority_id, fn ($query) => $query->where('priority_id', $request->priority_id))
            ->when($request->type_id, fn ($query) => $query->where('type_id', $request->type_id))
            ->when($request->department_id, fn ($query) => $query->where('department_id', $request->department_id))
            ->when($request->category_id, fn ($query) => $query->where('category_id', $request->category_id))
            ->when($request->customer_id, fn ($query) => $query->where('customer_id', $request->customer_id))
            ->when($request->assigned_user_id, fn ($query) => $query->where('assigned_user_id', $request->assigned_user_id))
            ->when($request->subject, fn ($query) => $query->where('subject', 'like', '%' . $request->subject . '%')->orWhere('description', 'like', '%' . $request->subject . '%'))
            ->paginate(10);

        $statuses = Status::all();
        $priorities = Priority::all();
        $types = Type::all();
        $departments = Department::all();
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();

        return view('tickets.index', compact('tickets', 'statuses', 'priorities', 'types', 'departments', 'categories', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Ticket::class);
        $statuses = Status::all();
        $priorities = Priority::all();
        $types = Type::all();
        $departments = Department::all();
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();

        return view('tickets.create', compact('statuses', 'priorities', 'types', 'departments', 'categories', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();

        \Illuminate\Support\Facades\Log::info('Validated data before ticket creation:', $validated);

        $ticket = Ticket::create($validated);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('attachments', $fileName, 'public');

                Attachment::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => auth()->id(),
                    'file_name' => $fileName,
                    'file_path' => $filePath,
                    'mime_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        // Notify admins about the new ticket
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewTicketNotification($ticket));
        }

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load('status', 'priority', 'type', 'department', 'category', 'customer', 'assignedUser', 'comments.user', 'attachments.user');
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        $statuses = Status::all();
        $priorities = Priority::all();
        $types = Type::all();
        $departments = Department::all();
        $categories = Category::all();
        $customers = User::where('role', 'customer')->get();

        return view('tickets.edit', compact('ticket', 'statuses', 'priorities', 'types', 'departments', 'categories', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $ticket->update($validated);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('attachments', $fileName, 'public');

                Attachment::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => auth()->id(),
                    'file_name' => $fileName,
                    'file_path' => $filePath,
                    'mime_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        // Notify customer and assigned user about the ticket update
        $ticket->customer->notify(new TicketUpdatedNotification($ticket));
        if ($ticket->assignedUser) {
            $ticket->assignedUser->notify(new TicketUpdatedNotification($ticket));
        }

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);

        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully.');
    }
}
