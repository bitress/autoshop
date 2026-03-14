<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '1625 AutoLab' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

    {{-- ─── Navbar ─────────────────────────────────────────── --}}
    <nav class="navbar navbar-expand-lg navbar-autoshop fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('client.home') }}">
                1625 <span>AutoLab</span>
            </a>
            <button class="navbar-toggler border-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarMain"
                    aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter:invert(1)"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto me-3 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('client.home') ? 'active' : '' }}"
                           href="{{ route('client.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('client.services') ? 'active' : '' }}"
                           href="{{ route('client.services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('client.team') ? 'active' : '' }}"
                           href="{{ route('client.team') }}">Our Team</a>
                    </li>
                </ul>
                <a class="btn btn-book" href="{{ route('client.booking') }}">Book Appointment</a>
            </div>
        </div>
    </nav>

    {{-- ─── Page Content ───────────────────────────────────── --}}
    <main style="padding-top: var(--navbar-height)">
        {{ $slot }}
    </main>

    {{-- ─── Footer ─────────────────────────────────────────── --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-brand">1625 <span>AutoLab</span></div>
                    <p class="small mt-2">Your trusted automotive service center. Quality repairs, honest prices, and expert care for your vehicle.</p>
                    <a href="https://www.facebook.com/1625autolab" target="_blank" rel="noopener noreferrer"
                       class="footer-link d-inline-flex align-items-center gap-2 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1877f2" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                        Facebook Page
                    </a>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-700 mb-3">Quick Links</h6>
                    <a class="footer-link" href="{{ route('client.home') }}">Home</a>
                    <a class="footer-link" href="{{ route('client.services') }}">Services</a>
                    <a class="footer-link" href="{{ route('client.team') }}">Our Team</a>
                    <a class="footer-link" href="{{ route('client.booking') }}">Book Now</a>
                </div>
                <div class="col-lg-3 col-6">
                    <h6 class="text-white fw-700 mb-3">Hours</h6>
                    <p class="small mb-1">Mon – Fri: 8:00 AM – 6:00 PM</p>
                    <p class="small mb-1">Saturday: 9:00 AM – 4:00 PM</p>
                    <p class="small mb-0">Sunday: Closed</p>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white fw-700 mb-3">Contact</h6>
                    <p class="small mb-1">📍 1625 Auto Lab Drive</p>
                    <p class="small mb-1">📞 (555) 162-5000</p>
                    <p class="small mb-0">✉️ info@1625autolab.com</p>
                </div>
            </div>
            <div class="footer-bottom text-center">
                &copy; {{ date('Y') }} 1625 AutoLab. All rights reserved.
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
