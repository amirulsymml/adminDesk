<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttachmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Public authentication routes
require __DIR__.'/auth.php';

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
    
    // Ticket management (accessible to all authenticated users)
    Route::resource('tickets', TicketController::class);
    Route::post('tickets/{ticket}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('tickets.comments.store');
    Route::post('tickets/{ticket}/attachments', [AttachmentController::class, 'store'])->name('tickets.attachments.store');
    
    // Admin-only configuration routes
    Route::middleware(['auth', \App\Http\Middleware\CheckUserRole::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('departments', DepartmentController::class);
        Route::resource('priorities', PriorityController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('types', TypeController::class);
        Route::resource('users', UserController::class);
    });
});
