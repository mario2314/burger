@extends('admin.layouts.app')
@section('title', 'Edit Trending Tag')
@section('page-title', 'Edit Trending Tag')
@section('content')
<div class="card-admin" style="max-width:500px;">
    <form action="{{ route('admin.trending-tags.update', $trendingTag) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $trendingTag->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $trendingTag->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.trending-tags.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection