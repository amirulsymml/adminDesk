<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - {{ $header ?? 'Dashboard' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tabler Core -->
        @vite(['resources/css/app.css', 'resources/js/app.js'], 'build', ['cache-bust' => time()])
        
        <!-- Additional Tabler Styles -->
        <style>
            .badge {
                font-size: 0.75rem;
                font-weight: 600;
            }
            
            .card {
                box-shadow: var(--tblr-shadow-card);
                border: var(--tblr-border-width) var(--tblr-border-style) var(--tblr-border-color);
            }
            
            .btn {
                font-weight: 500;
            }
            
            .table th {
                font-weight: 600;
                font-size: 0.875rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                color: var(--tblr-secondary);
            }
        </style>
    </head>
    <body class="antialiased">
        <!-- Loading indicator -->
        <!-- <div class="page-loading d-flex align-items-center justify-content-center bg-white bg-opacity-75 position-fixed top-0 left-0 w-100 h-100" style="display: none; z-index: 9999;">
            <div class="page-loading-content">
                <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div> -->

        @include('layouts.sidebar')
        
        <div class="page">
            @include('layouts.navigation')
            {{-- @include('layouts.sidebar') --}}
            
            <div class="page-wrapper">
                <!-- Page header -->
                <div class="page-header d-print-none">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <!-- Page pre-title -->
                                <div class="page-pretitle">
                                    {{ $subtitle ?? 'Overview' }}
                                </div>
                                <h1 class="page-title">
                                    {{ $header ?? 'Dashboard' }}
                                </h1>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!-- Page body -->
                <div class="page-body">
                    <div class="container-xl">
                        <!-- Flash messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 12l5 5l10 -10"/>
                                </svg>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/>
                                    <path d="M12 8v4"/>
                                    <path d="M12 16h.01"/>
                                </svg>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        {{ $slot ?? '' }}
                    </div>
                </div>
                
                {{-- @include('layouts.footer') --}}
            </div>
        </div>
        
        <!-- Scripts -->
        <script>
            // Global loading indicator
            document.addEventListener('DOMContentLoaded', function() {
                const forms = document.querySelectorAll('form');
                forms.forEach(form => {
                    form.addEventListener('submit', function() {
                        const loading = document.querySelector('.page-loading');
                        if (loading) loading.style.display = 'flex';
                    });
                });
                
                // Auto-dismiss alerts after 5 seconds
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    setTimeout(() => {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }, 5000);
                });
            });
        </script>
    </body>
</html>
