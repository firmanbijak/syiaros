@extends('admin.layout')

@section('title', 'Situations List')
@section('page-title', 'Situations')

@section('page-actions')
    <a href="{{ route('situations.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Add Situation
    </a>
@endsection

@section('content')
    <!-- Search Bar (UI Only) -->
    <x-search-box placeholder="Search situations... (UI Only)" />

    <!-- Table -->
    <x-data-table>
        <x-slot name="thead">
            <tr>
                <th scope="col" class="ps-4 py-3" style="width: 80px;">ID</th>
                <th scope="col" class="py-3">Journey</th>
                <th scope="col" class="py-3">Code</th>
                <th scope="col" class="py-3">Name</th>
                <th scope="col" class="py-3">Sort Order</th>
                <th scope="col" class="py-3">Status</th>
                <th scope="col" class="text-end pe-4 py-3" style="width: 180px;">Actions</th>
            </tr>
        </x-slot>

        @forelse($situations as $situation)
            <tr>
                <td class="ps-4"><span class="fw-semibold text-muted">#{{ $situation->id }}</span></td>
                <td><span class="badge bg-light text-dark border px-2 py-1.5">{{ $situation->journey->name ?? 'N/A' }}</span></td>
                <td><code>{{ $situation->code }}</code></td>
                <td><span class="fw-bold text-dark">{{ $situation->name }}</span></td>
                <td>{{ $situation->sort_order }}</td>
                <td>
                    <x-status-badge :status="$situation->status" />
                </td>
                <td class="text-end pe-4">
                    <x-action-buttons 
                        :showRoute="route('situations.show', $situation)" 
                        :editRoute="route('situations.edit', $situation)" 
                        :destroyRoute="route('situations.destroy', $situation)" 
                        confirmMessage="Are you sure you want to delete this situation?" 
                    />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <div class="text-muted fs-5 mb-2">No situations found</div>
                    <p class="text-muted small mb-0">Click "Add Situation" to start mapping user situations.</p>
                </td>
            </tr>
        @endforelse
    </x-data-table>

    <!-- Pagination Links -->
    <x-pagination :items="$situations" />
@endsection
