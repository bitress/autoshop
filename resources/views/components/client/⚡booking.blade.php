<?php

use App\Models\Appointment;
use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layouts.client')]
new class extends Component {
    public $services;
    public bool $submitted = false;

    #[Validate('required|string|max:100')]
    public string $customer_name = '';

    #[Validate('required|email|max:150')]
    public string $customer_email = '';

    #[Validate('required|string|max:30')]
    public string $customer_phone = '';

    #[Validate('nullable|exists:services,id')]
    public ?int $service_id = null;

    #[Validate('required|date|after_or_equal:today')]
    public string $appointment_date = '';

    #[Validate('required')]
    public string $appointment_time = '';

    #[Validate('nullable|string|max:500')]
    public string $notes = '';

    public function mount(): void
    {
        $this->services = Service::active()->orderBy('name')->get();
    }

    public function submit(): void
    {
        $this->validate();

        Appointment::create([
            'customer_name'    => $this->customer_name,
            'customer_email'   => $this->customer_email,
            'customer_phone'   => $this->customer_phone,
            'service_id'       => $this->service_id ?: null,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'notes'            => $this->notes ?: null,
            'status'           => 'pending',
        ]);

        $this->submitted = true;
        $this->reset(['customer_name','customer_email','customer_phone','service_id',
                       'appointment_date','appointment_time','notes']);
    }
};
?>

<div>

    {{-- ─── Page Header ────────────────────────────────────── --}}
    <section class="py-5 bg-dark text-white">
        <div class="container">
            <h1 class="fw-bold mb-1">Book an Appointment</h1>
            <p class="text-white-50 mb-0">Fill out the form below and we'll confirm your slot via email.</p>
        </div>
    </section>

    {{-- ─── Booking Form ───────────────────────────────────── --}}
    <section class="booking-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    @if($submitted)
                        <div class="alert alert-autoshop-success p-4 text-center mb-4">
                            <div style="font-size:2.5rem">✅</div>
                            <h5 class="fw-bold mt-2">Appointment Request Received!</h5>
                            <p class="mb-3">Thank you! We've received your booking request and will confirm via email shortly.</p>
                            <button class="btn btn-danger btn-sm" wire:click="$set('submitted', false)">
                                Book Another Appointment
                            </button>
                        </div>
                    @endif

                    <div class="card booking-card">
                        <div class="card-header">📅 Appointment Details</div>
                        <div class="card-body p-4">
                            <form wire:submit="submit" novalidate>

                                <h6 class="fw-bold mb-3 text-muted text-uppercase small">Your Information</h6>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror"
                                               wire:model="customer_name" placeholder="e.g. John Doe">
                                        @error('customer_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('customer_email') is-invalid @enderror"
                                               wire:model="customer_email" placeholder="you@email.com">
                                        @error('customer_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('customer_phone') is-invalid @enderror"
                                               wire:model="customer_phone" placeholder="(555) 000-0000">
                                        @error('customer_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-3">

                                <h6 class="fw-bold mb-3 text-muted text-uppercase small">Service & Schedule</h6>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <label class="form-label">Service</label>
                                        <select class="form-select @error('service_id') is-invalid @enderror"
                                                wire:model="service_id">
                                            <option value="">— Select a service (optional) —</option>
                                            @foreach($services as $svc)
                                                <option value="{{ $svc->id }}">
                                                    {{ $svc->icon }} {{ $svc->name }}
                                                    @if($svc->price) ({{ $svc->price }}) @endif
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Preferred Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('appointment_date') is-invalid @enderror"
                                               wire:model="appointment_date" min="{{ date('Y-m-d') }}">
                                        @error('appointment_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Preferred Time <span class="text-danger">*</span></label>
                                        <select class="form-select @error('appointment_time') is-invalid @enderror"
                                                wire:model="appointment_time">
                                            <option value="">— Select time —</option>
                                            <option value="08:00">8:00 AM</option>
                                            <option value="09:00">9:00 AM</option>
                                            <option value="10:00">10:00 AM</option>
                                            <option value="11:00">11:00 AM</option>
                                            <option value="13:00">1:00 PM</option>
                                            <option value="14:00">2:00 PM</option>
                                            <option value="15:00">3:00 PM</option>
                                            <option value="16:00">4:00 PM</option>
                                        </select>
                                        @error('appointment_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Additional Notes</label>
                                    <textarea class="form-control @error('notes') is-invalid @enderror"
                                              wire:model="notes" rows="3"
                                              placeholder="Describe your issue or any other details..."></textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn-submit-booking" wire:loading.attr="disabled">
                                    <span wire:loading.remove>📅 Submit Appointment Request</span>
                                    <span wire:loading>Processing…</span>
                                </button>

                            </form>
                        </div>
                    </div>

                </div>

                {{-- Sidebar Info --}}
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm p-4 mb-3">
                        <h6 class="fw-bold mb-3">📍 Location & Hours</h6>
                        <p class="small text-muted mb-1">1625 Auto Lab Drive</p>
                        <hr class="my-2">
                        <p class="small mb-1"><strong>Mon–Fri:</strong> 8:00 AM – 6:00 PM</p>
                        <p class="small mb-1"><strong>Saturday:</strong> 9:00 AM – 4:00 PM</p>
                        <p class="small mb-0"><strong>Sunday:</strong> Closed</p>
                    </div>
                    <div class="card border-0 shadow-sm p-4">
                        <h6 class="fw-bold mb-3">📞 Contact Us</h6>
                        <p class="small text-muted mb-1">(555) 162-5000</p>
                        <p class="small text-muted mb-0">info@1625autolab.com</p>
                        <a href="https://www.facebook.com/1625autolab" target="_blank"
                           rel="noopener noreferrer" class="small text-primary d-block mt-2">
                            Facebook Page ↗
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
