<?php

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('components.layouts.client')] class extends Component {
    public $services;

    public function mount(): void
    {
        $this->services = Service::active()->orderBy('name')->get();
    }
};
?>

<div>

    {{-- ─── Page Header ────────────────────────────────────── --}}
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <h1 class="fw-bold mb-1">Our Services</h1>
            <p class="text-white-50 mb-0">Comprehensive automotive care — all under one roof.</p>
        </div>
    </section>

    {{-- ─── Services Grid ──────────────────────────────────── --}}
    <section class="py-5">
        <div class="container">
            @if($services->isEmpty())
                <div class="text-center py-5 text-muted">
                    <div style="font-size:4rem">🔧</div>
                    <p class="mt-2">Our service list is being updated. Check back soon!</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($services as $service)
                        <div class="col-md-6 col-lg-4">
                            <div class="card service-card p-4 h-100 d-flex flex-column">
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
                                <a href="{{ route('client.booking') }}"
                                   class="btn btn-outline-danger btn-sm mt-3 w-100">
                                    Book This Service
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ─── CTA ────────────────────────────────────────────── --}}
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h3 class="fw-bold mb-2">Don't see what you need?</h3>
            <p class="text-muted mb-3">Call us or stop by and we'll take a look. We handle all makes and models.</p>
            <a href="{{ route('client.booking') }}" class="btn btn-danger px-4">Book a Custom Appointment</a>
        </div>
    </section>

</div>
