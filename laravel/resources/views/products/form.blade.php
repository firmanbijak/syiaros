@csrf

<!-- Name Input -->
<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Product Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" placeholder="Enter product name" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Input -->
<div class="mb-3">
    <label for="slug" class="form-label fw-semibold">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $product->slug ?? '') }}" placeholder="e.g., tabungan-umroh-tasha" required>
    <div class="form-text">Unique URL-friendly identifier. Lowercase letters, numbers, and hyphens only.</div>
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Status Selector -->
<div class="mb-3">
    <label for="status" class="form-label fw-semibold">Status</label>
    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
        <option value="" disabled {{ old('status', $product->status ?? '') === '' ? 'selected' : '' }}>Select status</option>
        @foreach(['draft', 'active', 'inactive', 'archived'] as $status)
            <option value="{{ $status }}" {{ old('status', $product->status ?? '') === $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Description Textarea -->
<div class="mb-4">
    <label for="description" class="form-label fw-semibold">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Enter product description...">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Auto-generate slug script -->
@if(!isset($product))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function () {
                const nameVal = this.value;
                const slugVal = nameVal
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')     // Remove all non-word chars except spaces and hyphens
                    .replace(/[\s_]+/g, '-')       // Replace spaces and underscores with hyphens
                    .replace(/^-+|-+$/g, '');      // Trim hyphens from ends
                
                slugInput.value = slugVal;
            });
        }
    });
</script>
@endif
