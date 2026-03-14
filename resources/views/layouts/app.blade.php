<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>1625 Auto Lab | Retrofit &amp; Headunit Specialists</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* ─────────────────────────────────────────────────────
           1625 AUTOLAB — Custom stylesheet
           Oswald (display) · Roboto (body)
           Brand orange #ea580c · Dark base #0a0a0a
        ───────────────────────────────────────────────────── */
        :root {
            --brand-orange:      #ea580c;
            --brand-orange-glow: rgba(234, 88, 12, 0.6);
            --brand-dark:        #0a0a0a;
            --brand-gray:        #161616;
            --brand-light-gray:  #2a2a2a;
        }

        /* Base */
        body {
            background-color: var(--brand-dark);
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
            overflow-x: hidden;
        }

        /* Asphalt texture */
        .bg-asphalt {
            background-color: var(--brand-dark);
            background-image: url('https://www.transparenttextures.com/patterns/asphalt-pattern.png');
        }

        h1, h2, h3, h4, h5,
        .nav-link, .btn, .navbar-brand {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
        }

        .text-orange { color: var(--brand-orange) !important; }
        .bg-orange   { background-color: var(--brand-orange) !important; }

        /* ── Navbar ─────────────────────────────────────── */
        .custom-navbar {
            background-color: rgba(10, 10, 10, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 2px solid var(--brand-orange);
            padding: 1rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }
        .custom-navbar .navbar-brand {
            font-size: 2.2rem;
            letter-spacing: 2px;
            text-shadow: 0 0 10px var(--brand-orange-glow);
        }
        .custom-navbar .nav-link {
            color: #ccc;
            font-weight: 600;
            letter-spacing: 1.5px;
            margin: 0 15px;
            position: relative;
            transition: color 0.3s ease;
        }
        .custom-navbar .nav-link:hover,
        .custom-navbar .nav-link.active { color: #fff; }

        /* Sliding underline */
        .custom-navbar .nav-link::after {
            content: '';
            position: absolute;
            width: 0; height: 3px;
            bottom: -5px; left: 0;
            background-color: var(--brand-orange);
            transition: width 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .custom-navbar .nav-link:hover::after,
        .custom-navbar .nav-link.active::after {
            width: 100%;
            box-shadow: 0 0 8px var(--brand-orange-glow);
        }

        /* ── Buttons ────────────────────────────────────── */
        .btn-orange {
            background-color: var(--brand-orange);
            color: #fff;
            font-weight: 700;
            letter-spacing: 1.5px;
            border: 2px solid var(--brand-orange);
            border-radius: 0;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(234, 88, 12, 0.2);
        }
        .btn-orange:hover {
            background-color: transparent;
            color: var(--brand-orange);
            box-shadow: 0 0 25px var(--brand-orange-glow) inset, 0 0 20px var(--brand-orange-glow);
            transform: translateY(-2px);
        }
        .btn-outline-steel {
            background-color: transparent;
            color: #fff;
            border: 2px solid #555;
            border-radius: 0;
            font-weight: 700;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
        }
        .btn-outline-steel:hover {
            border-color: #fff;
            background-color: #fff;
            color: var(--brand-dark);
            transform: translateY(-2px);
        }

        /* ── Hero ───────────────────────────────────────── */
        .hero {
            position: relative;
            min-height: 100vh;
            background:
                linear-gradient(90deg,
                    rgba(10,10,10,0.95) 0%,
                    rgba(10,10,10,0.6)  50%,
                    rgba(10,10,10,0.3)  100%),
                url('https://images.unsplash.com/photo-1542282088-fe8426682b8f?q=80&w=1920&auto=format&fit=crop')
                center/cover no-repeat;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #333;
        }
        .hero h1 {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            line-height: 1.1;
        }

        /* ── Service cards ──────────────────────────────── */
        .service-card {
            background: linear-gradient(145deg, var(--brand-gray), #111);
            border: 1px solid var(--brand-light-gray);
            border-top: 4px solid var(--brand-orange);
            border-radius: 0;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 50%; height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.03), transparent);
            transform: skewX(-25deg);
            transition: left 0.5s;
        }
        .service-card:hover::before { left: 150%; }
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.8), 0 0 15px rgba(234, 88, 12, 0.1);
            border-color: #444;
        }
        .service-card ul {
            list-style: none;
            padding-left: 0;
        }
        .service-card ul li {
            margin-bottom: 0.8rem;
            color: #aaa;
            font-family: 'Roboto', sans-serif;
            font-size: 1.05rem;
            border-bottom: 1px solid #222;
            padding-bottom: 0.5rem;
        }
        .service-card ul li:last-child { border-bottom: none; }
        .service-card ul li i {
            color: var(--brand-orange);
            margin-right: 12px;
        }

        /* ── Forms ──────────────────────────────────────── */
        .form-control, .form-select {
            background-color: #050505;
            border: 1px solid #333;
            color: #fff;
            border-radius: 0;
            padding: 0.75rem 1rem;
            font-family: 'Roboto', sans-serif;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus, .form-select:focus {
            background-color: #000;
            border-color: var(--brand-orange);
            color: #fff;
            box-shadow: 0 0 8px var(--brand-orange-glow);
        }
        .form-control::placeholder { color: #555; }
        .form-label {
            color: #888;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        /* ── Utility ────────────────────────────────────── */
        .section-title-line {
            height: 4px;
            width: 60px;
            background-color: var(--brand-orange);
            box-shadow: 0 0 10px var(--brand-orange-glow);
        }

        /* ── Toast ──────────────────────────────────────── */
        #toast-container {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .toast-msg {
            padding: 14px 22px;
            border-radius: 0;
            font-family: 'Oswald', sans-serif;
            font-size: 1rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #fff;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            max-width: 340px;
        }
        .toast-msg.show { opacity: 1; transform: translateY(0); }
        .toast-success { background: var(--brand-orange); border-left: 4px solid #fff; }
        .toast-error   { background: #991b1b;             border-left: 4px solid #fff; }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav">

    <!-- ─── NAVBAR ─────────────────────────────────────────── -->
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">
                1625 <span class="text-orange">AUTOLAB</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-orange fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#services">The Lab</a></li>
                    <li class="nav-item"><a class="nav-link" href="#promo">Promos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#work">Recent Builds</a></li>
                    <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                        <a class="btn btn-orange px-4 py-2" href="#booking">Book A Bay</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ─── HERO ───────────────────────────────────────────── -->
    <section class="hero bg-asphalt">
        <div class="container text-center text-md-start mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="d-inline-block px-3 py-1 mb-3 border border-orange text-orange"
                         style="background:rgba(234,88,12,0.1);font-family:'Oswald';letter-spacing:2px;">
                        PAMPANGA'S PREMIER RETROFITTERS
                    </div>
                    <h1 class="display-2 fw-bold mb-4">
                        FRUSTRATED WITH <br><span class="text-orange">OUTDATED</span> TECH?
                    </h1>
                    <p class="lead text-light mb-5 fs-4" style="max-width:600px;">
                        Precision Headlight Retrofits &amp; Android Headunit Installations.
                        Clean wiring. Factory fit finish. Zero guesswork.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="#booking" class="btn btn-orange btn-lg px-5 py-3">Schedule Upgrade</a>
                        <a href="#services" class="btn btn-outline-steel btn-lg px-5 py-3">View Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── SERVICES ───────────────────────────────────────── -->
    <section id="services" class="py-5 bg-asphalt">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">SERVICES OFFERED</h2>
                <div class="section-title-line mx-auto"></div>
            </div>

            <div class="row g-5 justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="service-card p-5">
                        <div class="mb-4 d-flex align-items-center gap-3 border-bottom border-dark pb-3">
                            <i class="fa-solid fa-eye fs-1 text-orange"></i>
                            <h3 class="fw-bold m-0">Headlights Retrofit</h3>
                        </div>
                        <ul>
                            <li><i class="fa-solid fa-bolt"></i> Headlights &amp; Foglights Upgrade</li>
                            <li><i class="fa-solid fa-bolt"></i> Angel &amp; Demon Eyes Installation</li>
                            <li><i class="fa-solid fa-bolt"></i> DRL Installation &amp; Replacement</li>
                            <li><i class="fa-solid fa-bolt"></i> Precision Laser Alignment</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="service-card p-5">
                        <div class="mb-4 d-flex align-items-center gap-3 border-bottom border-dark pb-3">
                            <i class="fa-solid fa-display fs-1 text-orange"></i>
                            <h3 class="fw-bold m-0">Android Headunit</h3>
                        </div>
                        <ul>
                            <li><i class="fa-solid fa-microchip"></i> Wireless Carplay &amp; Android Auto</li>
                            <li><i class="fa-solid fa-microchip"></i> 360 Camera Integration</li>
                            <li><i class="fa-solid fa-microchip"></i> Perfect Fitting OEM-style Frame</li>
                            <li><i class="fa-solid fa-microchip"></i> Powerful Octacore Processing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── PROMO ───────────────────────────────────────────── -->
    <section id="promo" class="py-5" style="background-color:#050505;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="border border-secondary p-5 text-center position-relative overflow-hidden"
                         style="background:linear-gradient(45deg,#111,#1a1a1a);">
                        <div class="position-absolute top-0 start-0 w-100"
                             style="height:4px;background:var(--brand-orange);box-shadow:0 0 15px var(--brand-orange);"></div>
                        <h2 class="display-4 fw-bold text-white mb-3">
                            FREE <span class="text-orange">DEMON EYES!</span>
                        </h2>
                        <p class="fs-4 text-light mb-4" style="font-family:'Roboto';">
                            Get FREE Demon Eyes (Purple, Amber, Blue, Ice Blue, or White)
                            with every Headlight Retrofit package.
                        </p>
                        <a href="#booking" class="btn btn-orange btn-lg px-5">Claim Offer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── RECENT BUILDS ──────────────────────────────────── -->
    <section id="work" class="py-5 bg-asphalt">
        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-end mb-5 border-bottom border-dark pb-3">
                <div>
                    <h2 class="fw-bold m-0 display-6">LATEST <span class="text-orange">BUILDS</span></h2>
                    <div class="section-title-line mt-3"></div>
                </div>
                <a href="https://www.facebook.com/1625autolab" target="_blank" rel="noopener noreferrer"
                   class="btn btn-outline-steel d-none d-md-block">
                    <i class="fa-brands fa-facebook me-2"></i>Follow 1625
                </a>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 rounded-0 bg-transparent">
                        <img src="https://images.unsplash.com/photo-1600705591462-80ba4e851d7e?q=80&w=600&auto=format&fit=crop"
                             class="img-fluid border border-secondary" alt="Headlight retrofit"
                             style="opacity:0.8;transition:opacity 0.3s;"
                             onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <div class="pt-3">
                            <p class="text-light fs-6 font-monospace" style="color:#aaa !important;">
                                &gt; Ice Blue Demon Eyes. Clean cutoff. 💯
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 rounded-0 bg-transparent">
                        <img src="https://images.unsplash.com/photo-1544829728-e5cb9eedc20e?q=80&w=600&auto=format&fit=crop"
                             class="img-fluid border border-secondary" alt="Android headunit"
                             style="opacity:0.8;transition:opacity 0.3s;"
                             onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <div class="pt-3">
                            <p class="text-light fs-6 font-monospace" style="color:#aaa !important;">
                                &gt; Android Headunit fitted. Wireless Carplay active. 🚀
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 rounded-0 bg-transparent">
                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=600&auto=format&fit=crop"
                             class="img-fluid border border-secondary" alt="Car front"
                             style="opacity:0.8;transition:opacity 0.3s;"
                             onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.8'">
                        <div class="pt-3">
                            <p class="text-light fs-6 font-monospace" style="color:#aaa !important;">
                                &gt; DRL and Foglights aligned. Ready for delivery. 🔧
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── BOOKING ─────────────────────────────────────────── -->
    <section id="booking" class="py-5 bg-dark">
        <div class="container py-5">
            <div class="row g-5">

                <!-- Left: contact info -->
                <div class="col-lg-5">
                    <h2 class="display-5 fw-bold mb-4">VISIT THE <span class="text-orange">LAB</span></h2>
                    <ul class="list-unstyled fs-5 text-light mb-5" style="font-family:'Roboto',sans-serif;">
                        <li class="mb-4 d-flex align-items-start">
                            <i class="fa-solid fa-location-dot text-orange mt-1 me-3 fs-4"></i>
                            <div>
                                <strong>NKKS Arcade</strong><br>
                                <span class="text-secondary fs-6">Brgy. Alasas, San Fernando Pampanga</span><br>
                                <span class="text-orange fs-6">
                                    <i class="fa-brands fa-waze me-1"></i> Waze: 1625 Autolab
                                </span>
                            </div>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-phone text-orange me-3"></i>
                            <span class="text-secondary">0991 940 7307</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-phone text-orange me-3"></i>
                            <span class="text-secondary">0995 258 1474</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa-solid fa-phone text-orange me-3"></i>
                            <span class="text-secondary">0956 450 0292</span>
                        </li>
                    </ul>

                    <div class="p-4 border border-secondary" style="background:var(--brand-gray);">
                        <h4 class="text-orange mb-3">
                            <i class="fa-solid fa-truck-fast me-2"></i> Home Service
                        </h4>
                        <p class="m-0 text-secondary fs-6" style="font-family:'Roboto',sans-serif;">
                            Can't make it to Pampanga? Ask about our "Visiting the South"
                            schedule for home installations.
                        </p>
                    </div>
                </div>

                <!-- Right: booking form -->
                <div class="col-lg-7">
                    <div class="p-4 p-md-5 border border-secondary" style="background:var(--brand-gray);">
                        <h3 class="fw-bold mb-4">SYSTEM INTAKE FORM</h3>

                        <form id="booking-form" novalidate>
                            @csrf
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-uppercase fw-bold">Full Name</label>
                                    <input type="text" id="f-name" class="form-control"
                                           placeholder="Juan Dela Cruz" required>
                                    <div class="invalid-feedback">Name is required.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-uppercase fw-bold">Contact Number</label>
                                    <input type="tel" id="f-phone" class="form-control"
                                           placeholder="09XX XXX XXXX" required>
                                    <div class="invalid-feedback">Phone number is required.</div>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label text-uppercase fw-bold">Email Address</label>
                                    <input type="email" id="f-email" class="form-control"
                                           placeholder="you@email.com" required>
                                    <div class="invalid-feedback">A valid email is required.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-uppercase fw-bold">Vehicle Make / Model / Year</label>
                                    <input type="text" id="f-vehicle" class="form-control"
                                           placeholder="e.g. Toyota Fortuner 2020">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-uppercase fw-bold">Service Required</label>
                                <select id="f-service" class="form-select">
                                    <option>Headlight Retrofit</option>
                                    <option>Android Headunit Installation</option>
                                    <option>Both (Retrofit + Headunit)</option>
                                    <option>Other / Inquiry</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-uppercase fw-bold">Location Preference</label>
                                <select id="f-location" class="form-select">
                                    <option value="shop">Shop Service (San Fernando, Pampanga)</option>
                                    <option value="home">Home Service (Subject to availability)</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-uppercase fw-bold">Specific Requests</label>
                                <textarea id="f-requests" class="form-control" rows="4"
                                          placeholder="Let us know what Demon Eye color you want, or specific headunit specs..."></textarea>
                            </div>
                            <button type="submit" id="booking-submit"
                                    class="btn btn-orange w-100 py-3 fs-5">
                                <span id="booking-btn-text">SUBMIT BUILD REQUEST</span>
                                <span id="booking-spinner" class="d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    SENDING...
                                </span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ─── FOOTER ──────────────────────────────────────────── -->
    <footer class="py-4 text-center text-secondary border-top border-dark" style="background:#050505;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-0 fw-bold text-uppercase" style="letter-spacing:1px;">
                &copy; {{ date('Y') }} 1625 Auto Lab.
            </p>
            <p class="mb-0 font-monospace fs-6 mt-2 mt-md-0">
                System architected by
                <a href="https://byteress.xyz" class="text-orange text-decoration-none">Bitressium</a>
            </p>
        </div>
    </footer>

    <!-- Toast container -->
    <div id="toast-container"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        /* ── Scroll-spy active link ── */
        const navLinks = document.querySelectorAll('.nav-link');
        const sections = document.querySelectorAll('section[id]');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                if (pageYOffset >= section.offsetTop - 100) {
                    current = section.getAttribute('id');
                }
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        /* ── Toast helper ── */
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast-msg toast-${type}`;
            toast.textContent = message;
            container.appendChild(toast);
            requestAnimationFrame(() => {
                requestAnimationFrame(() => toast.classList.add('show'));
            });
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 350);
            }, 4000);
        }

        /* ── Booking form submission ── */
        document.getElementById('booking-form').addEventListener('submit', async function (e) {
            e.preventDefault();

            const name     = document.getElementById('f-name').value.trim();
            const phone    = document.getElementById('f-phone').value.trim();
            const email    = document.getElementById('f-email').value.trim();
            const vehicle  = document.getElementById('f-vehicle').value.trim();
            const service  = document.getElementById('f-service').value;
            const location = document.getElementById('f-location').value;
            const requests = document.getElementById('f-requests').value.trim();

            /* Basic client-side validation */
            let valid = true;
            [['f-name', name], ['f-phone', phone], ['f-email', email]].forEach(([id, val]) => {
                const el = document.getElementById(id);
                if (!val || (id === 'f-email' && !/\S+@\S+\.\S+/.test(val))) {
                    el.classList.add('is-invalid');
                    valid = false;
                } else {
                    el.classList.remove('is-invalid');
                }
            });
            if (!valid) return;

            /* Loading state */
            const btn     = document.getElementById('booking-submit');
            const btnText = document.getElementById('booking-btn-text');
            const spinner = document.getElementById('booking-spinner');
            btn.disabled  = true;
            btnText.classList.add('d-none');
            spinner.classList.remove('d-none');

            try {
                const res = await fetch('/api/book', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ name, phone, email, vehicle, service, location, requests }),
                });

                if (!res.ok) {
                    const data = await res.json().catch(() => ({}));
                    throw new Error(data.message || 'Something went wrong.');
                }

                showToast('Build request received! We\'ll be in touch.', 'success');
                this.reset();
            } catch (err) {
                showToast(err.message || 'Failed to send. Please try again.', 'error');
            } finally {
                btn.disabled = false;
                btnText.classList.remove('d-none');
                spinner.classList.add('d-none');
            }
        });
    </script>
</body>
</html>
