<?php

use App\Models\Appointment;
use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('components.layouts.shell')] class extends Component {
    public bool $submitted = false;

    #[Validate('required|string|max:100')]
    public string $customer_name = '';

    #[Validate('required|email|max:150')]
    public string $customer_email = '';

    #[Validate('required|string|max:30')]
    public string $customer_phone = '';

    #[Validate('nullable|string|max:150')]
    public string $vehicle = '';

    #[Validate('required|string|max:100')]
    public string $service_type = 'Headlight Retrofit';

    #[Validate('required|string|max:80')]
    public string $location_preference = 'Shop Service (San Fernando, Pampanga)';

    #[Validate('nullable|string|max:600')]
    public string $notes = '';

    public function submit(): void
    {
        $this->validate();

        Appointment::create([
            'customer_name'       => $this->customer_name,
            'customer_email'      => $this->customer_email,
            'customer_phone'      => $this->customer_phone,
            'vehicle'             => $this->vehicle ?: null,
            'location_preference' => $this->location_preference,
            'appointment_date'    => now()->addDay()->format('Y-m-d'),
            'appointment_time'    => '09:00',
            'notes'               => trim("Service: {$this->service_type}\n{$this->notes}"),
            'status'              => 'pending',
        ]);

        $this->submitted = true;
        $this->reset(['customer_name','customer_email','customer_phone',
                       'vehicle','notes']);
    }
};
?>

