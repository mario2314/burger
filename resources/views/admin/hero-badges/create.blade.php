@extends('admin.layouts.app')
@section('title', 'Tambah Hero Badge')
@section('page-title', 'Tambah Hero Badge')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.hero-badges.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Icon (Font Awesome class)</label>
            <input type="text" name="icon" class="form-control" placeholder="contoh: fa-fire" value="{{ old('icon') }}" required>
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
            <input type="text" name="title" class="form-control" placeholder="contoh: Hot Deal" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" placeholder="contoh: 30% off today" value="{{ old('subtitle') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.hero-badges.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection