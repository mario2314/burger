@extends('admin.layouts.app')
@section('title', 'Tambah Feature')
@section('page-title', 'Tambah Feature')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.features.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Icon (Font Awesome class)</label>
            <input type="text" name="icon" class="form-control" placeholder="contoh: fa-leaf" value="{{ old('icon') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Warna</label>
            <select name="color" class="form-select" required>
                <option value="r" {{ old('color') == 'r' ? 'selected' : '' }}>Merah (r)</option>
                <option value="y" {{ old('color') == 'y' ? 'selected' : '' }}>Kuning (y)</option>
                <option value="g" {{ old('color') == 'g' ? 'selected' : '' }}>Hijau (g)</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" placeholder="contoh: 100% Fresh Ingredients" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.features.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection