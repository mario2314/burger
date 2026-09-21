@extends('admin.layouts.app')
@section('title', 'Tambah Testimonial')
@section('page-title', 'Tambah Testimonial')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.testimonials.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Role/Status</label>
            <input type="text" name="role" class="form-control" placeholder="contoh: Regular Customer" value="{{ old('role') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Review</label>
            <textarea name="review" class="form-control" rows="4" required>{{ old('review') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Rating (1-5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" value="{{ old('rating', 5) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image') }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" checked>
            <label class="form-check-label" for="isActive">Tampilkan di website</label>
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection