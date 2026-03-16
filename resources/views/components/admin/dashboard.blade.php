<?php

use App\Models\Appointment;
use App\Models\Service;
use App\Models\TeamMember;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('components.layouts.admin')] class extends Component {
    public int $totalAppointments;
    public int $pendingAppointments;
    public int $totalServices;
    public int $totalTeamMembers;
    public $recentAppointments;

    public function mount(): void
    {
        $this->totalAppointments   = Appointment::count();
        $this->pendingAppointments = Appointment::pending()->count();
        $this->totalServices       = Service::active()->count();
        $this->totalTeamMembers    = TeamMember::active()->count();
        $this->recentAppointments  = Appointment::with('service')
            ->latest()
            ->take(5)
            ->get();
    }
};
?>

<div>
    <h1 class="admin-page-title">Dashboard</h1>

    {{-- ─── Stats ──────────────────────────────────────────── --}}
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="small text-muted fw-semibold mb-1">Total Appointments</div>
                        <div class="fs-3 fw-bold">{{ $totalAppointments }}</div>
                    </div>
                    <div class="stat-icon stat-icon-blue">📅</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="small text-muted fw-semibold mb-1">Pending</div>
                        <div class="fs-3 fw-bold text-warning">{{ $pendingAppointments }}</div>
                    </div>
                    <div class="stat-icon stat-icon-amber">⏳</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="small text-muted fw-semibold mb-1">Active Services</div>
                        <div class="fs-3 fw-bold">{{ $totalServices }}</div>
                    </div>
                    <div class="stat-icon stat-icon-red">🔧</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="small text-muted fw-semibold mb-1">Team Members</div>
                        <div class="fs-3 fw-bold">{{ $totalTeamMembers }}</div>
                    </div>
                    <div class="stat-icon stat-icon-green">👥</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ─── Recent Appointments ────────────────────────────── --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-bold py-3 d-flex justify-content-between align-items-center">
            Recent Appointments
            <a href="{{ route('admin.appointments') }}" class="btn btn-outline-danger btn-sm">View All</a>
        </div>
        <div class="card-body p-0">
            @if($recentAppointments->isEmpty())
                <div class="text-center py-5 text-muted">No appointments yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table admin-table mb-0">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentAppointments as $appt)
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $appt->customer_name }}</div>
                                        <small class="text-muted">{{ $appt->customer_email }}</small>
                                    </td>
                                    <td>{{ $appt->service?->name ?? '—' }}</td>
                                    <td>{{ $appt->appointment_date->format('M d, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appt->appointment_time)->format('g:i A') }}</td>
                                    <td>
                                        <span class="badge badge-status-{{ $appt->status }} px-2 py-1 rounded">
                                            {{ ucfirst($appt->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
