@extends('admin.layouts.app')
@section('title', 'Features')
@section('page-title', 'Features')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Keunggulan/Feature</h6>
        <a href="{{ route('admin.features.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Urutan</th><th>Icon</th><th>Warna</th><th>Title</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($features as $item)
                <tr>
                    <td>{{ $item->sort_order }}</td>
                    <td><i class="fas {{ $item->icon }}"></i></td>
                    <td>
                        @php
                            $colorMap = ['r' => 'danger', 'y' => 'warning', 'g' => 'success'];
                        @endphp
                        <span class="badge bg-{{ $colorMap[$item->color] ?? 'secondary' }}">{{ strtoupper($item->color) }}</span>
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->description, 60) }}</td>
                    <td>
                        <a href="{{ route('admin.features.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.features.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection