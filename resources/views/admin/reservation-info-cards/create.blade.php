@extends('admin.layouts.app')
@section('title', 'Tambah Info Card')
@section('page-title', 'Tambah Info Card')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.reservation-info-cards.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Icon (Font Awesome class)</label>
            <input type="text" name="icon" class="form-control" placeholder="contoh: fa-clock" value="{{ old('icon') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" placeholder="contoh: Opening Hours" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Value</label>
            <input type="text" name="value" class="form-control" placeholder="contoh: Wed - Sun, 9 AM - 11 PM" value="{{ old('value') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.reservation-info-cards.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection