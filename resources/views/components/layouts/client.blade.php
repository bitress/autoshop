<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '1625 Auto Lab | Retrofit & Headunit Specialists' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>

    {{-- ─── Navbar ─────────────────────────────────────────── --}}
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top" id="navbarNav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('client.home') }}">
                1625 <span class="text-orange">AUTOLAB</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <i class="fa-solid fa-bars text-orange fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('client.home') ? 'active' : '' }}"
                           href="{{ route('client.home') }}#services">The Lab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('client.team') ? 'active' : '' }}"
                           href="{{ route('client.team') }}">Team</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-orange px-4 py-2"
                           href="{{ route('client.home') }}#booking">Book A Bay</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ─── Page Content ───────────────────────────────────── --}}
    <main style="padding-top: 72px;">
        {{ $slot }}
    </main>

    {{-- ─── Footer ─────────────────────────────────────────── --}}
    <footer class="site-footer py-4 text-center">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-0 fw-bold text-uppercase" style="letter-spacing:1px;">&copy; {{ date('Y') }} 1625 Auto Lab.</p>
            <p class="mb-0 font-monospace fs-6 mt-2 mt-md-0">
                System architected by <a href="https://byteress.xyz" target="_blank" rel="noopener noreferrer">Bitressium</a>
            </p>
        </div>
    </footer>

    @livewireScripts

    <script>
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(s => { if (pageYOffset >= s.offsetTop - 100) current = s.id; });
        navLinks.forEach(l => {
            l.classList.remove('active');
            if (l.getAttribute('href') && l.getAttribute('href').includes(current) && current) l.classList.add('active');
        });
    });
    </script>
</body>
</html>
