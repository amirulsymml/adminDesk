<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $openTickets = Ticket::where('status_id', 1)->count(); // Assuming 1 is the ID for Open status
        $pendingTickets = Ticket::where('status_id', 2)->count(); // Assuming 2 is the ID for Pending status
        $closedTickets = Ticket::where('status_id', 3)->count(); // Assuming 3 is the ID for Closed status

        $ticketsByStatus = Status::withCount('tickets')->get();
        $ticketsByDepartment = Department::withCount('tickets')->get();
        $ticketsByCategory = Category::withCount('tickets')->get();

        $latestTickets = Ticket::latest()->take(5)->get();
        $latestComments = Comment::latest()->take(5)->get();

        return view('dashboard', compact('openTickets', 'pendingTickets', 'closedTickets',
            'ticketsByStatus', 'ticketsByDepartment', 'ticketsByCategory', 'latestTickets', 'latestComments'));
    }
}
