@extends('admin.layouts.app')
@section('title', 'Edit Kategori')
@section('page-title', 'Edit Kategori')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $category->image) }}" required>
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection