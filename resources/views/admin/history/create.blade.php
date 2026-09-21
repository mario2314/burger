@extends('admin.layouts.app')
@section('title', 'Tambah Timeline')
@section('page-title', 'Tambah Timeline')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.history.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Tahun</label>
            <input type="text" name="year" class="form-control" value="{{ old('year') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.history.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection