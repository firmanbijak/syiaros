@props(['placeholder' => 'Search...', 'name' => 'search', 'value' => ''])

<div class="row mb-4">
    <div class="col-md-6 col-lg-4">
        <div class="input-group shadow-sm rounded-3 overflow-hidden">
            <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
            <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control border-start-0 ps-0" placeholder="{{ $placeholder }}" aria-label="Search">
        </div>
    </div>
</div>
