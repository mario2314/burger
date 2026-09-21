@extends('admin.layouts.app')
@section('title', 'Gallery')
@section('page-title', 'Gallery')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Gallery</h6>
        <a href="{{ route('admin.gallery.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Urutan</th><th>Gambar</th><th>Judul</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($galleryItems as $item)
                <tr>
                    <td>{{ $item->sort_order }}</td>
                    <td><img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('img/portfolio/' . $item->image) }}" style="width:60px;height:46px;border-radius:8px;object-fit:cover;"></td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ route('admin.gallery.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted py-3">Belum ada item gallery</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection