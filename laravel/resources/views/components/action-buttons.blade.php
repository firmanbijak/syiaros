@props(['showRoute', 'editRoute', 'destroyRoute', 'confirmMessage' => 'Are you sure you want to delete this item?'])

<div class="btn-group" role="group">
    @if(isset($showRoute))
        <a href="{{ $showRoute }}" class="btn btn-sm btn-outline-secondary" title="View Detail">
            <i class="bi bi-eye"></i>
        </a>
    @endif
    @if(isset($editRoute))
        <a href="{{ $editRoute }}" class="btn btn-sm btn-outline-primary" title="Edit">
            <i class="bi bi-pencil"></i>
        </a>
    @endif
    @if(isset($destroyRoute))
        <form action="{{ $destroyRoute }}" method="POST" class="d-inline" onsubmit="return confirm('{{ $confirmMessage }}');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    @endif
</div>
