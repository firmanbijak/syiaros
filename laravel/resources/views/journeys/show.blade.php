@extends('admin.layout')

@section('title', 'Journey Details')
@section('page-title', 'Journey Details')

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('journeys.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
        <a href="{{ route('journeys.edit', $journey) }}" class="btn btn-primary" style="background-color: var(--primary-color); border-color: var(--primary-color);">
            <i class="bi bi-pencil me-1"></i> Edit Journey
        </a>
    </div>
@endsection

@section('content')
    <div class="card border-0 shadow-sm rounded-4" style="max-width: 800px;">
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">ID</div>
                <div class="col-sm-9">#{{ $journey->id }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Product</div>
                <div class="col-sm-9">
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6">
                        {{ $journey->product->name ?? 'N/A' }}
                    </span>
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Journey Code</div>
                <div class="col-sm-9"><span class="fw-bold fs-5">{{ $journey->code }}</span></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Journey Name</div>
                <div class="col-sm-9"><span class="fw-bold fs-5">{{ $journey->name }}</span></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Slug</div>
                <div class="col-sm-9"><code>{{ $journey->slug }}</code></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Sort Order</div>
                <div class="col-sm-9">{{ $journey->sort_order }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Status</div>
                <div class="col-sm-9">
                    @if($journey->status)
                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active</span>
                    @else
                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill">Inactive</span>
                    @endif
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Description</div>
                <div class="col-sm-9">
                    @if($journey->description)
                        <div class="bg-light p-3 rounded-3" style="white-space: pre-wrap;">{{ $journey->description }}</div>
                    @else
                        <span class="text-muted italic">No description provided.</span>
                    @endif
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Created At</div>
                <div class="col-sm-9 text-muted">{{ $journey->created_at->format('d M Y, H:i:s') }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Last Updated</div>
                <div class="col-sm-9 text-muted">{{ $journey->updated_at->format('d M Y, H:i:s') }}</div>
            </div>
        </div>
    </div>
@endsection
