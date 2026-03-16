<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin – 1625 Auto Lab' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body style="background:#f4f5f7;font-family:'Roboto',sans-serif;">

<div class="admin-wrapper">

    {{-- ─── Sidebar ─────────────────────────────────────────── --}}
    <aside class="admin-sidebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <i class="fa-solid fa-wrench me-2"></i>1625 <span>Lab</span>
        </a>
        <nav class="mt-1">
            <p class="sidebar-section-label">Main</p>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-bar fa-fw"></i> Dashboard
            </a>

            <p class="sidebar-section-label mt-2">Manage</p>
            <a href="{{ route('admin.appointments') }}"
               class="nav-link {{ request()->routeIs('admin.appointments') ? 'active' : '' }}">
                <i class="fa-solid fa-calendar-check fa-fw"></i> Appointments
            </a>
            <a href="{{ route('admin.services') }}"
               class="nav-link {{ request()->routeIs('admin.services') ? 'active' : '' }}">
                <i class="fa-solid fa-screwdriver-wrench fa-fw"></i> Services
            </a>
            <a href="{{ route('admin.team') }}"
               class="nav-link {{ request()->routeIs('admin.team') ? 'active' : '' }}">
                <i class="fa-solid fa-users fa-fw"></i> Team
            </a>

            <p class="sidebar-section-label mt-2">Site</p>
            <a href="{{ route('client.home') }}" target="_blank" class="nav-link">
                <i class="fa-solid fa-arrow-up-right-from-square fa-fw"></i> View Site
            </a>
        </nav>
    </aside>

    {{-- ─── Main Area ──────────────────────────────────────── --}}
    <div class="admin-main">
        <div class="admin-topbar">
            <h5 class="mb-0 fw-bold fs-6">{{ $title ?? 'Dashboard' }}</h5>
            <span class="small text-muted">{{ auth()->user()->name ?? 'Admin' }}</span>
        </div>
        <div class="admin-content">
            {{ $slot }}
        </div>
    </div>

</div>

@livewireScripts
</body>
</html>
