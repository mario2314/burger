@extends('admin.layouts.app')
@section('title', 'Edit Hero Badge')
@section('page-title', 'Edit Hero Badge')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.hero-badges.update', $heroBadge) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Icon (Font Awesome class)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $heroBadge->icon) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Warna</label>
            <select name="color" class="form-select" required>
                <option value="r" {{ old('color', $heroBadge->color) == 'r' ? 'selected' : '' }}>Merah (r)</option>
                <option value="y" {{ old('color', $heroBadge->color) == 'y' ? 'selected' : '' }}>Kuning (y)</option>
                <option value="g" {{ old('color', $heroBadge->color) == 'g' ? 'selected' : '' }}>Hijau (g)</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $heroBadge->title) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $heroBadge->subtitle) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $heroBadge->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.hero-badges.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection