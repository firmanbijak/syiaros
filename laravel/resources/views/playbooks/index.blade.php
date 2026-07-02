@extends('admin.layout')

@section('title', 'Playbooks List')
@section('page-title', 'Playbooks')

@section('page-actions')
    <a href="{{ route('playbooks.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Add Playbook
    </a>
@endsection

@section('content')
    <!-- Search Bar (UI Only) -->
    <x-search-box placeholder="Search playbooks... (UI Only)" />

    <!-- Table -->
    <x-data-table>
        <x-slot name="thead">
            <tr>
                <th scope="col" class="ps-4 py-3" style="width: 80px;">ID</th>
                <th scope="col" class="py-3">Situation</th>
                <th scope="col" class="py-3">Code</th>
                <th scope="col" class="py-3">Title</th>
                <th scope="col" class="py-3">Sort Order</th>
                <th scope="col" class="py-3">Status</th>
                <th scope="col" class="text-end pe-4 py-3" style="width: 180px;">Actions</th>
            </tr>
        </x-slot>

        @forelse($playbooks as $playbook)
            <tr>
                <td class="ps-4"><span class="fw-semibold text-muted">#{{ $playbook->id }}</span></td>
                <td><span class="badge bg-light text-dark border px-2 py-1.5">{{ $playbook->situation->name ?? 'N/A' }}</span></td>
                <td><code>{{ $playbook->code }}</code></td>
                <td><span class="fw-bold text-dark">{{ $playbook->title }}</span></td>
                <td>{{ $playbook->sort_order }}</td>
                <td>
                    <x-status-badge :status="$playbook->status" />
                </td>
                <td class="text-end pe-4">
                    <x-action-buttons 
                        :showRoute="route('playbooks.show', $playbook)" 
                        :editRoute="route('playbooks.edit', $playbook)" 
                        :destroyRoute="route('playbooks.destroy', $playbook)" 
                        confirmMessage="Are you sure you want to delete this playbook?" 
                    />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <div class="text-muted fs-5 mb-2">No playbooks found</div>
                    <p class="text-muted small mb-0">Click "Add Playbook" to start creating marketing playbooks.</p>
                </td>
            </tr>
        @endforelse
    </x-data-table>

    <!-- Pagination Links -->
    <x-pagination :items="$playbooks" />
@endsection
