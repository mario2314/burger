@extends('admin.layouts.app')
@section('title', 'Tambah Guest Option')
@section('page-title', 'Tambah Guest Option')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.guest-options.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" placeholder="contoh: 3 - 4 People" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Value (angka)</label>
            <input type="number" name="value" class="form-control" value="{{ old('value') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.guest-options.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection