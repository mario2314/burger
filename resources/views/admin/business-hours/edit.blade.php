@extends('admin.layouts.app')
@section('title', 'Edit Jam Operasional')
@section('page-title', 'Edit Jam Operasional')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.business-hours.update', $businessHour) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Label Hari</label>
            <input type="text" name="day_label" class="form-control" value="{{ old('day_label', $businessHour->day_label) }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_closed" value="1" class="form-check-input" id="isClosed" {{ old('is_closed', $businessHour->is_closed) ? 'checked' : '' }}>
            <label class="form-check-label" for="isClosed">Tutup di hari ini</label>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jam Buka</label>
                <input type="time" name="open_time" class="form-control" value="{{ old('open_time', $businessHour->open_time ? \Carbon\Carbon::parse($businessHour->open_time)->format('H:i') : '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Jam Tutup</label>
                <input type="time" name="close_time" class="form-control" value="{{ old('close_time', $businessHour->close_time ? \Carbon\Carbon::parse($businessHour->close_time)->format('H:i') : '') }}">
            </div>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $businessHour->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.business-hours.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection