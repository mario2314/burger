@extends('admin.layouts.app')
@section('title', 'Testimonials')
@section('page-title', 'Testimonials')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Testimonial</h6>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Foto</th><th>Nama</th><th>Role</th><th>Rating</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($testimonials as $t)
                <tr>
                    <td><img src="{{ str_starts_with($t->image, 'http') ? $t->image : asset('img/testimonial/' . $t->image) }}" style="width:42px;height:42px;border-radius:50%;object-fit:cover;"></td>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->role }}</td>
                    <td>{{ str_repeat('★', $t->rating) }}</td>
                    <td>
                        @if($t->is_active)
                        <span class="badge-admin-active">Aktif</span>
                        @else
                        <span class="badge-admin-inactive">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada testimonial</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection