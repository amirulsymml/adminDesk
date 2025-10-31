<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="navbar-brand navbar-brand-autodark">
            <a href="{{ route('dashboard') }}" class="navbar-brand-link">
                {{-- <img src="{{ asset('images/logo.svg') }}" alt="HelpDesk" class="navbar-brand-image"> --}}
                <span class="navbar-brand-text">HelpDesk</span>
            </a>
            <button class="navbar-vertical-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-vertical-toggle-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse" id="sidebar-menu">
            <div class="d-flex flex-column">
                <h5 class="text-white text-uppercase px-3 py-2 fw-bold" style="filter: blur(0.5px);">Main</h5>

                <ul class="navbar-nav">

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <!-- Tickets -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tickets.*') ? 'active' : '' }}" href="{{ route('tickets.index') }}">
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

                    <h5 class="text-white text-uppercase px-3 py-3 fw-bold" style="filter: blur(0.5px);">System Settings</h5>


                    <!-- Categories -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                            <span class="nav-link-title">
                                Categories
                            </span>
                        </a>
                    </li>

                    <!-- Departments -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}" href="{{ route('admin.departments.index') }}">
                            <span class="nav-link-title">
                                Departments
                            </span>
                        </a>
                    </li>

                    <!-- Priorities -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.priorities.*') ? 'active' : '' }}" href="{{ route('admin.priorities.index') }}">
                            <span class="nav-link-title">
                                Priorities
                            </span>
                        </a>
                    </li>

                    <!-- Statuses -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.statuses.*') ? 'active' : '' }}" href="{{ route('admin.statuses.index') }}">
                            <span class="nav-link-title">
                                Statuses
                            </span>
                        </a>
                    </li>

                    <!-- Types -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.types.*') ? 'active' : '' }}" href="{{ route('admin.types.index') }}">
                            <span class="nav-link-title">
                                Types
                            </span>
                        </a>
                    </li>
                
                    <!-- Profile -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                            <span class="nav-link-title">
                                Profile
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                        <span class="nav-link-title">
                            Logout
                        </span>
                    </a>
                </form>
            </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

