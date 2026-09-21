@extends('admin.layouts.app')
@section('title', 'Tambah Contact Subject')
@section('page-title', 'Tambah Contact Subject')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.contact-subjects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" placeholder="contoh: General Inquiry" value="{{ old('label') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Simpan</button>
        <a href="{{ route('admin.contact-subjects.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection