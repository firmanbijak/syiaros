@extends('admin.layout')

@section('title', 'Asset Details')
@section('page-title', 'Asset Details')

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('assets.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
        <a href="{{ route('assets.edit', $asset) }}" class="btn btn-primary" style="background-color: var(--primary-color); border-color: var(--primary-color);">
            <i class="bi bi-pencil me-1"></i> Edit Asset
        </a>
    </div>
@endsection

@section('content')
    <div class="card border-0 shadow-sm rounded-4" style="max-width: 800px;">
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">ID</div>
                <div class="col-sm-9">#{{ $asset->id }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Playbook</div>
                <div class="col-sm-9">
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6">
                        {{ $asset->playbook->title ?? 'N/A' }}
                    </span>
                </div>
            </div>

            @if($asset->category)
            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Category</div>
                <div class="col-sm-9">
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6">
                        {{ $asset->category->name }}
                    </span>
                </div>
            </div>
            @endif

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Asset Title</div>
                <div class="col-sm-9"><span class="fw-bold fs-5">{{ $asset->title }}</span></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Asset Type</div>
                <div class="col-sm-9">
                    <span class="badge bg-secondary-subtle text-secondary border-0 px-3 py-2 fs-6">
                        {{ ucfirst($asset->asset_type) }}
                    </span>
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Sort Order</div>
                <div class="col-sm-9">{{ $asset->sort_order }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Status</div>
                <div class="col-sm-9">
                    <x-status-badge :status="$asset->status" />
                </div>
            </div>

            @if($asset->thumbnail)
            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Thumbnail</div>
                <div class="col-sm-9">
                    <img src="{{ $asset->thumbnail }}" alt="Thumbnail" class="img-thumbnail" style="max-height: 150px;">
                    <div class="text-muted small mt-1">{{ $asset->thumbnail }}</div>
                </div>
            </div>
            @endif

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Content</div>
                <div class="col-sm-9">
                    @if($asset->content)
                        <div class="bg-light p-3 rounded-3" style="white-space: pre-wrap; font-family: monospace;">{{ $asset->content }}</div>
                    @else
                        <span class="text-muted italic">No content provided.</span>
                    @endif
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Created At</div>
                <div class="col-sm-9 text-muted">{{ $asset->created_at->format('d M Y, H:i:s') }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Last Updated</div>
                <div class="col-sm-9 text-muted">{{ $asset->updated_at->format('d M Y, H:i:s') }}</div>
            </div>
        </div>
    </div>
@endsection
