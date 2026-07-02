@extends('admin.layout')

@section('title', 'Edit Journey')
@section('page-title', 'Edit Journey')

@section('page-actions')
    <a href="{{ route('journeys.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to List
    </a>
@endsection

@section('content')
    <div class="card border-0 shadow-sm rounded-4" style="max-width: 800px;">
        <div class="card-body p-4">
            <form action="{{ route('journeys.update', $journey) }}" method="POST">
                @method('PUT')
                @include('journeys.form')

                <!-- Submit Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4" style="background-color: var(--primary-color); border-color: var(--primary-color);">
                        <i class="bi bi-save me-1"></i> Save
                    </button>
                    <a href="{{ route('journeys.index') }}" class="btn btn-light px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
