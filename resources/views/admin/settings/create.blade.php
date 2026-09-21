@extends('admin.layouts.app')
@section('title', 'Tambah Setting')
@section('page-title', 'Tambah Setting Baru')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Key</label>
            <input type="text" name="key" class="form-control" placeholder="contoh: hero_title" value="{{ old('key') }}" required>
            <small class="text-muted">Gunakan huruf kecil + underscore</small>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Value</label>
            <textarea name="value" class="form-control" rows="3">{{ old('value') }}</textarea>
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection