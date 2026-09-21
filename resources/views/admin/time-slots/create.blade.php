@extends('admin.layouts.app')
@section('title', 'Tambah Time Slot')
@section('page-title', 'Tambah Time Slot')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.time-slots.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Label Jam</label>
            <input type="text" name="label" class="form-control" placeholder="contoh: 09:00 AM" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.time-slots.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection