@extends('admin.layouts.app')
@section('title', 'Tambah Hero Stat')
@section('page-title', 'Tambah Hero Stat')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.hero-stats.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Number</label>
            <input type="text" name="number" class="form-control" placeholder="contoh: 850" value="{{ old('number') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Suffix</label>
            <input type="text" name="suffix" class="form-control" placeholder="contoh: + atau yr" value="{{ old('suffix') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" placeholder="contoh: Happy Customers" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.hero-stats.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection