@extends('admin.layouts.app')
@section('title', 'Edit Hero Stat')
@section('page-title', 'Edit Hero Stat')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.hero-stats.update', $heroStat) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Number</label>
            <input type="text" name="number" class="form-control" value="{{ old('number', $heroStat->number) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Suffix</label>
            <input type="text" name="suffix" class="form-control" value="{{ old('suffix', $heroStat->suffix) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $heroStat->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $heroStat->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.hero-stats.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection