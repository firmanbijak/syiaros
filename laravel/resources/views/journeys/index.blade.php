@extends('admin.layout')

@section('title', 'Journeys List')
@section('page-title', 'Journeys')

@section('page-actions')
    <a href="{{ route('journeys.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Add Journey
    </a>
@endsection

@section('content')
    <!-- Search Bar (UI Only) -->
    <x-search-box placeholder="Search journeys... (UI Only)" />

    <!-- Table -->
    <x-data-table>
        <x-slot name="thead">
            <tr>
                <th scope="col" class="ps-4 py-3" style="width: 80px;">ID</th>
                <th scope="col" class="py-3">Product</th>
                <th scope="col" class="py-3">Code</th>
                <th scope="col" class="py-3">Name</th>
                <th scope="col" class="py-3">Sort Order</th>
                <th scope="col" class="py-3">Status</th>
                <th scope="col" class="text-end pe-4 py-3" style="width: 180px;">Actions</th>
            </tr>
        </x-slot>

        @forelse($journeys as $journey)
            <tr>
                <td class="ps-4"><span class="fw-semibold text-muted">#{{ $journey->id }}</span></td>
                <td><span class="badge bg-light text-dark border px-2 py-1.5">{{ $journey->product->name ?? 'N/A' }}</span></td>
                <td><code>{{ $journey->code }}</code></td>
                <td><span class="fw-bold text-dark">{{ $journey->name }}</span></td>
                <td>{{ $journey->sort_order }}</td>
                <td>
                    <x-status-badge :status="$journey->status" />
                </td>
                <td class="text-end pe-4">
                    <x-action-buttons 
                        :showRoute="route('journeys.show', $journey)" 
                        :editRoute="route('journeys.edit', $journey)" 
                        :destroyRoute="route('journeys.destroy', $journey)" 
                        confirmMessage="Are you sure you want to delete this journey?" 
                    />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <div class="text-muted fs-5 mb-2">No journeys found</div>
                    <p class="text-muted small mb-0">Click "Add Journey" to start mapping user journeys.</p>
                </td>
            </tr>
        @endforelse
    </x-data-table>

    <!-- Pagination Links -->
    <x-pagination :items="$journeys" />
@endsection
