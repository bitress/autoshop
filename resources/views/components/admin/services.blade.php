<?php

use App\Models\Service;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Component;


new #[Layout('components.layouts.admin')] class extends Component {
    public $services;
    public bool   $showForm = false;
    public ?int   $editId   = null;

    #[Validate('required|string|max:100')]
    public string $name = '';

    #[Validate('nullable|string|max:500')]
    public string $description = '';

    #[Validate('nullable|string|max:50')]
    public string $price = '';

    #[Validate('nullable|string|max:50')]
    public string $duration = '';

    #[Validate('required|string|max:10')]
    public string $icon = '🔧';

    #[Validate('boolean')]
    public bool $is_active = true;

    public function mount(): void
    {
        $this->refreshServices();
    }

    public function refreshServices(): void
    {
        $this->services = Service::orderBy('name')->get();
    }

    public function openCreate(): void
    {
        $this->resetForm();
        $this->showForm = true;
        $this->editId   = null;
    }

    public function openEdit(int $id): void
    {
        $svc = Service::findOrFail($id);
        $this->editId      = $id;
        $this->name        = $svc->name;
        $this->description = $svc->description ?? '';
        $this->price       = $svc->price ?? '';
        $this->duration    = $svc->duration ?? '';
        $this->icon        = $svc->icon;
        $this->is_active   = $svc->is_active;
        $this->showForm    = true;
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name'        => $this->name,
            'description' => $this->description ?: null,
            'price'       => $this->price ?: null,
            'duration'    => $this->duration ?: null,
            'icon'        => $this->icon,
            'is_active'   => $this->is_active,
        ];

        if ($this->editId) {
            Service::findOrFail($this->editId)->update($data);
        } else {
            Service::create($data);
        }

        $this->showForm = false;
        $this->resetForm();
        $this->refreshServices();
    }

    public function delete(int $id): void
    {
        Service::findOrFail($id)->delete();
        $this->refreshServices();
    }

    public function cancel(): void
    {
        $this->showForm = false;
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->editId      = null;
        $this->name        = '';
        $this->description = '';
        $this->price       = '';
        $this->duration    = '';
        $this->icon        = '🔧';
        $this->is_active   = true;
    }
};
?>

<div>
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h1 class="admin-page-title mb-0">Services</h1>
        <button class="btn btn-danger" wire:click="openCreate">+ Add Service</button>
    </div>

    @if($showForm)
        <div class="card border-0 shadow-sm mb-4 p-4">
            <h5 class="fw-bold mb-3">{{ $editId ? 'Edit Service' : 'New Service' }}</h5>
            <form wire:submit="save">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               wire:model="name">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Icon</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror"
                               wire:model="icon" maxlength="10">
                        @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" wire:model="price" placeholder="e.g. $39.99">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Duration</label>
                        <input type="text" class="form-control" wire:model="duration" placeholder="e.g. 1 hr">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" wire:model="description" rows="2"></textarea>
                    </div>
                    <div class="col-12 d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" wire:model="is_active" id="is_active">
                        <label class="form-check-label" for="is_active">Active (visible on site)</label>
                    </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-danger">
                        {{ $editId ? 'Update' : 'Create' }} Service
                    </button>
                    <button type="button" class="btn btn-secondary" wire:click="cancel">Cancel</button>
                </div>
            </form>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table mb-0">
                    <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $svc)
                            <tr>
                                <td class="fs-5">{{ $svc->icon }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $svc->name }}</div>
                                    <small class="text-muted">{{ Str::limit($svc->description, 60) }}</small>
                                </td>
                                <td>{{ $svc->price ?? '—' }}</td>
                                <td>{{ $svc->duration ?? '—' }}</td>
                                <td>
                                    @if($svc->is_active)
                                        <span class="badge badge-status-confirmed px-2 py-1 rounded">Active</span>
                                    @else
                                        <span class="badge badge-status-cancelled px-2 py-1 rounded">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-outline-secondary btn-sm me-1"
                                            wire:click="openEdit({{ $svc->id }})">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm"
                                            wire:click="delete({{ $svc->id }})"
                                            wire:confirm="Delete '{{ $svc->name }}'?">Del</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No services yet. Add one!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
