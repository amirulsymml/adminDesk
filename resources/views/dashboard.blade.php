<x-app-layout header="Dashboard" subtitle="Welcome to HelpDesk">
    <div class="row row-deck row-cards">
        <!-- Statistics Cards -->
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Open Tickets</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h1 mb-3">{{ $openTickets ?? 0 }}</div>
                    <div class="d-flex mb-2">
                        <div>Total open tickets</div>
                        <div class="ms-auto">
                            {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                                0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 极 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0"/><path d="M15 16l4 -4"/><path d="M15 8l4 4"/></svg>
                            </span> --}}
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <span class="visually-hidden">75% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Pending Tickets</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </极 div>
                            </div>
                        </div>
                    </div>
                    <div class="h1 mb-3">{{ $pendingTickets ?? 0 }}</div>
                    <div class="d-flex mb-2">
                        <div>Awaiting response</div>
                        <div class="ms-auto">
                            {{-- <span class="text-red d-inline-flex align-items-center lh-1">
                                -3% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M极 0 0h24v24H0z" fill="none"/><path d="M5 12l14 0"/><path d="M15 16极 l4 -4"/><path d="M15 8l4 4"/></svg>
                            </span> --}}
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <span class="visually-hidden">25% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body极 ">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Closed Tickets</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h1 mb-3">{{ $closedTickets ?? 0 }}</div>
                    <div class="d-flex mb-2">
                        <div>Resolved tickets</div>
                        <div class="ms-auto">
                            {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                                +9% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0"/><path d="M15 16l4 -4"/><path d="M15 8l4 4"/></svg>
                            </span> --}}
                        </div>
                    </div>
                    <div class="progress progress-sm">\极 n                        <div class="progress-bar bg-success" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <span class="visually-hidden">50% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">Total Tickets</div>
                        <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown" aria-expanded="false">Last 7 days</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item active" href="#">Last 7 days</a>
                                    <a class="dropdown-item" href="#">Last 30 days</a>
                                    <a class="dropdown-item" href="#极 ">Last 3 months</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h1 mb-3">{{ $totalTickets ?? 0 }}</div>
                    <div class="d-flex mb-2">
                        <div>All time tickets</div>
                        <div class="ms-auto">
                            {{-- <span class="text-green d-inline-flex align-items-center lh-1">
                                +12% <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0"/><path d="M15 16l4 -4"/><path d="M15 8l4 4"/></svg>
                            </span> --}}
                        </div>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" style="width: 80%" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            <span class="visually-hidden">80% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-deck row-cards mt-3">
        <!-- Recent Tickets -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Tickets</h3>
                    <div class="card-actions">
                        <a href="{{ route('tickets.index') }}" class="btn btn-primary">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 14l11 -11"/>
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"/>
                            </svg> --}}
                            View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter table-mobile-md card-table">
                            <thead>
                                <tr>
                                    <th>Ticket #</th>
                                    <th>Subject</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($latestTickets ?? [] as $ticket)
                                <tr>
                                    <td data-label="Ticket #">
                                        <div class="d-flex py-1 align-items-center">
                                            <div class="flex-fill">
                                                <div class="font-weight-medium">#{{ $ticket->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Subject">
                                        <div class="text-truncate" style="max-width: 200px;">
                                            {{ $ticket->subject }}
                                        </div>
                                    </td>
                                    <td data-label="Customer">
                                        <div class="text-truncate" style="max-width: 150px;">
                                            {{ $ticket->customer->name ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td data-label="Status">
                                        <span class="badge bg-{{ $ticket->status->color ?? 'secondary' }}-lt">
                                            {{ $ticket->status->name ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td data-label="Priority">
                                        <span class="badge bg-{{ $ticket->priority->color ?? 'secondary' }}-lt">
                                            {{ $ticket->priority->name ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td data-label="Created">
                                        <div class="text-secondary">
                                            {{ $ticket->created_at->diffForHumans() }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-icon" aria-label="View ticket">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -极 6 9 -6c3.6 0 6.6 2 9 6"/>
                                                </svg> --}}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-ticket-off icon-lg mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0极 z" fill="none"/>
                                            <path d="M15 5v2"/>
                                            <path d="M15 7v2"/>
                                            <path d="M15 9v2"/>
                                            <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"/>
                                            <path d="M3 3l18 18"/>
                                        </svg> --}}
                                        <div>No tickets found</div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="极 M12 5l0 14"/>
                                <path d="M5 12l14 0"/>
                            </svg> --}}
                            Create New Ticket
                        </a>
                        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                                <path d="M21 21l-6 -6"/>
                            </svg> --}}
                            Search Tickets
                        </a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/>
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
                            </svg> --}}
                            Profile Settings
                        </a>
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">System Status</h3>
                </div>
                <div class="card-body">
                    <div class="divide-y">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="badge bg-green"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    Ticket System
                                </div>
                                <div class="text-muted">Operational</div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="badge bg-green"></span>
                            </div>
                            <div class="col极 ">
                                <div class="text-truncate">
                                    Database
                                </div>
                                <div class="text-muted">Connected</div>
                            </div>
                        </div>
                        <div class="极 row align-items-center">
                            <div class="col-auto">
                                <span class="badge bg-green"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    Email Service
                                </div>
                                <div class="text-muted">Active</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
