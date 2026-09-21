@extends('admin.layouts.app')
@section('title', 'Reservasi')
@section('page-title', 'Reservasi')
@section('content')
<div class="card-admin">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h6 class="fw-bold mb-0">Daftar Reservasi</h6>
        <form action="{{ route('admin.reservations.index') }}" method="GET" class="d-flex gap-2 flex-wrap">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama/telepon/email" value="{{ request('search') }}">
            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Nama</th><th>Kontak</th><th>Tamu</th><th>Tanggal</th><th>Jam</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($reservations as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}<br><small class="text-muted">{{ $item->email }}</small></td>
                    <td>{{ $item->guests }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                    <td>{{ $item->time }}</td>
                    <td>
                        @php
                            $statusMap = [
                                'pending' => 'warning',
                                'confirmed' => 'success',
                                'cancelled' => 'danger',
                            ];
                        @endphp
                        <span class="badge bg-{{ $statusMap[$item->status] ?? 'secondary' }}">{{ ucfirst($item->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.reservations.edit', $item) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.reservations.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center text-muted py-3">Belum ada reservasi</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $reservations->links() }}</div>
</div>
@endsection