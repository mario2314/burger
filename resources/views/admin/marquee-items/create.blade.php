@extends('admin.layouts.app')
@section('title', 'Tambah Marquee Item')
@section('page-title', 'Tambah Marquee Item')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.marquee-items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" placeholder="contoh: Crispy Fried Chicken" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.marquee-items.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection