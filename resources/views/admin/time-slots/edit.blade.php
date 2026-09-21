@extends('admin.layouts.app')
@section('title', 'Edit Time Slot')
@section('page-title', 'Edit Time Slot')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.time-slots.update', $timeSlot) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Label Jam</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $timeSlot->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $timeSlot->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.time-slots.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection