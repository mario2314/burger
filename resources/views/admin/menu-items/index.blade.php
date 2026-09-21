@extends('admin.layouts.app')
@section('title', 'Menu Items')
@section('page-title', 'Menu Items')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Menu</h6>
        <a href="{{ route('admin.menu-items.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Gambar</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($menuItems as $item)
                <tr>
                    <td><img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('img/menu/' . $item->image) }}" style="width:46px;height:46px;border-radius:8px;object-fit:cover;"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? '-' }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        @if($item->is_active)
                        <span class="badge-admin-active">Aktif</span>
                        @else
                        <span class="badge-admin-inactive">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.menu-items.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.menu-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada menu</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection