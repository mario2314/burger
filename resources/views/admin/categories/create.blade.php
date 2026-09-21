@extends('admin.layouts.app')
@section('title', 'Tambah Kategori')
@section('page-title', 'Tambah Kategori')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar (URL atau nama file)</label>
            <input type="text" name="image" class="form-control" placeholder="https://... atau 1.jpg" value="{{ old('image') }}" required>
            <small class="text-muted">Bisa link gambar dari internet, atau nama file dari folder public/img/category/</small>
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection