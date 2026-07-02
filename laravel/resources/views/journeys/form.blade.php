@csrf

<!-- Product Selection -->
<div class="mb-3">
    <label for="product_id" class="form-label fw-semibold">Product</label>
    <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
        <option value="" disabled {{ old('product_id', $journey->product_id ?? '') === '' ? 'selected' : '' }}>Select Product</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id', $journey->product_id ?? '') == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    </select>
    @error('product_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Code Input -->
<div class="mb-3">
    <label for="code" class="form-label fw-semibold">Journey Code</label>
    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $journey->code ?? '') }}" placeholder="e.g., JRN-001" required>
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Name Input -->
<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Journey Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $journey->name ?? '') }}" placeholder="Enter journey name" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Input -->
<div class="mb-3">
    <label for="slug" class="form-label fw-semibold">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $journey->slug ?? '') }}" placeholder="e.g., saving-steps" required>
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Sort Order Input -->
<div class="mb-3">
    <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $journey->sort_order ?? 0) }}" required>
    @error('sort_order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Status Switch (Checkbox) -->
<div class="mb-3">
    <div class="form-check form-switch p-0 ps-5">
        <input class="form-check-input ms-n5" type="checkbox" id="status" name="status" value="1" {{ old('status', $journey->status ?? true) ? 'checked' : '' }}>
        <label class="form-check-label fw-semibold" for="status">Is Active?</label>
    </div>
    @error('status')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>

<!-- Description Textarea -->
<div class="mb-4">
    <label for="description" class="form-label fw-semibold">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Enter journey description...">{{ old('description', $journey->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Auto-generate slug script -->
@if(!isset($journey))
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
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                
                slugInput.value = slugVal;
            });
        }
    });
</script>
@endif
