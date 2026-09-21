@extends('admin.layouts.app')
@section('title', 'Edit Chef')
@section('page-title', 'Edit Chef')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.chefs.update', $chef) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $chef->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Role/Jabatan</label>
            <input type="text" name="role" class="form-control" value="{{ old('role', $chef->role) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Pengalaman (tahun)</label>
            <input type="number" name="experience" class="form-control" value="{{ old('experience', $chef->experience) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Foto (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $chef->image) }}" required>
        </div>
        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $chef->instagram) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $chef->facebook) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Twitter</label>
                <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $chef->twitter) }}">
            </div>
        </div>
        <div class="mb-3 mt-3 form-check">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ $chef->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="isActive">Tampilkan di website</label>
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.chefs.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection