@extends('admin.layouts.app')
@section('title', 'General Settings')
@section('page-title', 'General Settings')
@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.settings.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah Setting Baru</a>
</div>
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf @method('PUT')
    @foreach($grouped as $groupName => $items)
    <div class="card-admin mb-4">
        <h6 class="fw-bold mb-3 text-capitalize">{{ str_replace('_', ' ', $groupName) }}</h6>
        <div class="row g-3">
            @foreach($items as $item)
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="form-label small fw-semibold mb-1">{{ $item->key }}</label>
                    <form action="{{ route('admin.settings.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus setting ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm text-danger p-0" title="Hapus"><i class="fas fa-times"></i></button>
                    </form>
                </div>
                @if(strlen($item->value ?? '') > 80)
                <textarea name="{{ $item->key }}" class="form-control" rows="3">{{ $item->value }}</textarea>
                @else
                <input type="text" name="{{ $item->key }}" class="form-control" value="{{ $item->value }}">
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
    <button type="submit" class="btn-admin-primary">Simpan Semua Perubahan</button>
</form>
@endsection