<div>

    {{-- ============================================================
         NAVBAR
    ============================================================ --}}
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top" id="navbarNav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                1625 <span class="text-orange">AUTOLAB</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavCollapse">
                <i class="fa-solid fa-bars text-orange fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavCollapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#services">The Lab</a></li>
                    <li class="nav-item"><a class="nav-link" href="#promo">Promos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#work">Recent Builds</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('client.team') }}">Team</a></li>
                    <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                        <a class="btn btn-orange px-4 py-2" href="#booking">Book A Bay</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ============================================================
         HERO
    ============================================================ --}}
    <section class="hero bg-asphalt">
        <div class="container text-center text-md-start mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="d-inline-block px-3 py-1 mb-3 border border-orange text-orange"
                         style="background:rgba(234,88,12,.1);font-family:'Oswald';letter-spacing:2px;font-size:.85rem;">
                        PAMPANGA'S PREMIER RETROFITTERS
                    </div>
                    <h1 class="display-2 fw-bold mb-4">
                        FRUSTRATED WITH <br><span class="text-orange">OUTDATED</span> TECH?
                    </h1>
                    <p class="lead text-light mb-5 fs-4" style="max-width:600px;font-family:'Roboto',sans-serif;">
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

    {{-- ============================================================
         SERVICES
    ============================================================ --}}
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

    {{-- ============================================================
         PROMO
    ============================================================ --}}
    <section id="promo" class="py-5" style="background-color:#050505;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="promo-banner p-5 text-center">
                        <h2 class="display-4 fw-bold text-white mb-3">
                            FREE <span class="text-orange">DEMON EYES!</span>
                        </h2>
                        <p class="fs-4 text-light mb-4" style="font-family:'Roboto',sans-serif;">
                            Get FREE Demon Eyes (Purple, Amber, Blue, Ice Blue, or White) with every Headlight Retrofit package.
                        </p>
                        <a href="#booking" class="btn btn-orange btn-lg px-5">Claim Offer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         RECENT BUILDS
    ============================================================ --}}
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
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600705591462-80ba4e851d7e?q=80&w=600&auto=format&fit=crop"
                             class="build-img" alt="Headlight retrofit">
                    </div>
                    <p class="build-caption">&gt; Ice Blue Demon Eyes. Clean cutoff. 💯</p>
                </div>
                <div class="col-md-4">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1544829728-e5cb9eedc20e?q=80&w=600&auto=format&fit=crop"
                             class="build-img" alt="Android headunit">
                    </div>
                    <p class="build-caption">&gt; Android Headunit fitted. Wireless Carplay active. 🚀</p>
                </div>
                <div class="col-md-4">
                    <div class="overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=600&auto=format&fit=crop"
                             class="build-img" alt="Car delivery">
                    </div>
                    <p class="build-caption">&gt; DRL and Foglights aligned. Ready for delivery. 🔧</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================================
         BOOKING (Livewire powered)
    ============================================================ --}}
    <section id="booking" class="py-5 bg-dark">
        <div class="container py-5">
            <div class="row g-5">

                {{-- Contact info --}}
                <div class="col-lg-5">
                    <h2 class="display-5 fw-bold mb-4">VISIT THE <span class="text-orange">LAB</span></h2>
                    <ul class="list-unstyled fs-5 text-light mb-5" style="font-family:'Roboto',sans-serif;">
                        <li class="mb-4 d-flex align-items-start">
                            <i class="fa-solid fa-location-dot text-orange mt-1 me-3 fs-4"></i>
                            <div>
                                <strong>NKKS Arcade</strong><br>
                                <span class="text-secondary fs-6">Brgy. Alasas, San Fernando Pampanga</span><br>
                                <span class="text-orange fs-6"><i class="fa-brands fa-waze me-1"></i> Waze: 1625 Autolab</span>
                            </div>
                        </li>
                        <li class="mb-2"><i class="fa-solid fa-phone text-orange me-3"></i> <span class="text-secondary">0991 940 7307</span></li>
                        <li class="mb-2"><i class="fa-solid fa-phone text-orange me-3"></i> <span class="text-secondary">0995 258 1474</span></li>
                        <li class="mb-2"><i class="fa-solid fa-phone text-orange me-3"></i> <span class="text-secondary">0956 450 0292</span></li>
                    </ul>

                    <div class="p-4 border border-secondary" style="background:var(--brand-gray);">
                        <h4 class="text-orange mb-3"><i class="fa-solid fa-truck-fast me-2"></i>Home Service</h4>
                        <p class="m-0 text-secondary fs-6" style="font-family:'Roboto',sans-serif;">
                            Can't make it to Pampanga? Ask about our "Visiting the South" schedule for home installations.
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="https://www.facebook.com/1625autolab" target="_blank" rel="noopener noreferrer"
                           class="btn btn-outline-steel w-100 py-3">
                            <i class="fa-brands fa-facebook me-2"></i>Message Us on Facebook
                        </a>
                    </div>
                </div>

                {{-- Booking form --}}
                <div class="col-lg-7">
                    <div class="p-4 p-md-5 border border-secondary" style="background:var(--brand-gray);">

                        @if($submitted)
                            <div class="text-center py-4">
                                <i class="fa-solid fa-circle-check text-orange" style="font-size:3.5rem;"></i>
                                <h3 class="fw-bold mt-3 mb-2">BUILD REQUEST RECEIVED!</h3>
                                <p class="text-secondary mb-4" style="font-family:'Roboto',sans-serif;">
                                    We've logged your request. Our team will reach out via your contact details to confirm your slot.
                                </p>
                                <button class="btn btn-outline-steel px-4" wire:click="$set('submitted', false)">
                                    Submit Another Request
                                </button>
                            </div>
                        @else
                            <h3 class="fw-bold mb-4">SYSTEM INTAKE FORM</h3>

                            <form wire:submit="submit" novalidate>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name <span class="text-orange">*</span></label>
                                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                               wire:model="customer_name" placeholder="Juan Dela Cruz">
                                        @error('customer_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Contact Number <span class="text-orange">*</span></label>
                                        <input type="tel" class="form-control @error('customer_phone') is-invalid @enderror"
                                               wire:model="customer_phone" placeholder="09XX XXX XXXX">
                                        @error('customer_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email Address <span class="text-orange">*</span></label>
                                        <input type="email" class="form-control @error('customer_email') is-invalid @enderror"
                                               wire:model="customer_email" placeholder="you@email.com">
                                        @error('customer_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Vehicle Make / Model / Year</label>
                                        <input type="text" class="form-control @error('vehicle') is-invalid @enderror"
                                               wire:model="vehicle" placeholder="e.g. Toyota Fortuner 2020">
                                        @error('vehicle')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Service Required <span class="text-orange">*</span></label>
                                        <select class="form-select @error('service_type') is-invalid @enderror"
                                                wire:model="service_type">
                                            <option>Headlight Retrofit</option>
                                            <option>Android Headunit Installation</option>
                                            <option>Both (Retrofit + Headunit)</option>
                                            <option>Other / Inquiry</option>
                                        </select>
                                        @error('service_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Location Preference <span class="text-orange">*</span></label>
                                        <select class="form-select @error('location_preference') is-invalid @enderror"
                                                wire:model="location_preference">
                                            <option>Shop Service (San Fernando, Pampanga)</option>
                                            <option>Home Service (Subject to availability)</option>
                                        </select>
                                        @error('location_preference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Specific Requests</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                              wire:model="notes" rows="4"
                                              placeholder="Let us know what Demon Eye color you want, or specific headunit specs..."></textarea>
                                    @error('notes')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <button type="submit" class="btn btn-orange w-100 py-3 fs-5"
                                        wire:loading.attr="disabled">
                                    <span wire:loading.remove>SUBMIT BUILD REQUEST</span>
                                    <span wire:loading>
                                        <i class="fa-solid fa-spinner fa-spin me-1"></i> Processing…
                                    </span>
                                </button>
                            </form>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ============================================================
         FOOTER
    ============================================================ --}}
    <footer class="site-footer py-4 text-center">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-0 fw-bold text-uppercase" style="letter-spacing:1px;">&copy; {{ date('Y') }} 1625 Auto Lab.</p>
            <p class="mb-0 font-monospace fs-6 mt-2 mt-md-0">
                System architected by <a href="https://byteress.xyz" target="_blank" rel="noopener noreferrer">Bitressium</a>
            </p>
        </div>
    </footer>

    {{-- Active nav on scroll --}}
    <script>
    document.addEventListener('livewire:init', () => {
        const navLinks = document.querySelectorAll('#navbarNavCollapse .nav-link');
        const sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(s => { if (window.pageYOffset >= s.offsetTop - 120) current = s.id; });
            navLinks.forEach(l => {
                l.classList.remove('active');
                if (l.getAttribute('href') && l.getAttribute('href') === '#' + current) l.classList.add('active');
            });
        });
    });
    </script>

</div>
