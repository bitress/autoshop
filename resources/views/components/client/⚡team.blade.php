<?php

use App\Models\TeamMember;
use Livewire\Component;
use function Livewire\Volt\layout;

layout('components.layouts.client');

new class extends Component {
    public $members;

    public function mount(): void
    {
        $this->members = TeamMember::active()->get();
    }
};
?>

<div>

    {{-- ─── Page Header ────────────────────────────────────── --}}
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <h1 class="fw-bold mb-1">Our Team</h1>
            <p class="text-white-50 mb-0">The skilled professionals who keep your vehicle running its best.</p>
        </div>
    </section>

    {{-- ─── Team Grid ──────────────────────────────────────── --}}
    <section class="py-5">
        <div class="container">
            @if($members->isEmpty())
                <div class="text-center py-5 text-muted">
                    <div style="font-size:4rem">👥</div>
                    <p class="mt-2">Team profiles coming soon!</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($members as $member)
                        <div class="col-sm-6 col-lg-3">
                            <div class="card team-card p-4 h-100">
                                @if($member->photo)
                                    <img src="{{ asset('storage/' . $member->photo) }}"
                                         alt="{{ $member->name }}" class="avatar mx-auto">
                                @else
                                    <div class="avatar-placeholder mx-auto">
                                        {{ strtoupper(substr($member->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="member-name">{{ $member->name }}</div>
                                <div class="member-role">{{ $member->role }}</div>
                                @if($member->bio)
                                    <p class="text-muted small mt-2 mb-0">{{ $member->bio }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- ─── Join CTA ───────────────────────────────────────── --}}
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h3 class="fw-bold mb-2">Join Our Team</h3>
            <p class="text-muted mb-3">We're always looking for passionate automotive professionals to join the 1625 AutoLab family.</p>
            <a href="mailto:careers@1625autolab.com" class="btn btn-danger px-4">Apply Now</a>
        </div>
    </section>

</div>
