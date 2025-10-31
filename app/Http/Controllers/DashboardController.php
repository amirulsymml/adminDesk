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
        $openTickets = Ticket::whereHas('status', function ($q) {
            $q->where('slug', 'open');
        })->count();

        $pendingTickets = Ticket::whereHas('status', function ($q) {
            $q->where('slug', 'pending');
        })->count();

        $closedTickets = Ticket::whereHas('status', function ($q) {
            $q->where('slug', 'closed');
        })->count();

        $ticketsByStatus = Status::withCount('tickets')->get();
        $ticketsByDepartment = Department::withCount('tickets')->get();
        $ticketsByCategory = Category::withCount('tickets')->get();

        $latestTickets = Ticket::latest()->take(5)->get();
        $latestComments = Comment::latest()->take(5)->get();

        return view('dashboard', compact('openTickets', 'pendingTickets', 'closedTickets',
            'ticketsByStatus', 'ticketsByDepartment', 'ticketsByCategory', 'latestTickets', 'latestComments'));
    }
}
