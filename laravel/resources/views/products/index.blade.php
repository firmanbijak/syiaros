@extends('admin.layout')

@section('title', 'Products List')
@section('page-title', 'Products')

@section('page-actions')
    <a href="{{ route('products.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Add Product
    </a>
@endsection

@section('content')
    <!-- Search Bar (UI Only) -->
    <x-search-box placeholder="Search products... (UI Only)" />

    <!-- Table -->
    <x-data-table>
        <x-slot name="thead">
            <tr>
                <th scope="col" class="ps-4 py-3" style="width: 80px;">ID</th>
                <th scope="col" class="py-3">Name</th>
                <th scope="col" class="py-3">Slug</th>
                <th scope="col" class="py-3">Status</th>
                <th scope="col" class="text-end pe-4 py-3" style="width: 200px;">Action</th>
            </tr>
        </x-slot>

        @forelse($products as $product)
            <tr>
                <td class="ps-4"><span class="fw-semibold text-muted">#{{ $product->id }}</span></td>
                <td><span class="fw-bold text-dark">{{ $product->name }}</span></td>
                <td><code>{{ $product->slug }}</code></td>
                <td>
                    <x-status-badge :status="$product->status" />
                </td>
                <td class="text-end pe-4">
                    <x-action-buttons 
                        :showRoute="route('products.show', $product)" 
                        :editRoute="route('products.edit', $product)" 
                        :destroyRoute="route('products.destroy', $product)" 
                        confirmMessage="Are you sure you want to delete this product?" 
                    />
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-5">
                    <div class="text-muted fs-5 mb-2">No products found</div>
                    <p class="text-muted small mb-0">Click "Add Product" to start building your catalog.</p>
                </td>
            </tr>
        @endforelse
    </x-data-table>

    <!-- Pagination Links -->
    <x-pagination :items="$products" />
@endsection
