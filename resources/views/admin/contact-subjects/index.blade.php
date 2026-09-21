@extends('admin.layouts.app')
@section('title', 'Contact Subjects')
@section('page-title', 'Contact Subjects')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Pilihan Subject (Contact Form)</h6>
        <a href="{{ route('admin.contact-subjects.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Urutan</th><th>Label</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($contactSubjects as $item)
                <tr>
                    <td>{{ $item->sort_order }}</td>
                    <td>{{ $item->label }}</td>
                    <td>
                        <a href="{{ route('admin.contact-subjects.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.contact-subjects.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center text-muted py-3">Belum ada data</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection