@extends('admin.layouts.app')
@section('title', 'Edit Gallery Item')
@section('page-title', 'Edit Gallery Item')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $gallery->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $gallery->image) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $gallery->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection