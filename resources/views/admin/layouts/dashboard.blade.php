@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-3 col-sm-6">
        <div class="card-admin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1" style="font-size:0.8rem;">Menu Items</p>
                    <h4 class="fw-bold mb-0">{{ $stats['menu_items'] }}</h4>
                </div>
                <i class="fas fa-utensils text-primary fs-3"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card-admin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1" style="font-size:0.8rem;">Chefs</p>
                    <h4 class="fw-bold mb-0">{{ $stats['chefs'] }}</h4>
                </div>
                <i class="fas fa-user-tie text-warning fs-3"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card-admin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1" style="font-size:0.8rem;">Reservasi</p>
                    <h4 class="fw-bold mb-0">{{ $stats['reservations'] }}</h4>
                    <small class="text-warning">{{ $stats['pending_reservations'] }} pending</small>
                </div>
                <i class="fas fa-calendar-check text-success fs-3"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card-admin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1" style="font-size:0.8rem;">Pesan Masuk</p>
                    <h4 class="fw-bold mb-0">{{ $stats['contacts'] }}</h4>
                    <small class="text-danger">{{ $stats['unread_contacts'] }} belum dibaca</small>
                </div>
                <i class="fas fa-envelope text-info fs-3"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card-admin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1" style="font-size:0.8rem;">Blog Posts</p>
                    <h4 class="fw-bold mb-0">{{ $stats['blog_posts'] }}</h4>
                </div>
                <i class="fas fa-blog text-secondary fs-3"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card-admin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1" style="font-size:0.8rem;">Testimonials</p>
                    <h4 class="fw-bold mb-0">{{ $stats['testimonials'] }}</h4>
                </div>
                <i class="fas fa-quote-right text-primary fs-3"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card-admin">
            <h6 class="fw-bold mb-3">Reservasi Terbaru</h6>
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Nama</th><th>Tanggal</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse($recentReservations as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                            <td>
                                @php
                                    $statusMap = ['pending' => 'warning', 'confirmed' => 'success', 'cancelled' => 'danger'];
                                @endphp
                                <span class="badge bg-{{ $statusMap[$item->status] ?? 'secondary' }}">{{ ucfirst($item->status) }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">Belum ada reservasi</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.reservations.index') }}" class="btn btn-sm btn-outline-secondary mt-2">Lihat Semua</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-admin">
            <h6 class="fw-bold mb-3">Pesan Terbaru</h6>
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead><tr><th>Nama</th><th>Subject</th><th>Status</th></tr></thead>
                    <tbody>
                        @forelse($recentContacts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->subject }}</td>
                            <td>
                                @if($item->is_read)
                                <span class="badge bg-secondary">Dibaca</span>
                                @else
                                <span class="badge bg-primary">Baru</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center text-muted py-3">Belum ada pesan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-secondary mt-2">Lihat Semua</a>
        </div>
    </div>
</div>

@endsection