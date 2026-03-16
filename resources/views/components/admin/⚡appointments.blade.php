<?php

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;


#[Layout('components.layouts.admin')]
new class extends Component {
    use WithPagination;

    public string $search  = '';
    public string $status  = '';
    public ?int   $editing = null;
    public string $editStatus = '';

    public function updatedSearch(): void  { $this->resetPage(); }
    public function updatedStatus(): void  { $this->resetPage(); }

    public function startEdit(int $id): void
    {
        $this->editing    = $id;
        $this->editStatus = Appointment::findOrFail($id)->status;
    }

    public function saveStatus(): void
    {
        Appointment::findOrFail($this->editing)->update(['status' => $this->editStatus]);
        $this->editing = null;
    }

    public function delete(int $id): void
    {
        Appointment::findOrFail($id)->delete();
    }

    public function render()
    {
        $appointments = Appointment::with('service')
            ->when($this->search, fn($q) =>
                $q->where('customer_name', 'like', "%{$this->search}%")
                  ->orWhere('customer_email', 'like', "%{$this->search}%")
            )
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->latest()
            ->paginate(15);

        return view(self::class->getName(), compact('appointments'));
    }
};
?>

<div>
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h1 class="admin-page-title mb-0">Appointments</h1>
    </div>

    {{-- ─── Filters ────────────────────────────────────────── --}}
    <div class="card border-0 shadow-sm mb-3 p-3">
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search by name or email…"
                       wire:model.live.debounce.300ms="search">
            </div>
            <div class="col-md-3">
                <select class="form-select" wire:model.live="status">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="done">Done</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
    </div>

    {{-- ─── Table ──────────────────────────────────────────── --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Date & Time</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appt)
                            <tr>
                                <td class="text-muted small">{{ $appt->id }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $appt->customer_name }}</div>
                                    <small class="text-muted">{{ $appt->customer_email }}</small>
                                </td>
                                <td>{{ $appt->service?->name ?? '—' }}</td>
                                <td>
                                    {{ $appt->appointment_date->format('M d, Y') }}<br>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($appt->appointment_time)->format('g:i A') }}
                                    </small>
                                </td>
                                <td>{{ $appt->customer_phone }}</td>
                                <td>
                                    @if($editing === $appt->id)
                                        <select class="form-select form-select-sm" wire:model="editStatus">
                                            <option value="pending">Pending</option>
                                            <option value="confirmed">Confirmed</option>
                                            <option value="done">Done</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    @else
                                        <span class="badge badge-status-{{ $appt->status }} px-2 py-1 rounded">
                                            {{ ucfirst($appt->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($editing === $appt->id)
                                        <button class="btn btn-success btn-sm me-1" wire:click="saveStatus">✔</button>
                                        <button class="btn btn-secondary btn-sm" wire:click="$set('editing', null)">✕</button>
                                    @else
                                        <button class="btn btn-outline-secondary btn-sm me-1"
                                                wire:click="startEdit({{ $appt->id }})">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm"
                                                wire:click="delete({{ $appt->id }})"
                                                wire:confirm="Delete this appointment?">Del</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($appointments->hasPages())
            <div class="card-footer bg-white">
                {{ $appointments->links() }}
            </div>
        @endif
    </div>
</div>
