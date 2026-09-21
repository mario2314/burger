@extends('admin.layouts.app')
@section('title', 'Tambah Jam Operasional')
@section('page-title', 'Tambah Jam Operasional')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.business-hours.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Label Hari</label>
            <input type="text" name="day_label" class="form-control" placeholder="contoh: Senin - Selasa" value="{{ old('day_label') }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_closed" value="1" class="form-check-input" id="isClosed" {{ old('is_closed') ? 'checked' : '' }}>
            <label class="form-check-label" for="isClosed">Tutup di hari ini</label>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jam Buka</label>
                <input type="time" name="open_time" class="form-control" value="{{ old('open_time') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jam Tutup</label>
                <input type="time" name="close_time" class="form-control" value="{{ old('close_time') }}">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.business-hours.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection