<?php

use App\Models\Service;
use App\Models\TeamMember;
use Livewire\Component;
use function Livewire\Volt\layout;

layout('components.layouts.client');

new class extends Component {
    public $featuredServices;
    public $teamMembers;

    public function mount(): void
    {
        $this->featuredServices = Service::active()->take(6)->get();
        $this->teamMembers      = TeamMember::active()->take(4)->get();
    }
};
?>

<div>

    {{-- ─── Hero ──────────────────────────────────────────── --}}
    <section class="hero-section">
        <div class="container position-relative">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <p class="text-accent fw-semibold mb-2 text-uppercase small">Professional Auto Care</p>
                    <h1 class="hero-title mb-3">
                        Your Car Deserves<br>
                        <span>Expert Hands.</span>
                    </h1>
                    <p class="hero-subtitle mb-4">
                        1625 AutoLab delivers honest, high-quality automotive service.
                        From oil changes to full engine diagnostics — we keep you on the road.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('client.booking') }}" class="btn btn-hero-primary">
                            📅 Book Appointment
                        </a>
                        <a href="{{ route('client.services') }}" class="btn btn-hero-secondary">
                            View Services
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 text-center d-none d-lg-block">
                    <div style="font-size:9rem;line-height:1;opacity:.18;">🚗</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Stats Bar ──────────────────────────────────────── --}}
    <section class="stats-bar">
        <div class="container">
            <div class="row text-center gy-3">
                <div class="col-6 col-md-3">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">5K+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">ASE</div>
                    <div class="stat-label">Certified Techs</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">6</div>
                    <div class="stat-label">Days a Week</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Services Preview ───────────────────────────────── --}}
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-2">
                <div>
                    <h2 class="section-title mb-1">Our Services</h2>
                    <p class="text-muted">Quality work at fair prices — no surprises.</p>
                </div>
                <a href="{{ route('client.services') }}" class="btn btn-outline-danger btn-sm">
                    View All Services →
                </a>
            </div>

            @if($featuredServices->isEmpty())
                <div class="text-center py-5 text-muted">
                    <div style="font-size:4rem">🔧</div>
                    <p class="mt-2">Services coming soon. Check back shortly!</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($featuredServices as $service)
                        <div class="col-md-6 col-lg-4">
                            <div class="card service-card p-4">
                                <div class="card-icon">{{ $service->icon }}</div>
                                <h5 class="card-title">{{ $service->name }}</h5>
                                <p class="text-muted small flex-grow-1">{{ $service->description }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    @if($service->price)
                                        <span class="badge-price">{{ $service->price }}</span>
                                    @endif
                                    @if($service->duration)
                                        <small class="text-muted">⏱ {{ $service->duration }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ─── Booking CTA ────────────────────────────────────── --}}
    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-2">Ready to Schedule Your Visit?</h2>
            <p class="text-white-50 mb-4">Book your appointment online — quick, easy, and no phone calls needed.</p>
            <a href="{{ route('client.booking') }}" class="btn btn-hero-primary btn-lg px-5">
                📅 Book Appointment Now
            </a>
        </div>
    </section>

    {{-- ─── Team Preview ───────────────────────────────────── --}}
    @if($teamMembers->isNotEmpty())
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title text-center">Meet the Team</h2>
                <p class="text-muted">Skilled professionals who take pride in their work.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($teamMembers as $member)
                    <div class="col-sm-6 col-lg-3">
                        <div class="card team-card p-4">
                            <div class="avatar-placeholder mx-auto">
                                {{ strtoupper(substr($member->name, 0, 1)) }}
                            </div>
                            <div class="member-name">{{ $member->name }}</div>
                            <div class="member-role">{{ $member->role }}</div>
                            @if($member->bio)
                                <p class="text-muted small mt-2 mb-0">{{ $member->bio }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('client.team') }}" class="btn btn-outline-danger btn-sm">
                    Meet the Full Team →
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- ─── Facebook Feed ──────────────────────────────────── --}}
    <section class="py-5 facebook-feed-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title text-center">Follow Us on Facebook</h2>
                <p class="text-muted">Stay up to date with our latest offers and updates.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="fb-feed-placeholder p-5 text-center">
                        <div class="fb-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#1877f2" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </div>
                        <h5 class="mt-3 fw-bold text-dark">1625 AutoLab</h5>
                        <p class="text-muted small mb-3">Follow our Facebook page for promotions, tips, and updates!</p>
                        <a href="https://www.facebook.com/1625autolab"
                           target="_blank" rel="noopener noreferrer"
                           class="btn btn-primary">
                            Visit Facebook Page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
