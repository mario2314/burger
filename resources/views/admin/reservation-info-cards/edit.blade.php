@extends('admin.layouts.app')
@section('title', 'Edit Info Card')
@section('page-title', 'Edit Info Card')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.reservation-info-cards.update', $card) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Icon (Font Awesome class)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $card->icon) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $card->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Value</label>
            <input type="text" name="value" class="form-control" value="{{ old('value', $card->value) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $card->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.reservation-info-cards.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection