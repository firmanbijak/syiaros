@csrf

<!-- Situation Selection -->
<div class="mb-3">
    <label for="situation_id" class="form-label fw-semibold">Situation</label>
    <select class="form-select @error('situation_id') is-invalid @enderror" id="situation_id" name="situation_id" required>
        <option value="" disabled {{ old('situation_id', $playbook->situation_id ?? '') === '' ? 'selected' : '' }}>Select Situation</option>
        @foreach($situations as $situation)
            <option value="{{ $situation->id }}" {{ old('situation_id', $playbook->situation_id ?? '') == $situation->id ? 'selected' : '' }}>
                {{ $situation->name }} ({{ $situation->code }})
            </option>
        @endforeach
    </select>
    @error('situation_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Code Input -->
<div class="mb-3">
    <label for="code" class="form-label fw-semibold">Playbook Code</label>
    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $playbook->code ?? '') }}" placeholder="e.g., PLY-001" required>
    @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Title Input -->
<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $playbook->title ?? '') }}" placeholder="Enter playbook title" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Objective Input -->
<div class="mb-3">
    <label for="objective" class="form-label fw-semibold">Objective</label>
    <textarea class="form-control @error('objective') is-invalid @enderror" id="objective" name="objective" rows="3" placeholder="Enter playbook objective...">{{ old('objective', $playbook->objective ?? '') }}</textarea>
    @error('objective')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Sort Order Input -->
<div class="mb-3">
    <label for="sort_order" class="form-label fw-semibold">Sort Order</label>
    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $playbook->sort_order ?? 0) }}" required>
    @error('sort_order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Status Switch (Checkbox) -->
<div class="mb-3">
    <div class="form-check form-switch p-0 ps-5">
        <input class="form-check-input ms-n5" type="checkbox" id="status" name="status" value="1" {{ old('status', $playbook->status ?? true) ? 'checked' : '' }}>
        <label class="form-check-label fw-semibold" for="status">Is Active?</label>
    </div>
    @error('status')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>
