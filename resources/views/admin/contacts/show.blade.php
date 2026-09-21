@extends('admin.layouts.app')
@section('title', 'Detail Pesan')
@section('page-title', 'Detail Pesan')
@section('content')
<div class="card-admin" style="max-width:700px;">
    <table class="table table-borderless mb-4">
        <tr><th style="width:140px;">Nama</th><td>{{ $contact->name }}</td></tr>
        <tr><th>Email</th><td>{{ $contact->email }}</td></tr>
        <tr><th>Telepon</th><td>{{ $contact->phone ?? '-' }}</td></tr>
        <tr><th>Subject</th><td>{{ $contact->subject }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $contact->created_at->format('d M Y H:i') }}</td></tr>
    </table>
    <h6 class="fw-semibold mb-2">Pesan</h6>
    <div class="p-3 bg-light rounded mb-4" style="white-space: pre-line;">{{ $contact->message }}</div>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">Kembali</a>
    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
        @csrf @method('DELETE')
        <button class="btn btn-outline-danger"><i class="fas fa-trash me-1"></i> Hapus</button>
    </form>
</div>
@endsection