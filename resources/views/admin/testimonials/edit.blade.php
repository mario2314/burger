@extends('admin.layouts.app')
@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Testimonial')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Role/Status</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $testimonial->role) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Review</label>
            <textarea name="review" class="form-control" rows="4" required>{{ old('review', $testimonial->review) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating', $testimonial->rating) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $testimonial->image) }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ $testimonial->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="isActive">Tampilkan di website</label>
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection