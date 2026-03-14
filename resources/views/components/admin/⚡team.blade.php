<?php

use App\Models\TeamMember;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function Livewire\Volt\layout;
use function Livewire\Volt\title;

layout('components.layouts.admin');
title('Team – Admin');

new class extends Component {
    public $members;
    public bool   $showForm = false;
    public ?int   $editId   = null;

    #[Validate('required|string|max:100')]
    public string $name = '';

    #[Validate('required|string|max:100')]
    public string $role = '';

    #[Validate('nullable|string|max:500')]
    public string $bio = '';

    #[Validate('integer|min:0')]
    public int $order = 0;

    #[Validate('boolean')]
    public bool $is_active = true;

    public function mount(): void
    {
        $this->refreshMembers();
    }

    public function refreshMembers(): void
    {
        $this->members = TeamMember::orderBy('order')->orderBy('name')->get();
    }

    public function openCreate(): void
    {
        $this->resetForm();
        $this->showForm = true;
        $this->editId   = null;
    }

    public function openEdit(int $id): void
    {
        $m = TeamMember::findOrFail($id);
        $this->editId    = $id;
        $this->name      = $m->name;
        $this->role      = $m->role;
        $this->bio       = $m->bio ?? '';
        $this->order     = $m->order;
        $this->is_active = $m->is_active;
        $this->showForm  = true;
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'name'      => $this->name,
            'role'      => $this->role,
            'bio'       => $this->bio ?: null,
            'order'     => $this->order,
            'is_active' => $this->is_active,
        ];

        if ($this->editId) {
            TeamMember::findOrFail($this->editId)->update($data);
        } else {
            TeamMember::create($data);
        }

        $this->showForm = false;
        $this->resetForm();
        $this->refreshMembers();
    }

    public function delete(int $id): void
    {
        TeamMember::findOrFail($id)->delete();
        $this->refreshMembers();
    }

    public function cancel(): void
    {
        $this->showForm = false;
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->editId    = null;
        $this->name      = '';
        $this->role      = '';
        $this->bio       = '';
        $this->order     = 0;
        $this->is_active = true;
    }
};
?>

<div>
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h1 class="admin-page-title mb-0">Team Members</h1>
        <button class="btn btn-danger" wire:click="openCreate">+ Add Member</button>
    </div>

    @if($showForm)
        <div class="card border-0 shadow-sm mb-4 p-4">
            <h5 class="fw-bold mb-3">{{ $editId ? 'Edit Member' : 'New Member' }}</h5>
            <form wire:submit="save">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               wire:model="name">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Role / Position <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('role') is-invalid @enderror"
                               wire:model="role">
                        @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Display Order</label>
                        <input type="number" class="form-control" wire:model="order" min="0">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Bio</label>
                        <textarea class="form-control" wire:model="bio" rows="2"
                                  placeholder="Brief description…"></textarea>
                    </div>
                    <div class="col-12 d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" wire:model="is_active" id="mem_active">
                        <label class="form-check-label" for="mem_active">Active (visible on site)</label>
                    </div>
                </div>
                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-danger">
                        {{ $editId ? 'Update' : 'Create' }} Member
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
                            <th>Order</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Bio</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $m)
                            <tr>
                                <td class="text-muted">{{ $m->order }}</td>
                                <td class="fw-semibold">{{ $m->name }}</td>
                                <td>{{ $m->role }}</td>
                                <td><small class="text-muted">{{ Str::limit($m->bio, 60) }}</small></td>
                                <td>
                                    @if($m->is_active)
                                        <span class="badge badge-status-confirmed px-2 py-1 rounded">Active</span>
                                    @else
                                        <span class="badge badge-status-cancelled px-2 py-1 rounded">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-outline-secondary btn-sm me-1"
                                            wire:click="openEdit({{ $m->id }})">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm"
                                            wire:click="delete({{ $m->id }})"
                                            wire:confirm="Remove '{{ $m->name }}'?">Del</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">No team members yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
