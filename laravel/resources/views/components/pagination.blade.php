@props(['items'])

@if($items->hasPages())
    <div class="mt-4 d-flex justify-content-center">
        {{ $items->links() }}
    </div>
@endif
