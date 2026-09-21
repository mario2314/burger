@extends('admin.layouts.app')
@section('title', 'Tambah Gallery Item')
@section('page-title', 'Tambah Gallery Item')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.gallery.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection