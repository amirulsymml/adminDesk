<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\\Models\\Ticket' => 'App\\Policies\\TicketPolicy',
        'App\\Models\\Comment' => 'App\\Policies\\CommentPolicy',
        'App\\Models\\Category' => 'App\\Policies\\CategoryPolicy',
        'App\\Models\\Department' => 'App\\Policies\\DepartmentPolicy',
        'App\\Models\\Priority' => 'App\\Policies\\PriorityPolicy',
        'App\\Models\\Status' => 'App\\Policies\\StatusPolicy',
        'App\\Models\\Type' => 'App\\Policies\\TypePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}