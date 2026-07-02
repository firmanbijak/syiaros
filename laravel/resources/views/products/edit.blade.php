@extends('admin.layout')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('page-actions')
    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to List
    </a>
@endsection

@section('content')
    <x-form-card :action="route('products.update', $product)" method="PUT">
        @include('products.form')

        <!-- Submit Buttons -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4" style="background-color: var(--primary-color); border-color: var(--primary-color);">
                <i class="bi bi-save me-1"></i> Save
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-light px-4">Cancel</a>
        </div>
    </x-form-card>
@endsection
