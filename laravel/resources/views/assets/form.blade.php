@csrf

<!-- Playbook Selection -->
<div class="mb-3">
    <label for="playbook_id" class="form-label fw-semibold">Playbook</label>
    <select class="form-select @error('playbook_id') is-invalid @enderror" id="playbook_id" name="playbook_id" required>
        <option value="" disabled {{ old('playbook_id', $asset->playbook_id ?? '') === '' ? 'selected' : '' }}>Select Playbook</option>
        @foreach($playbooks as $playbook)
            <option value="{{ $playbook->id }}" {{ old('playbook_id', $asset->playbook_id ?? '') == $playbook->id ? 'selected' : '' }}>
                {{ $playbook->title }} ({{ $playbook->code }})
            </option>
        @endforeach
    </select>
    @error('playbook_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Category Selection (Conditional) -->
@if(isset($categories) && $categories->isNotEmpty())
<div class="mb-3">
    <label for="category_id" class="form-label fw-semibold">Category</label>
    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
        <option value="" {{ old('category_id', $asset->category_id ?? '') === '' ? 'selected' : '' }}>No Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $asset->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
@endif

<!-- Title Input -->
<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Asset Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $asset->title ?? '') }}" placeholder="Enter asset title" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Asset Type Selection -->
<div class="mb-3">
    <label for="asset_type" class="form-label fw-semibold">Asset Type</label>
    <select class="form-select @error('asset_type') is-invalid @enderror" id="asset_type" name="asset_type" required>
        <option value="" disabled {{ old('asset_type', $asset->asset_type ?? '') === '' ? 'selected' : '' }}>Select Type</option>
        @foreach(['hook', 'caption', 'story', 'poster', 'image', 'video', 'landing', 'faq', 'cta', 'follow_up'] as $type)
            <option value="{{ $type }}" {{ old('asset_type', $asset->asset_type ?? '') === $type ? 'selected' : '' }}>
                {{ ucfirst(str_replace('_', ' ', $type)) }}
            </option>
        @endforeach
    </select>
    @error('asset_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Thumbnail Input -->
<div class="mb-3">
    <label for="thumbnail" class="form-label fw-semibold">Thumbnail URL / Path</label>
    <input type="text" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $asset->thumbnail ?? '') }}" placeholder="e.g., /assets/thumbnails/poster.jpg">
    @error('thumbnail')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Content Textarea -->
<div class="mb-3">
    <label for="content" class="form-label fw-semibold">Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Enter asset copy/content...">{{ old('content', $asset->content ?? '') }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Sort Order Input -->
<div class="mb-3">
    <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $asset->sort_order ?? 0) }}" required>
    @error('sort_order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Status Selection -->
<div class="mb-4">
    <label for="status" class="form-label fw-semibold">Status</label>
    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
        <option value="" disabled {{ old('status', $asset->status ?? '') === '' ? 'selected' : '' }}>Select Status</option>
        @foreach(['draft', 'published', 'archived'] as $statusOption)
            <option value="{{ $statusOption }}" {{ old('status', $asset->status ?? '') === $statusOption ? 'selected' : '' }}>
                {{ ucfirst($statusOption) }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
