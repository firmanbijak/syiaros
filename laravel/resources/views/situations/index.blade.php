@extends('admin.layout')

@section('title', 'Situations List')
@section('page-title', 'Situations')

@section('page-actions')
    <a href="{{ route('situations.create') }}" class="btn btn-primary shadow-sm" style="background-color: var(--primary-color); border-color: var(--primary-color);">
        <i class="bi bi-plus-lg me-1"></i> Add Situation
    </a>
@endsection

@section('content')
    <!-- Search Bar (UI Only) -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-4">
            <div class="input-group shadow-sm rounded-3 overflow-hidden">
                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Search situations... (UI Only)" aria-label="Search">
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4 py-3" style="width: 80px;">ID</th>
                            <th scope="col" class="py-3">Journey</th>
                            <th scope="col" class="py-3">Code</th>
                            <th scope="col" class="py-3">Name</th>
                            <th scope="col" class="py-3">Sort Order</th>
                            <th scope="col" class="py-3">Status</th>
                            <th scope="col" class="text-end pe-4 py-3" style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($situations as $situation)
                            <tr>
                                <td class="ps-4"><span class="fw-semibold text-muted">#{{ $situation->id }}</span></td>
                                <td><span class="badge bg-light text-dark border px-2 py-1.5">{{ $situation->journey->name ?? 'N/A' }}</span></td>
                                <td><code>{{ $situation->code }}</code></td>
                                <td><span class="fw-bold text-dark">{{ $situation->name }}</span></td>
                                <td>{{ $situation->sort_order }}</td>
                                <td>
                                    @if($situation->status)
                                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('situations.show', $situation) }}" class="btn btn-sm btn-outline-secondary" title="View Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('situations.edit', $situation) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('situations.destroy', $situation) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this situation?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted fs-5 mb-2">No situations found</div>
                                    <p class="text-muted small mb-0">Click "Add Situation" to start mapping user situations.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $situations->links() }}
    </div>
@endsection
