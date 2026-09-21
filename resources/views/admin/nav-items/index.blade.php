@extends('admin.layouts.app')
@section('title', 'Navbar Menu')
@section('page-title', 'Navbar Menu')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Menu Navbar</h6>
        <a href="{{ route('admin.nav-items.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah Menu</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Urutan</th><th>Label</th><th>Route Tujuan</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($navItems as $item)
                <tr>
                    <td>{{ $item->sort_order }}</td>
                    <td>{{ $item->label }}</td>
                    <td><code>{{ $item->route_name }}</code></td>
                    <td>
                        <a href="{{ route('admin.nav-items.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.nav-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted py-3">Belum ada menu navbar</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection