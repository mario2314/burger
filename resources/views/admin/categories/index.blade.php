@extends('admin.layouts.app')
@section('title', 'Categories')
@section('page-title', 'Categories')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Kategori Menu</h6>
        <a href="{{ route('admin.categories.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Gambar</th><th>Nama</th><th>Slug</th><th>Jumlah Menu</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($categories as $cat)
                <tr>
                    <td><img src="{{ str_starts_with($cat->image, 'http') ? $cat->image : asset('img/category/' . $cat->image) }}" style="width:46px;height:46px;border-radius:8px;object-fit:cover;"></td>
                    <td>{{ $cat->name }}</td>
                    <td><code>{{ $cat->slug }}</code></td>
                    <td>{{ $cat->menu_items_count }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori ini? Menu di dalamnya juga akan terhapus.')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-3">Belum ada kategori</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection