@extends('admin.layouts.app')
@section('title', 'Chefs')
@section('page-title', 'Chefs')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Chef</h6>
        <a href="{{ route('admin.chefs.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Foto</th><th>Nama</th><th>Role</th><th>Pengalaman</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($chefs as $chef)
                <tr>
                    <td><img src="{{ str_starts_with($chef->image, 'http') ? $chef->image : asset('img/chefs/' . $chef->image) }}" style="width:46px;height:46px;border-radius:50%;object-fit:cover;"></td>
                    <td>{{ $chef->name }}</td>
                    <td>{{ $chef->role }}</td>
                    <td>{{ $chef->experience }} tahun</td>
                    <td>
                        @if($chef->is_active)
                        <span class="badge-admin-active">Aktif</span>
                        @else
                        <span class="badge-admin-inactive">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.chefs.edit', $chef) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.chefs.destroy', $chef) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada chef</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection