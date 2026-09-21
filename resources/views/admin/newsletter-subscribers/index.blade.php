@extends('admin.layouts.app')
@section('title', 'Newsletter Subscribers')
@section('page-title', 'Newsletter Subscribers')
@section('content')
<div class="card-admin">
    <h6 class="fw-bold mb-3">Daftar Subscriber Newsletter</h6>
    <div class="table-responsive">
        <table class="table table-admin">
            <thead><tr><th>Email</th><th>Tanggal Subscribe</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse($subscribers as $item)
                <tr>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.newsletter-subscribers.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center text-muted py-3">Belum ada subscriber</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">{{ $subscribers->links() }}</div>
</div>
@endsection