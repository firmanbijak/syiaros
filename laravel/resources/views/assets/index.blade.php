@extends('admin.layout')

@section('title', 'Assets List')
@section('page-title', 'Assets')

@section('page-actions')
    <a href="{{ route('assets.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Add Asset
    </a>
@endsection

@section('content')
    <!-- Search Bar (UI Only) -->
    <x-search-box placeholder="Search assets... (UI Only)" />

    <!-- Table -->
    <x-data-table>
        <x-slot name="thead">
            <tr>
                <th scope="col" class="ps-4 py-3" style="width: 80px;">ID</th>
                <th scope="col" class="py-3">Playbook</th>
                <th scope="col" class="py-3">Type</th>
                <th scope="col" class="py-3">Title</th>
                <th scope="col" class="py-3">Sort Order</th>
                <th scope="col" class="py-3">Status</th>
                <th scope="col" class="text-end pe-4 py-3" style="width: 180px;">Actions</th>
            </tr>
        </x-slot>

        @forelse($assets as $asset)
            <tr>
                <td class="ps-4"><span class="fw-semibold text-muted">#{{ $asset->id }}</span></td>
                <td><span class="badge bg-light text-dark border px-2 py-1.5">{{ $asset->playbook->title ?? 'N/A' }}</span></td>
                <td><span class="badge bg-secondary-subtle text-secondary border-0 px-2.5 py-1">{{ ucfirst($asset->asset_type) }}</span></td>
                <td><span class="fw-bold text-dark">{{ $asset->title }}</span></td>
                <td>{{ $asset->sort_order }}</td>
                <td>
                    <x-status-badge :status="$asset->status" />
                </td>
                <td class="text-end pe-4">
                    <x-action-buttons 
                        :showRoute="route('assets.show', $asset)" 
                        :editRoute="route('assets.edit', $asset)" 
                        :destroyRoute="route('assets.destroy', $asset)" 
                        confirmMessage="Are you sure you want to delete this asset?" 
                    />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <div class="text-muted fs-5 mb-2">No assets found</div>
                    <p class="text-muted small mb-0">Click "Add Asset" to start creating creative promotional copy and assets.</p>
                </td>
            </tr>
        @endforelse
    </x-data-table>

    <!-- Pagination Links -->
    <x-pagination :items="$assets" />
@endsection
