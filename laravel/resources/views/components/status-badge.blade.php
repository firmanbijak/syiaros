@props(['status'])

@php
    $statusStr = is_bool($status) || $status === 1 || $status === 0 || $status === '1' || $status === '0'
        ? ($status ? 'active' : 'inactive')
        : strtolower($status);

    $statusClass = match($statusStr) {
        'active', 'published' => 'bg-success-subtle text-success',
        'draft' => 'bg-warning-subtle text-warning',
        'inactive' => 'bg-secondary-subtle text-secondary',
        'archived' => 'bg-danger-subtle text-danger',
        default => 'bg-light text-dark'
    };
@endphp

<span class="badge px-3 py-2 rounded-pill {{ $statusClass }}">
    {{ ucfirst($statusStr) }}
</span>
