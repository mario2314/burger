@extends('admin.layouts.app')
@section('title', 'Pesan Masuk')
@section('page-title', 'Pesan Masuk')
@section('content')
<div class="card-admin">
    <h6 class="fw-bold mb-3">Daftar Pesan dari Contact Form</h6>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Status</th><th>Nama</th><th>Email</th><th>Subject</th><th>Tanggal</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($contacts as $item)
                <tr class="{{ !$item->is_read ? 'fw-bold' : '' }}">
                    <td>
                        @if($item->is_read)
                        <span class="badge bg-secondary">Dibaca</span>
                        @else
                        <span class="badge bg-primary">Baru</span>
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.contacts.show', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('admin.contacts.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-3">Belum ada pesan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $contacts->links() }}</div>
</div>
@endsection