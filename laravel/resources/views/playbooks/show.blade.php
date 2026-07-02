@extends('admin.layout')

@section('title', 'Playbook Details')
@section('page-title', 'Playbook Details')

@section('page-actions')
    <div class="d-flex gap-2">
        <a href="{{ route('playbooks.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
        <a href="{{ route('playbooks.edit', $playbook) }}" class="btn btn-primary" style="background-color: var(--primary-color); border-color: var(--primary-color);">
            <i class="bi bi-pencil me-1"></i> Edit Playbook
        </a>
    </div>
@endsection

@section('content')
    <div class="card border-0 shadow-sm rounded-4" style="max-width: 800px;">
        <div class="card-body p-4">
            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">ID</div>
                <div class="col-sm-9">#{{ $playbook->id }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Situation</div>
                <div class="col-sm-9">
                    <span class="badge bg-light text-dark border px-3 py-2 fs-6">
                        {{ $playbook->situation->name ?? 'N/A' }}
                    </span>
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Playbook Code</div>
                <div class="col-sm-9"><span class="fw-bold fs-5">{{ $playbook->code }}</span></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Title</div>
                <div class="col-sm-9"><span class="fw-bold fs-5">{{ $playbook->title }}</span></div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Sort Order</div>
                <div class="col-sm-9">{{ $playbook->sort_order }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Status</div>
                <div class="col-sm-9">
                    <x-status-badge :status="$playbook->status" />
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Objective</div>
                <div class="col-sm-9">
                    @if($playbook->objective)
                        <div class="bg-light p-3 rounded-3" style="white-space: pre-wrap;">{{ $playbook->objective }}</div>
                    @else
                        <span class="text-muted italic">No objective specified.</span>
                    @endif
                </div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Created At</div>
                <div class="col-sm-9 text-muted">{{ $playbook->created_at->format('d M Y, H:i:s') }}</div>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="row mb-4">
                <div class="col-sm-3 fw-semibold text-muted">Last Updated</div>
                <div class="col-sm-9 text-muted">{{ $playbook->updated_at->format('d M Y, H:i:s') }}</div>
            </div>
        </div>
    </div>
@endsection
