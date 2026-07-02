@extends('admin.layout')

@section('title', 'Product Details')
@section('page-title', 'Product Details')

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary" style="background-color: var(--primary-color); border-color: var(--primary-color);">
            <i class="bi bi-pencil me-1"></i> Edit Product
        </a>
    </div>
@endsection

@section('content')
    <div class="card border-0 shadow-sm rounded-4" style="max-width: 800px;">
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">ID</div>
                <div class="col-sm-9">#{{ $product->id }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Product Name</div>
                <div class="col-sm-9"><span class="fw-bold fs-5">{{ $product->name }}</span></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Slug</div>
                <div class="col-sm-9"><code>{{ $product->slug }}</code></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Status</div>
                <div class="col-sm-9">
                    @php
                        $statusClass = match($product->status) {
                            'active' => 'bg-success-subtle text-success',
                            'draft' => 'bg-warning-subtle text-warning',
                            'inactive' => 'bg-secondary-subtle text-secondary',
                            'archived' => 'bg-danger-subtle text-danger',
                            default => 'bg-light text-dark'
                        };
                    @endphp
                    <span class="badge px-3 py-2 rounded-pill {{ $statusClass }}">
                        {{ ucfirst($product->status) }}
                    </span>
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Description</div>
                <div class="col-sm-9">
                    @if($product->description)
                        <div class="bg-light p-3 rounded-3" style="white-space: pre-wrap;">{{ $product->description }}</div>
                    @else
                        <span class="text-muted italic">No description provided.</span>
                    @endif
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Created At</div>
                <div class="col-sm-9 text-muted">{{ $product->created_at->format('d M Y, H:i:s') }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Last Updated</div>
                <div class="col-sm-9 text-muted">{{ $product->updated_at->format('d M Y, H:i:s') }}</div>
            </div>
        </div>
    </div>
@endsection
