@extends('admin.layouts.app')
@section('title', 'Edit Guest Option')
@section('page-title', 'Edit Guest Option')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.guest-options.update', $guestOption) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $guestOption->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Value (angka)</label>
            <input type="number" name="value" class="form-control" value="{{ old('value', $guestOption->value) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $guestOption->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.guest-options.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection