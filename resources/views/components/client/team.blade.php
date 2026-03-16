<?php

use App\Models\TeamMember;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('components.layouts.client')] class extends Component {
    public $members;

    public function mount(): void
    {
        $this->members = TeamMember::active()->get();
    }
};
?>

<div>
    {{-- Page Header --}}
    <div class="page-header text-white">
        <div class="container">
            <p class="text-orange mb-1 fw-bold small" style="letter-spacing:2px;font-family:'Oswald',sans-serif;">THE CREW</p>
            <h1 class="display-5 fw-bold mb-0">OUR <span class="text-orange">TEAM</span></h1>
        </div>
    </div>

    <section class="py-5 bg-asphalt">
        <div class="container py-3">
            @if($members->isEmpty())
                <div class="text-center py-5 text-secondary">
                    <i class="fa-solid fa-users fa-3x text-orange mb-3"></i>
                    <p class="fs-5">Team profiles coming soon!</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($members as $member)
                        <div class="col-sm-6 col-lg-3">
                            <div class="h-100 p-4 text-center border border-dark"
                                 style="background:var(--brand-gray);transition:transform .3s,border-color .3s;"
                                 onmouseover="this.style.transform='translateY(-6px)';this.style.borderColor='var(--brand-orange)'"
                                 onmouseout="this.style.transform='';this.style.borderColor=''">
                                <div class="mx-auto mb-3 d-flex align-items-center justify-content-center fw-bold"
                                     style="width:80px;height:80px;border-radius:50%;background:var(--brand-orange);color:#fff;font-size:2rem;font-family:'Oswald',sans-serif;">
                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                </div>
                                <h5 class="fw-bold text-white mb-1">{{ $member->name }}</h5>
                                <p class="text-orange small mb-2 fw-bold" style="letter-spacing:1px;">{{ $member->role }}</p>
                                @if($member->bio)
                                    <p class="text-secondary small mb-0" style="font-family:'Roboto',sans-serif;">{{ $member->bio }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5">
                <h4 class="fw-bold text-white mb-3">JOIN THE LAB</h4>
                <p class="text-secondary mb-4" style="font-family:'Roboto',sans-serif;">
                    We're always looking for passionate automotive professionals to join the 1625 AutoLab family.
                </p>
                <a href="mailto:careers@1625autolab.com" class="btn btn-orange px-5 py-3">Apply Now</a>
            </div>
        </div>
    </section>
</div>
