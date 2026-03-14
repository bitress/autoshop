<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin – 1625 AutoLab' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

<div class="admin-wrapper">

    {{-- ─── Sidebar ─────────────────────────────────────────── --}}
    <aside class="admin-sidebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            🔧 1625 <span>Admin</span>
        </a>

        <nav class="mt-2">
            <p class="sidebar-section-label">Main</p>
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 Dashboard
            </a>

            <p class="sidebar-section-label mt-2">Manage</p>
            <a href="{{ route('admin.appointments') }}"
               class="nav-link {{ request()->routeIs('admin.appointments') ? 'active' : '' }}">
                📅 Appointments
            </a>
            <a href="{{ route('admin.services') }}"
               class="nav-link {{ request()->routeIs('admin.services') ? 'active' : '' }}">
                🔧 Services
            </a>
            <a href="{{ route('admin.team') }}"
               class="nav-link {{ request()->routeIs('admin.team') ? 'active' : '' }}">
                👥 Team
            </a>

            <p class="sidebar-section-label mt-2">Site</p>
            <a href="{{ route('client.home') }}" target="_blank" class="nav-link">
                🌐 View Site
            </a>
        </nav>
    </aside>

    {{-- ─── Main Area ──────────────────────────────────────── --}}
    <div class="admin-main">

        {{-- Topbar --}}
        <div class="admin-topbar">
            <h5 class="mb-0 fw-bold fs-6">{{ $title ?? 'Dashboard' }}</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="small text-muted">{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>
        </div>

        {{-- Content --}}
        <div class="admin-content">
            {{ $slot }}
        </div>
    </div>

</div>

@livewireScripts
</body>
</html>
