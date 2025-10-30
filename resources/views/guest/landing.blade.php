@extends('layouts.guest')

@section('title', 'Welcome')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Welcome to HelpDesk</h2>
            <p class="card-text">Your one-stop solution for managing support tickets efficiently and effectively.</p>
            <a href="/login" class="btn btn-primary">Login</a>
            {{-- <a href="/register" class="btn btn-secondary">Register</a> --}}
        </div>
    </div>
@endsection