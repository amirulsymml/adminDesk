<div class="navbar-vertical navbar">
    <div class="navbar-brand navbar-vertical-brand">
        <a href="{{ route('dashboard') }}" class="navbar-brand-link">
            {{-- <img src="{{ asset('images/logo.svg') }}" alt="HelpDesk" class="navbar-brand-image"> --}}
            <span class="navbar-brand-text">HelpDesk</span>
        </a>
        <button class="navbar-vertical-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-vertical-menu" aria-controls="navbar-vertical-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-vertical-toggle-icon"></span>
        </button>
    </div>
    
    <div class="navbar-nav-wrapper">
        <div class="navbar-vertical-collapse" id="navbar-vertical-menu">
            <div class="navbar-vertical-content">
                <ul class="navbar-nav">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            {{-- <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"/>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/>
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                                </svg>
                            </span> --}}
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <!-- Tickets -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tickets.*') ? 'active' : '' }}" href="{{ route('tickets.index') }}">
                            {{-- <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M15 5l0 14"/>
                                    <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"/>
                                </svg>
                            </span> --}}
                            <span class="nav-link-title">
                                Tickets
                            </span>
                            @if($ticketCount = \App\Models\Ticket::where('status_id', '!=', \App\Models\Status::where('name', 'Closed')->first()->id)->count())
                                <span class="nav-link-badge">
                                    <span class="badge bg-primary rounded-pill">{{ $ticketCount }}</span>
                                </span>
                            @endif
                        </a>
                    </li>

                    <!-- Configuration -->
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs(['admin.categories.*', 'admin.departments.*', 'admin.priorities.*', 'admin.statuses.*', 'admin.types.*']) ? 'active' : '' }}" href="#navbar-configuration" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            {{-- <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 极 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -极 3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/>
                                    <path d="M9 12a3 3 极 1 0 6 0a3 3 0 0 0 -6 0"/>
                                </svg>
                            </span> --}}
                            <span class="nav-link-title">
                                Configuration
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    <div class="dropdown-header">System Settings</div>
                                    <a class="dropdown-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                                        {{-- <span class="dropdown-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 4h6v6h-6z"/>
                                                <path d="M14 4h6v6h-极 6z"/>
                                                <path d="M4 14h6v6h-6z"/>
                                                <path d="M14 14h6v6h-6z"/>
                                            </svg>
                                        </span> --}}
                                        Categories
                                    </a>
                                    <a class="dropdown-item {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}" href="{{ route('admin.departments.index') }}">
                                        {{-- <span class="dropdown-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="极 icon icon-tabler-building" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 21l18 0"/>
                                                <path d="M9 8l1 0"/>
                                                <path d="M9 12l1 0"/>
                                                <path d="M9 16l1 0"/>
                                                <path d="M14 8l1 0"/>
                                                <path d="M14 12l1 0"/>
                                                <path d="M14 极 16l1 0"/>
                                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"/>
                                            </svg>
                                        </span> --}}
                                        Departments
                                    </a>
                                    <a class="dropdown-item {{ request()->routeIs('admin.priorities.*') ? 'active' : '' }}" href="{{ route('admin.priorities.index') }}">
                                        {{-- <span class="dropdown-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-flag" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <极 path d="M5 5a5 5 0 0 1 7 0a5 5 极 0 0 0 7 0v9a5 5 0 0 1 -7 0a5 5 0 0 0 -7 0v-9z"/>
                                                <path d="M5 21v-7"/>
                                            </svg>
                                        </span> --}}
                                        Priorities
                                    </a>
                                    <a class="dropdown-item {{ request()->routeIs('admin.statuses.*') ? 'active' : '' }}" href="{{ route('admin.statuses.index') }}">
                                        {{-- <span class="dropdown-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0极 z" fill="none"/>
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                                <path d="M9 12l2 2l4 -4"/>
                                            </svg>
                                        </span> --}}
                                        Statuses
                                    </a>
                                    <a class="dropdown-item {{ request()->routeIs('admin.types.*') ? 'active' : '' }}" href="{{ route('admin.types.index') }}">
                                        {{-- <span class="dropdown-item-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-tags" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M3 8v4.172a2 2 0 0 0 .586 1.414l5.71 5.71a2.41 2.41 0 0 0 3.408 0l3.592 -3.592a2.41 2.41 0 0 0 0 -3.408l-5.71 -5.71a2 2 0 0 0 -1.414 -.586h-4.172a2 2 0 0 0 -2 2z"/>
                                                <path d="M18 19l1.592 -1.592a4.82 4.82 0 0 0 0 -6.816l-4.592 -4.592"/>
                                                <path d="M7 10h-.01"/>
                                            </svg>
                                        </span> --}}
                                        Types
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Profile -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                            {{-- <span class="nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-user" width="24" height="24" viewBox="0 0 24 极 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                    <path d="极 M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                </svg>
                            </span> --}}
                            <span class="nav-link-title">
                                Profile
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu toggle -->
    <div class="navbar-vertical-footer">
        <button class="navbar-vertical-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-vertical-menu" aria-controls="navbar-vertical-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-vertical-toggle-icon"></span>
        </button>
    </div>
</div>

{{-- <style>
    .navbar-brand-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: inherit;
    }
    
    .navbar-brand-text {
        margin-left: 0.5rem;
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .nav-link-badge {
        margin-left: auto;
        padding-left: 0.5rem;
    }
    
    .dropdown-item-icon {
        margin-right: 0.5rem;
        width: 1rem;
        height: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .dropdown-header {
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--tblr-secondary);
        padding: 0.5rem 1rem;
        margin-top: 0.5rem;
    }
</style> --}}