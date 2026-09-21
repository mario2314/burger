@extends('admin.layouts.app')
@section('title', 'Edit Contact Subject')
@section('page-title', 'Edit Contact Subject')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.contact-subjects.update', $contactSubject) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $contactSubject->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $contactSubject->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.contact-subjects.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection