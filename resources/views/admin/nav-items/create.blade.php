@extends('admin.layouts.app')
@section('title', 'Tambah Menu Navbar')
@section('page-title', 'Tambah Menu Navbar')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.nav-items.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Label Tampilan</label>
            <input type="text" name="label" class="form-control" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Halaman Tujuan</label>
            <select name="route_name" class="form-select" required>
                <option value="">-- Pilih Halaman --</option>
                @foreach($availableRoutes as $route)
                <option value="{{ $route }}" {{ old('route_name') === $route ? 'selected' : '' }}>{{ $route }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.nav-items.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection