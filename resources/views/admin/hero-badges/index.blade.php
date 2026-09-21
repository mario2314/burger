@extends('admin.layouts.app')
@section('title', 'Hero Badges')
@section('page-title', 'Hero Badges')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Badge Mengambang di Hero Section</h6>
        <a href="{{ route('admin.hero-badges.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Urutan</th><th>Icon</th><th>Warna</th><th>Title</th><th>Subtitle</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($heroBadges as $item)
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
                    <td>{{ $item->subtitle }}</td>
                    <td>
                        <a href="{{ route('admin.hero-badges.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.hero-badges.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
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