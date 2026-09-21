@extends('admin.layouts.app')
@section('title', 'Business Hours')
@section('page-title', 'Business Hours')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Jam Operasional</h6>
        <a href="{{ route('admin.business-hours.create') }}" class="btn-admin-primary"><i class="fas fa-plus me-1"></i> Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Urutan</th><th>Hari</th><th>Status</th><th>Jam Buka</th><th>Jam Tutup</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($businessHours as $hour)
                <tr>
                    <td>{{ $hour->sort_order }}</td>
                    <td>{{ $hour->day_label }}</td>
                    <td>
                        @if($hour->is_closed)
                        <span class="badge-admin-inactive">Closed</span>
                        @else
                        <span class="badge-admin-active">Open</span>
                        @endif
                    </td>
                    <td>{{ $hour->open_time ? \Carbon\Carbon::parse($hour->open_time)->format('H:i') : '-' }}</td>
                    <td>{{ $hour->close_time ? \Carbon\Carbon::parse($hour->close_time)->format('H:i') : '-' }}</td>
                    <td>
                        <a href="{{ route('admin.business-hours.edit', $hour) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.business-hours.destroy', $hour) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
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