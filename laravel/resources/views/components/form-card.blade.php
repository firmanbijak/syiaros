@props(['action', 'method' => 'POST', 'maxWidth' => '800px'])

<div class="card border-0 shadow-sm rounded-4" style="max-width: {{ $maxWidth }};">
    <div class="card-body p-4">
        <form action="{{ $action }}" method="{{ in_array(strtoupper($method), ['GET', 'POST']) ? $method : 'POST' }}">
            @csrf
            @if(!in_array(strtoupper($method), ['GET', 'POST']))
                @method($method)
            @endif

            {{ $slot }}
        </form>
    </div>
</div>
