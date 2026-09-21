@extends('admin.layouts.app')
@section('title', 'Edit Menu Item')
@section('page-title', 'Edit Menu Item')
@section('content')
<div class="card-admin" style="max-width:760px;">
    <form action="{{ route('admin.menu-items.update', $menuItem) }}" method="POST">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Kategori</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $menuItem->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Nama Menu</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $menuItem->name) }}" required>
            </div>
            <div class="col-12">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $menuItem->description) }}</textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Harga</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $menuItem->price) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Harga Lama (opsional)</label>
                <input type="number" step="0.01" name="old_price" class="form-control" value="{{ old('old_price', $menuItem->old_price) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Rating</label>
                <input type="number" step="0.1" name="rating" class="form-control" value="{{ old('rating', $menuItem->rating) }}">
            </div>
            <div class="col-12">
                <label class="form-label fw-semibold">Gambar (URL atau nama file)</label>
                <input type="text" name="image" class="form-control" value="{{ old('image', $menuItem->image) }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Jumlah Review</label>
                <input type="number" name="reviews_count" class="form-control" value="{{ old('reviews_count', $menuItem->reviews_count) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Kalori</label>
                <input type="number" name="calories" class="form-control" value="{{ old('calories', $menuItem->calories) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-semibold">Waktu Masak (menit)</label>
                <input type="number" name="prep_time" class="form-control" value="{{ old('prep_time', $menuItem->prep_time) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Badge (opsional)</label>
                <input type="text" name="badge" class="form-control" value="{{ old('badge', $menuItem->badge) }}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Badge Type</label>
                <select name="badge_type" class="form-select">
                    <option value="">-- Tidak ada --</option>
                    <option value="hot" {{ $menuItem->badge_type === 'hot' ? 'selected' : '' }}>Hot</option>
                    <option value="new" {{ $menuItem->badge_type === 'new' ? 'selected' : '' }}>New</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label fw-semibold">Tags (pisahkan dengan koma)</label>
                <input type="text" name="tags" class="form-control" value="{{ old('tags', $menuItem->tags) }}">
            </div>
            <div class="col-12 form-check">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ $menuItem->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="isActive">Tampilkan di website</label>
            </div>
        </div>
        <button type="submit" class="btn-admin-primary mt-3">Update</button>
        <a href="{{ route('admin.menu-items.index') }}" class="btn btn-outline-secondary mt-3">Batal</a>
    </form>
</div>
@endsection