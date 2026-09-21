@extends('admin.layouts.app')
@section('title', 'Edit Menu Navbar')
@section('page-title', 'Edit Menu Navbar')
@section('content')
<div class="card-admin" style="max-width:600px;">
    <form action="{{ route('admin.nav-items.update', $navItem) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Label Tampilan</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $navItem->label) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Halaman Tujuan</label>
            <select name="route_name" class="form-select" required>
                @foreach($availableRoutes as $route)
                <option value="{{ $route }}" {{ $navItem->route_name === $route ? 'selected' : '' }}>{{ $route }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Urutan Tampil</label>
            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $navItem->sort_order) }}">
        </div>
        <button type="submit" class="btn-admin-primary">Update</button>
        <a href="{{ route('admin.nav-items.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection